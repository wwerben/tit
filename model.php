<?php
  require_once 'db.php';

	class Model {
		private $db;

		public function __construct(){
			$this->db = dbConnect();
		}

		public function saveData($email, $passhashed, $firstName, $lastName, $region, $phoneNumber){
			$stmt = $this->db->prepare('INSERT INTO user (email, password, firstName, lastName, region, phoneNumber) VALUES (?, ?, ?, ?, ?, ?)');
			$stmt->bind_param('ssssss', $email, $passhashed, $firstName, $lastName, $region, $phoneNumber);
			$stmt->execute();
			$stmt->close();
		}

		public function getPassHashed($email) {
			$stmt = $this->db->prepare('SELECT password FROM user WHERE email = ?');
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->bind_result($passhashed);
		
			if ($stmt->fetch()) {
				$stmt->close();
				return $passhashed;
			} else {
				$stmt->close();
				return null;
			}
		}
		
		public function getUserRole($email) {
			$stmt = $this->db->prepare('SELECT role FROM user WHERE email = ?');
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->bind_result($role);
		
			if ($stmt->fetch()) {
				$stmt->close();
				return $role;
			} else {
				$stmt->close();
				return null;
			}
		}

		public function getAllUsers() {
        $query = 'SELECT * FROM user';
        $result = $this->db->query($query);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

	public function getUserById($userId) {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE ID = ?');
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    public function updateUser($userId, $email, $firstName, $lastName, $phoneNumber, $region, $role, $verified) {
        $stmt = $this->db->prepare('UPDATE user SET email = ?, firstName = ?, lastName = ?, phoneNumber = ?, region = ?, role = ?, verified = ? WHERE ID = ?');
        $stmt->bind_param('ssssssii', $email, $firstName, $lastName, $phoneNumber, $region, $role, $verified, $userId);
        $stmt->execute();
        $stmt->close();
    }
	public function deleteUser($userId) {
    $stmt = $this->db->prepare('DELETE FROM user WHERE ID = ?');
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $stmt->close();
}

	

	}
?>