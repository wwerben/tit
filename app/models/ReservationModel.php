<?php
  require_once __DIR__ . '/../config/config.php';
  require_once __DIR__ . '/../config/db.php';

  class ReservationModel {
    private $db;

    public function __construct() {
        $this->db = dbConnect();
    }

    public function createReservation($roomType, $roomNumber, $startReservation, $endReservation, $adults, $childs, $breakfast, $parking, $price, $customerID) {
        $stmt = $this->db->prepare(
            'INSERT INTO reservations (roomType, roomNumber, StartReservation, EndReservation, Adults, Childs, Breakfast, Parking, Price, CustomerID) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->bind_param('sissiiiidi', $roomType, $roomNumber, $startReservation, $endReservation, $adults, $childs, $breakfast, $parking, $price, $customerID
        );
        $stmt->execute();
        $stmt->close();
    }

    public function getRoomPrice($roomNumber) {
        $stmt = $this->db->prepare('SELECT Price FROM rooms WHERE ID = ?');
        $stmt->bind_param('i', $roomNumber);
        $stmt->execute();
        $stmt->bind_result($price);
        $stmt->fetch();
        $stmt->close();
        return $price;
    }

    public function getCustomerIDByEmail($email) {
        $stmt = $this->db->prepare('SELECT ID FROM user WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->fetch();
        $stmt->close();
        return $id;
    }

    public function getAvailableRoom($roomType, $startReservation, $endReservation) {
        $stmt = $this->db->prepare(
            'SELECT r.ID 
             FROM rooms r 
             WHERE r.roomType = ? 
             AND r.avalible = 1 
             AND NOT EXISTS (
                 SELECT 1 
                 FROM reservations res 
                 WHERE res.roomNumber = r.ID 
                 AND (
                     (res.StartReservation <= ? AND res.EndReservation >= ?) 
                     OR (res.StartReservation <= ? AND res.EndReservation >= ?)
                 )
             )
             LIMIT 1'
        );
        $stmt->bind_param('sssss', $roomType, $endReservation, $startReservation, $startReservation, $endReservation);
        $stmt->execute();
        $stmt->bind_result($roomID);
        $stmt->fetch();
        $stmt->close();
        return $roomID;
    }

    public function isRoomAvailable($roomNumber, $startReservation, $endReservation) {
        $stmt = $this->db->prepare(
            'SELECT COUNT(*) 
             FROM reservations 
             WHERE roomNumber = ? 
             AND (
                 (StartReservation <= ? AND EndReservation >= ?) 
                 OR (StartReservation <= ? AND EndReservation >= ?)
             )'
        );
        $stmt->bind_param('issss', $roomNumber, $endReservation, $startReservation, $startReservation, $endReservation);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count == 0;
    }
    public function getAvailableRoomByBeds($roomType, $startReservation, $endReservation, $totalBeds, ) {
       
            $query = '
                SELECT rooms.ID, rooms.Price
                FROM rooms
                LEFT JOIN reservations ON rooms.ID = reservations.roomNumber
                WHERE rooms.roomType = ?
                AND rooms.beds >= ?
                AND (reservations.ID IS NULL OR (reservations.EndReservation <= ? OR reservations.StartReservation >= ?))
                ORDER BY rooms.Price ASC
            ';
        

        $stmt = $this->db->prepare($query);

      
            $stmt->bind_param('siss', $roomType, $totalBeds, $startReservation, $endReservation);
        

        $stmt->execute();
        $result = $stmt->get_result();
        $rooms = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        if (!empty($rooms)) {
            return $rooms[0]['ID'];  // Najtańszy pokój
        }

        return null;  // Brak dostępnych pokoi
    }

    

    public function fetchReservations() {
        $stmt = $this->db->prepare('
            SELECT reservations.*, user.phoneNumber, user.lastName, rooms.actual
            FROM reservations 
            JOIN rooms ON reservations.roomNumber = rooms.ID
            JOIN user ON reservations.CustomerID = user.ID;
            
        ');
        $stmt->execute();
        $result = $stmt->get_result();
        $reservations = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $reservations;
    }

    public function toggleRoomStatus($roomId) {
        $stmt = $this->db->prepare('SELECT actual FROM rooms WHERE ID = ?');
        $stmt->bind_param('i', $roomId);
        $stmt->execute();
        $stmt->bind_result($actual);
        $stmt->fetch();
        $stmt->close();

        $newStatus = $actual ? 0 : 1;

        $stmt = $this->db->prepare('UPDATE rooms SET actual = ? WHERE ID = ?');
        $stmt->bind_param('ii', $newStatus, $roomId);
        $stmt->execute();
        $stmt->close();
    }

    public function getRoomIdByReservationId($reservationId) {
        $stmt = $this->db->prepare('SELECT roomNumber FROM reservations WHERE ID = ?');
        $stmt->bind_param('i', $reservationId);
        $stmt->execute();
        $stmt->bind_result($roomId);
        $stmt->fetch();
        $stmt->close();
        return $roomId;
    }

    public function fetchReservationDetails($id) {
        $stmt = $this->db->prepare('SELECT * FROM reservations WHERE ID = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $reservation = $result->fetch_assoc();
        $stmt->close();
        return $reservation;
    }

    public function fetchReservationDetailsUser($id) {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE ID = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $reservation = $result->fetch_assoc();
        $stmt->close();
        return $reservation;
    }

    public function getCustomerIdFromReservation($id) {
        $stmt = $this->db->prepare('SELECT CustomerID FROM reservations WHERE ID = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row ? $row['CustomerID'] : null;
    }
    


    public function getAllReservations($queryParam = '') {
        if ($queryParam) {
            $stmt = $this->db->prepare('SELECT * FROM reservations WHERE roomType LIKE ? OR roomNumber LIKE ?');
            $searchQuery = '%' . $queryParam . '%';
            $stmt->bind_param('ss', $searchQuery, $searchQuery);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $query = 'SELECT * FROM reservations';
            $result = $this->db->query($query);
        }

        $reservations = [];
        if ($result->num_rows > 0) {
            $reservations = $result->fetch_all(MYSQLI_ASSOC);
        }

        return $reservations;
    }

    public function getCustomerByID($customerIDs) {
        $customerIDs = implode(',', $customerIDs);
        $customersQuery = "SELECT * FROM user WHERE ID IN ($customerIDs)";
        $customersResult = $this->db->query($customersQuery);
        $customers = [];
        if ($customersResult->num_rows > 0) {
            while ($row = $customersResult->fetch_assoc()) {
                $customers[$row['ID']] = $row;
            }
        }

        return $customers;
    }

    public function deleteReservation($reservationID) {
        $stmt = $this->db->prepare('DELETE FROM reservations WHERE ID = ?');
        $stmt->bind_param('i', $reservationID);
        $stmt->execute();
        $stmt->close();
    }

    public function getUserReservations($customerID) {
        $stmt = $this->db->prepare(
            'SELECT roomType, roomNumber, StartReservation, EndReservation, Adults, Childs, Breakfast, Parking, Price 
             FROM reservations 
             WHERE CustomerID = ?'
        );
        $stmt->bind_param('i', $customerID);
        $stmt->execute();
        $result = $stmt->get_result();
        $reservations = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $reservations;
    }

    public function updateUser($email, $firstName, $lastName, $phoneNumber, $newEmail) {
        $stmt = $this->db->prepare('UPDATE user SET firstName = ?, lastName = ?, phoneNumber = ?, email = ? WHERE email = ?');
        $stmt->bind_param('sssss', $firstName, $lastName, $phoneNumber, $newEmail, $email);
        $stmt->execute();
        $stmt->close();
    }


    public function findCustomerByEmail($email) {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    public function createCustomer($email, $firstName, $lastName, $phoneNumber, $region, $password) {
        $passHashed = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare('INSERT INTO user (email, password, firstName, lastName, region, phoneNumber) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssss', $email, $passHashed, $firstName, $lastName, $region, $phoneNumber);
        $stmt->execute();
        $userId = $stmt->insert_id;
        $stmt->close();
        return $userId;
    }
    
}

?>