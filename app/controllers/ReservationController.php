<?php
require_once dirname(__DIR__) . '/config/config.php';

require_once BASE_PATH . '/models/ReservationModel.php';



class ReservationController {
    private $model;

    public function __construct() {
        $this->model = new ReservationModel();
    }

   

    public function handleRequest() {
        $action = $_GET['action'] ?? 'showAllReservations';

        switch ($action) {
            case 'showAllReservations':
                $this->showAllReservations();
                break;
            case 'workerpanel':
                $this->workerpanel();
                break;
            case 'adminpanel':
                $this->adminpanel();
                break;
            case 'deleteReservation':
                $this->deleteReservation();
                break;
            case 'createReservation':
                $this->createReservation();
                break;
            case 'showReservationDetails':
                $this->showReservationDetails();
                break;
            case 'toggleRoomStatus':
                $this->toggleRoomStatus();
                break;
            case 'createForm':
                $this->showCreateForm();
                break;
            case 'showUserReservations':
                $this->showUserReservations();
                break;
            case 'editProfile':
                $this->editProfile();
                break;
            default:
                $this->showAllReservations();
                break;
        }
    }


    public function showUserReservations() {
       
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login&error=NotLoggedIn');
            exit();
        }

        $customerEmail = $_SESSION['user'];
        $customerID = $this->model->getCustomerIDByEmail($customerEmail);
        $reservations = $this->model->getUserReservations($customerID);

        require BASE_PATH . '/views/user/reservations.php';
    }


    public function showCreateForm() {
        require BASE_PATH . '/views/user/CreateReservation.php';
    }

    public function createCustomerForm() {
        require BASE_PATH . '/views/worker/createCustomer.php';
    }


    private function createReservation() {
      
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=createForm&error=NotLoggedIn');
            exit();
        }

        $customerEmail = $_SESSION['user'];
        $customerID = $this->model->getCustomerIDByEmail($customerEmail);

        $roomType = $_POST['roomType'];
        $startReservation = date('Y-m-d', strtotime($_POST['StartReservation']));
        $endReservation = date('Y-m-d', strtotime($_POST['EndReservation']));
        $adults = $_POST['Adults'];
        $childs = $_POST['Childs'];
        $breakfast = isset($_POST['Breakfast']) ? 1 : 0;
        $parking = isset($_POST['Parking']) ? 1 : 0;

        $totalPeople = $adults + $childs;
        $totalBeds = $totalPeople;
        if ($totalPeople == 1)
        {
            $totalBeds = 2;
        }
        

        $roomNumber = $this->model->getAvailableRoomByBeds($roomType, $startReservation, $endReservation, $totalBeds);
        if ($roomNumber === null) {
            header('Location: index.php?action=createForm&error=NoAvailableRooms');
            exit();
        }

        if (!$this->model->isRoomAvailable($roomNumber, $startReservation, $endReservation)) {
            header('Location: index.php?action=createForm&error=NoAvailableRooms');
            exit();
        }

        $roomPrice = $this->model->getRoomPrice($roomNumber);
        $startDateTime = new DateTime($startReservation);
        $endDateTime = new DateTime($endReservation);
        $interval = $startDateTime->diff($endDateTime);
        $numNights = $interval->days;
        $price += ($numNights - 1);
        


        $price = $numNights * $roomPrice;
        if($totalPeople == 1)
        {
            $price=$price*0.75;
        }

        if ($breakfast) {
            $price += ($numNights - 1) * ($adults * 60);
            
        }
        
        if ($breakfast) {
            $price += ($numNights - 1) * 60 * $adults;
            
        }


        if ($parking) {
            $price += $numNights * 60;
        }

        $this->model->createReservation($roomType, $roomNumber, $startReservation, $endReservation, $adults, $childs, $breakfast, $parking, $price, $customerID);

        header('Location: index.php?action=createForm&success=1');
    }

    


    public function showAllReservations() {
        $queryParam = $_GET['query'] ?? '';
        $reservations = $this->model->getAllReservations($queryParam);

        $customerIDs = array_column($reservations, 'CustomerID');
        $customers = $this->model->getCustomerByID($customerIDs);

        require BASE_PATH . '/views/admin/reservations.php';
    }

    public function deleteReservation() {
        if (isset($_GET['delete_id'])) {
            $deleteID = $_GET['delete_id'];
            $this->model->deleteReservation($deleteID);
            header('Location: index.php?action=showAllReservations');
            exit();
        }
    }   

    public function toggleRoomStatus() {
        $reservationId = $_GET['id'];
        $roomId = $this->model->getRoomIdByReservationId($reservationId);
        $this->model->toggleRoomStatus($roomId);
        header('Location: index.php?action=workerpanel');
    }

    public function workerpanel() {
        $reservations = $this->model->fetchReservations();
        require dirname(__DIR__) . '/views/worker/panelworker.php';
    }
    
    public function adminpanel() {
        $reservations = $this->model->fetchReservations();
        require dirname(__DIR__) . '/views/admin/paneladmin.php';
    }

    public function showReservationDetails() {
        $id = $_GET['id'];
        $userid = $this->model->getCustomerIdFromReservation($id);
        $reservation = $this->model->fetchReservationDetails($id);
        $user = $this->model->fetchReservationDetailsUser($userid);
        require dirname(__DIR__) . '/views/worker/reservationDetails.php';
    }
 

    public function editProfile() {
    
        $email = $_SESSION['user'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $phoneNumber = $_POST['phoneNumber'];
            $newEmail = $_POST['email'];

            $this->model->updateUser($email, $firstName, $lastName, $phoneNumber, $newEmail);
            $_SESSION['user'] = $newEmail; // Aktualizacja sesji z nowym adresem email

            header('Location: /index.php?action=showProfile&success=1');
            exit();
        }
    }

 
}

?>