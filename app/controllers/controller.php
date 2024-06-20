<?php
require_once dirname(__DIR__) . '/config/config.php';
require_once BASE_PATH . '/models/model.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require BASE_PATH . '/vendor/autoload.php';

class Controller {
    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function handleRequest(){
      
        $action = $_GET['action'] ?? 'home';

        switch($action){
            case 'register':
                $this->registerAuth();
                break;
            case 'registerForm':
                $this->registerForm();
                break;
            case 'login':
                $this->loginAuth();
                break;
            case 'loginForm':
                $this->loginForm();
                break;
            case 'panel':
                $this->showPanel();
                break;
            case 'editU':
                $this->editUser();
                break;
            case 'panelworker':
                $this->workerpanel();
                break;
            case 'paneladmin':
                $this->adminpanel();
                break;
            case 'deleteUser':
                $this->deleteUser();
                break;
            case 'searchClients':
                $this->searchClients();
                break;
            case 'showUserData':
                $this->showUserData();
                break;
            case 'logout':
                $this->logout();
                break;
            case 'homes':
                $this->showHome();
                break;
            case 'verifyEmail':
                $this->verifyEmail();
                break;
            case '':
                $this->showHome();
                break;
            default:
                $this->showHome();
                break;
        }
    }

    public function registerForm() {
        header('Location: ' . BASE_URL . '/app/views/register.php');
         
    }

    public function loginForm() {
        require BASE_PATH . '/views/login.php';
        
    }

    public function showHome() {
        require BASE_PATH . '/views/home.php';
    }

    private function verifyEmail() {
        $token = $_GET['token'] ?? '';
    
        if ($this->model->verifyEmail($token)) {
            header('Location: ' . BASE_URL . '/app/views/login.php?success=emailverified');
        } else {
            header('Location: ' . BASE_URL . '/app/views/login.php?error=invalidtoken');
        }
        exit();
    }

    private function registerAuth(){
        $email = $_POST['email'] ?? '';
        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $phoneNumber = $_POST['phoneNumber'] ?? '';
        $region = $_POST['region'] ?? '';
        $pass = $_POST['pass'] ?? '';
        $passAgain = $_POST['passAgain'] ?? '';

        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?action=registerForm&error=wrongemail');
            
        }
        if (strlen($pass) < 8) {
            header('Location: index.php?action=registerForm&error=passwordtooshort');
            
        }
        if ($this->model->emailExists($email)) {
            header('Location: index.php?action=registerForm&error=emailExists');
            
        }
        if ($pass !== $passAgain) {
            header('Location: index.php?action=registerForm&error=passwordsdontmatch');
            
        }
        if (empty($firstName) || empty($lastName) || empty($phoneNumber) || empty($region)) {
            header('Location: index.php?action=registerForm&error=allimputsmustbefilled');
            
        }

