<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "model/user.php";
    
    class SymptomController{
        protected $db;
        
        public function __construct(){
            $this->db = new MySQLDB ("localhost", "root", "", "webdoctor");
        }

        public function newSymptom(){
			$symptom = $this->db->escapeString($_POST["symptom"]);
			$query = "INSERT INTO symptom(name) VALUES('$symptom') ";
			$this->db->executeNonSelectQuery($query);
        }
        
        public function delSymptom(){
            $symptom = $_POST["symptom"];
			$query = "DELETE FROM symptom WHERE idS=$symptom";
			$this->db->executeNonSelectQuery($query);
		}
    }

?>