<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "model/user.php";

    class UserController{
        protected $db;

        public function __construct(){
            $this->db = new MySQLDB ("localhost", "root", "", "webdoctor");
        }

        public function view_login(){
            return View::createViewA('login.php',[]);
        }

        public function view_register(){
            $cities = $this->getCity();
            return View::createViewA('register.php',[
                "cities"=> $cities
            ]);
        }

        public function view_index(){
            return View::createViewB('index.php',[]);
        }

        public function view_profile(){
            $info = $this->getuserInfo();
			return View::createViewB('profile.php',[
				"info" => $info
			]);
        }

        public function view_changepass(){
            return View::createViewB('changepass.php',[]);
        }

        public function view_adminpage(){
            return View::createViewB('adminpage.php',[]);
        }

        public function view_company(){
            return View::createViewB('company.php',[]);
        }

        public function view_account(){
            $accounts = $this->getAccounts();
            return View::createViewB('account.php',[
                "accounts" => $accounts
            ]);
        }

        public function view_account_filtered(){
            $accounts = $this->getAccountsFiltered();
            return View::createViewB('account.php',[
                "accounts" => $accounts
            ]);
        }

        private function getCity(){
            $query = "SELECT * FROM city";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
        }

        public function newUser(){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmpass = $_POST['confirmpass'];
            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $city = $_POST['city'];
            $validation = TRUE;
            if(strlen($username)>20 || strlen($password)>20 || strlen($confirmpass)>20 && $validation==TRUE){
                $validation = FALSE;
                echo "<script type='text/javascript'>alert('Username and Password must be 20 characters or below.');window.location.href='register';</script>";
            }
            if($password != $confirmpass && $validation==TRUE){
                $validation = FALSE;
                echo "<script type='text/javascript'>alert('Password confirmation mismatch.');window.location.href='register';</script>";
            }
            $query = "SELECT username FROM user WHERE username='$username'";
            $query_result = $this->db->executeSelectQuery($query);
            if($query_result!=NULL){
                $validation = FALSE;
                echo "<script type='text/javascript'>alert('Username already exist.');window.location.href='register';</script>";               
            }
            if($validation==TRUE){
                $username = $this->db->escapeString($username);
                $password = md5($this->db->escapeString($password));
                $name = $this->db->escapeString($name);
                $query = 
                "INSERT INTO user (username,password,name,birth_date,idC,isAdmin,image) VALUES ('$username','$password','$name','$dob',$city,0,'placeholder.png')";
                $this->db->executeNonSelectQuery($query);
                echo "<script type='text/javascript'>alert('Registration success!');window.location.href='login';</script>";
            }
        }

        public function login(){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $username = $this->db->escapeString($username);
            $password = md5($this->db->escapeString($password));
            $query = "SELECT idU,username,name,isAdmin FROM user WHERE username='$username' AND password='$password' ";
            $query_result = $this->db->executeSelectQuery($query);
            if($query_result!=NULL){
                $_SESSION['idU'] = $query_result[0]['idU'];
                $_SESSION['username'] = $query_result[0]['username'];
                $_SESSION['name'] = $query_result[0]['name'];
                $_SESSION['isAdmin'] = $query_result[0]['isAdmin'];
                header('Location: index');
            }
            else{
                echo "<script type='text/javascript'>alert('Invalid Username or Password.');window.location.href='login';</script>";
            }
        }

        public function getUserInfo(){
            $idU = $_SESSION['idU'];
            $query = "SELECT birth_date, city.name, image FROM user JOIN city ON user.idC = city.idC WHERE idU = $idU ";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
        }
        
        public function changePass(){
            $idU = $_SESSION['idU'];
            $oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];
            $confirmpass = $_POST['confirmpass'];
            $validation = TRUE;
            if(strlen($oldpass)>20 || strlen($newpass)>20 || strlen($confirmpass)>20 && $validation==TRUE){
                $validation = FALSE;
                echo "<script type='text/javascript'>alert('Password must be 20 characters or below.');window.location.href='changepass';</script>";
            }
            if($newpass != $confirmpass && $validation==TRUE){
                $validation = FALSE;
                echo "<script type='text/javascript'>alert('Password confirmation mismatch.');window.location.href='changepass';</script>";
            }
            $query = "SELECT password FROM user WHERE idU='".$_SESSION['idU']."'";
            $query_result = $this->db->executeSelectQuery($query);
            if($query_result[0]['password'] != md5($oldpass)){
                $validation = FALSE;
                echo "<script type='text/javascript'>alert('Wrong old password.');window.location.href='changepass';</script>";
            }
            if($validation == TRUE){
                $newpass = md5($this->db->escapeString($newpass));
                $query = "UPDATE user SET password='".$newpass."' WHERE idU='".$_SESSION['idU']."'";
                $this->db->executeNonSelectQuery($query);
                echo "<script type='text/javascript'>alert('Password change complete.');window.location.href='profile';</script>";
            }
        }

        public function getAccounts(){
            $query = "SELECT username, user.name as uname, birth_date, city.name as cname FROM user JOIN city ON user.idC = city.idC WHERE isAdmin=0";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
        }

        public function getAccountsFiltered(){
            $filter = $_POST['filter'];
            $query = "SELECT username, user.name as uname, birth_date, city.name as cname FROM user JOIN city ON user.idC = city.idC WHERE isAdmin=0 AND username='$filter'";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
        }

        public function deleteUser(){
            $delname = $_POST["delName"];
			$query = "DELETE FROM user WHERE username='$delname'";
			$this->db->executeNonSelectQuery($query);
		}
    }
?>