        $passhashed = password_hash($pass, PASSWORD_BCRYPT);
        $verificationToken = bin2hex(random_bytes(16));
        $this->model->saveData($email, $passhashed, $firstName, $lastName, $region, $phoneNumber);

        
   

    
        $this->sendVerificationEmail($email, $verificationToken);
        header('Location: index.php?action=loginForm&success=registered');
        
    }

    private function sendVerificationEmail($email, $token) {
        $mail = new PHPMailer(true);
    
        try {
           
            $mail->isSMTP();
            $mail->Host = 'mail.werben.pl'; 

            $mail->Username = 'hotel@werben.pl'; 
            $mail->Password = 'hotelhotel128'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->setFrom('hotel@werben.pl', 'Titanium Hotel');
            $mail->addAddress($email);
    
  
            $mail->isHTML(true);
            $mail->Subject = 'Zweryfikuj swoje konto Titanium Hotel';
            $mail->Body    = "Kliknij ten link aby zweryfikować konto: <a href=\"" . BASE_URL . "/index.php?action=verifyEmail&token=" . $token . "\">Verify Email</a>";
            $mail->AltBody = "Kliknij ten link aby zweryfikować konto: " . BASE_URL . "/index.php?action=verifyEmail&token=" . $token;
    
            $mail->send();
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    private function loginAuth(){
        $email = $_POST['email'] ?? '';
        $pass = $_POST['pass'] ?? '';
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?action=loginForm&error=wrongemail');
            exit();
        }
        if (empty($pass)) {
            header('Location: index.php?action=loginForm&error=emptypass');
            exit();
        }
    
        $hashedPass = $this->model->getPassHashed($email);
        if ($hashedPass == null) {
            header('Location: index.php?action=loginForm&error=wrongdata');
            exit();
        } else {
            if (password_verify($pass, $hashedPass)) {
                $isVerified = $this->model->isEmailVerified($email);
                if (!$isVerified) {
                    header('Location: index.php?action=loginForm&error=emailnotverified');
                    exit();
                }
                $_SESSION['user'] = $email;
                $_SESSION['role'] = $this->model->getUserRole($email);
                header('Location: index.php?action=panel');
                exit();
            } else {
                header('Location: index.php?action=loginForm&error=wrongdata');
                exit();
            }
        }
    }

    protected function showUserData() {
        $this->checkUserAccess();
        $userData = $this->getUserDataByEmail();
        require BASE_PATH . '/views/user/paneluser.php';
    }



    private function checkAdminAccess() {
       
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: ' . BASE_URL . '/app/views/login.php');
            exit();
        }
    }

    private function checkClientAccess() {
        
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
            header('Location: ' . BASE_URL . '/app/views/login.php');
            exit();
        }
    }

    private function checkWorkerAccess() {
       
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'worker') {
            header('Location: ' . BASE_URL . '/app/views/login.php');
            exit();
        }
    }

    public function workerpanel() {
        header('Location: index.php?action=workerpanel');
    }
    public function adminpanel() {
        header('Location: index.php?action=adminpanel');
    }

    public function showReservationDetails() {
        $id = $_GET['id'];
        $reservation = $this->model->fetchReservationDetails($id);
        require dirname(__DIR__) . '/views/reservationDetails.php';
    }

    protected function getUserDataByEmail() {
        session_start();
        if (!isset($_SESSION['user'])) {
            return null;
        }

        $email = $_SESSION['user'];
        $stmt = $this->model->db->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();
        $stmt->close();

        return $userData;
    }

    private function showPanel(){

        if (!isset($_SESSION['role'])) {
            header('Location: ' . BASE_URL . '/app/views/login.php');
            exit();
        }

        $this->checkUserAccess($_SESSION['role']);
    }

    public function checkUserAccess($requiredRole) {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/app/views/login.php');
            exit();
        }

        switch ($requiredRole) {
            case 'admin':
                header('Location: index.php?action=paneladmin');
                break;
            case 'worker':
                header('Location: index.php?action=panelworker');
                break;
            case 'user':
                header('Location: ' . BASE_URL . '/app/views/user/paneluser.php');
                break;
            default:
                header('Location: ' . BASE_URL . '/app/views/login.php');
                break;
        }
        exit();
    }

    private function editUser() {
        $this->checkAdminAccess();
        $userId = $_GET['id'] ?? null;
        if (!$userId) {
            header('Location: index.php?action=paneladmin');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $firstName = $_POST['firstName'] ?? '';
            $lastName = $_POST['lastName'] ?? '';
            $phoneNumber = $_POST['phoneNumber'] ?? '';
            $region = $_POST['region'] ?? '';
            $role = $_POST['role'] ?? '';
            $verified = isset($_POST['verified']) ? 1 : 0;

            $this->model->updateUser($userId, $email, $firstName, $lastName, $phoneNumber, $region, $role, $verified);

            header('Location: ' . BASE_URL . '/app/views/admin/klienci.php');
            exit();
        } else {
            $user = $this->model->getUserById($userId);
            require BASE_PATH . '/views/admin/edit.php';
        }
    }

    private function logout(){
        session_start();
        session_unset();
        session_destroy(); 
        header('Location: index.php?action=loginForm&success=logout'); 
        
    }

    private function deleteUser() {
        $this->checkAdminAccess();
        $userId = $_GET['id'] ?? null;
        if (!$userId) {
            header('Location: ' . BASE_URL . '/public/index.php?action=paneladmin');
            exit();
        }

        $this->model->deleteUser($userId);
        header('Location: ' . BASE_URL . '/app/views/admin/klienci.php');
        exit();
    }

    private function searchClients() {
        $this->checkAdminAccess();
        $queryParam = $_GET['query'] ?? '';
        $users = $this->model->searchClients($queryParam);
        require BASE_PATH . '/app/views/admin/klienci.php';
    }
}
?>