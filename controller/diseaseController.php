<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
	require_once "model/user.php";
	
	class DiseaseController{
		protected $db;

        public function __construct(){
            $this->db = new MySQLDB ("localhost", "root", "", "webdoctor");
        }
		
		public function view_diagnose(){
			$symptoms = $this->getSymptom();
            return View::createViewB('diagnose.php',[
				"symptoms"=>$symptoms
			]);
		}

		public function view_result(){
			$diseases = $this->diagnose();
			return View::createViewB('result.php',[
				"diseases"=>$diseases
			]);
		}
		
		public function view_adminpage(){
			$symptoms = $this->getSymptom();
			$diseases = $this->getDisease();
            return View::createViewB('adminpage.php',[
				"symptoms"=>$symptoms,
				"diseases"=>$diseases
			]);
		}
		
		public function view_history(){
            return View::createViewB('history.php',[]);
		}

		public function view_history2(){
			$symptoms = $this->getHistorySymptom();
			$diseases = $this->getHistoryDisease();
            return View::createViewB('history.php',[
				"symptoms"=>$symptoms,
				"diseases"=>$diseases
			]);
		}

		public function view_report(){
			$report = $this->getReport();
            return View::createViewB('report.php',[
				"report"=>$report
			]);
		}
		
		
		public function view_details(){
			$diseases = $this->getDisease();
			return View::createViewB('details.php',[
				"diseases"=>$diseases
			]);
		}

		public function view_disease(){
			$disease = $this->getDisease1($_GET['id']);
			return View::createViewB('disease.php',[
				"disease"=>$disease
			]);
		}

		public function getDisease(){
			$query = "SELECT * FROM disease ORDER BY name";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
		}

		public function getDisease1($id){
			$query = "SELECT * FROM disease WHERE idD=$id";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
		}

		public function getSymptom(){
			$query = "SELECT * FROM symptom ORDER BY name ASC;";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
		}

		public function diagnose(){
			if(isset($_POST['symptoms'])){
				$userID = $_SESSION['idU'];
				$userSymptoms = $_POST['symptoms'];
				$diag_result = [];
				//print_r($userSymptoms);
				foreach($userSymptoms as $key=>$row){
					$query = "SELECT * FROM user_symptom WHERE idU=$userID AND idS=$row AND date=CURDATE()";
					$query_result = $this->db->executeSelectQuery($query);
					if($query_result==NULL){
						$query = "INSERT INTO user_symptom(idU,idS,date) VALUES ($userID,$row,CURDATE())";
						$this->db->executeNonSelectQuery($query);
					}
				}
				$diseases = $this->getDisease();
				//print_r($diseases);
				foreach($diseases as $key=>$row){
					$query = "SELECT idS FROM disease_symptom WHERE idD = ".$row['idD'];
					$query_result = $this->db->executeSelectQuery($query);
					//print_r($query_result);
					//echo"<br>";
					$counterS = 0;
					$counterU = 0;
					foreach($query_result as $qkey=>$qrow){
						$counterS++;
						foreach($userSymptoms as $ukey=>$urow){
							if($urow == $qrow['idS']){
								$counterU++;
							}
						}
					}
					//echo $counterS;
					//echo "<br>";
					//echo $counterU;	
					//echo "<br>";	
					if($counterS == $counterU){
						$query = "SELECT * FROM user_disease WHERE idU=$userID AND idD=".$row['idD']." AND date=CURDATE()";
						$query_result = $this->db->executeSelectQuery($query);
						if($query_result==NULL){
							$query = "INSERT INTO user_disease(idU,idD,date) VALUES ($userID,".$row['idD'].",CURDATE())";
							$this->db->executeNonSelectQuery($query);
						}
						$diag_result[] = $row['idD'];
					}	
				}
				$result = [];
				foreach($diag_result as $row){
					$query = "SELECT name FROM disease WHERE idD = $row";
					$query_result = $this->db->executeSelectQuery($query);
					$result[] = $query_result[0]['name'];
				}
				return $result;
			}
			else{
				echo "<script type='text/javascript'>alert('You didn\'t select any symptom.');window.location.href='diagnose';</script>";
			}
		}

		public function getUserDisease(){
			$userID = $_SESSION['idU'];
			$query = "SELECT disease.name FROM user_disease JOIN disease ON user_disease.idD=disease.idD WHERE idU=$userID AND date=CURDATE()";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
		}

		public function getUserSymptom(){
			$userID = $_SESSION['idU'];
			$query = "SELECT symptom.name FROM user_symptom JOIN symptom ON user_symptom.idS=symptom.idS WHERE idU=$userID AND date=CURDATE()";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
		}

		public function getHistoryDisease(){
			$userID = $_SESSION['idU'];
			$startDate = $_POST['startDate'];
			$endDate = $_POST['endDate'];
			$query = "SELECT DISTINCT disease.name FROM user_disease JOIN disease ON user_disease.idD=disease.idD WHERE idU=$userID AND date BETWEEN '$startDate' AND '$endDate' ";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
		}

		public function getHistorySymptom(){
			$userID = $_SESSION['idU'];
			$startDate = $_POST['startDate'];
			$endDate = $_POST['endDate'];
			$query = "SELECT  DISTINCT symptom.name FROM user_symptom JOIN symptom ON user_symptom.idS=symptom.idS WHERE idU=$userID AND date BETWEEN '$startDate' AND '$endDate' ";
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
		}

		public function newDisease(){
			$disease = $this->db->escapeString($_POST["disease"]);
			$query = "INSERT INTO disease(name) VALUES('$disease') ";
			$this->db->executeNonSelectQuery($query);
		}

		public function linkDS(){
			$disease = $_POST["disease"];
			$symptom = $_POST["symptom"];
			$query = "SELECT * FROM disease_symptom WHERE idD=$disease AND idS=$symptom";
			$query_result = $this->db->executeSelectQuery($query);
			if($query_result!=NULL){
                echo "<script type='text/javascript'>alert('Already exist.');window.location.href='adminpage';</script>";               
			}
			else{
				$query = "INSERT INTO disease_symptom(idD,idS) VALUES($disease,$symptom)";
				$this->db->executeNonSelectQuery($query);
				echo "<script type='text/javascript'>alert('Success.');window.location.href='adminpage';</script>";
			}
		}

		public function delDS(){
			$disease = $_POST["disease"];
			$symptom = $_POST["symptom"];
			$query = "SELECT * FROM disease_symptom WHERE idD=$disease AND idS=$symptom";
			$query_result = $this->db->executeSelectQuery($query);
			if($query_result==NULL){
                echo "<script type='text/javascript'>alert('Does not exist.');window.location.href='adminpage';</script>";               
			}
			else{
				$query = "DELETE FROM disease_symptom WHERE idD=$disease AND idS=$symptom";
				$this->db->executeNonSelectQuery($query);
				echo "<script type='text/javascript'>alert('Success.');window.location.href='adminpage';</script>";
			}
		}

		public function delDisease(){
            $disease = $_POST["disease"];
			$query = "DELETE FROM disease WHERE idD=$disease";
			$this->db->executeNonSelectQuery($query);
		}

		public function getReport(){
			$query = "SELECT city.name, COUNT(idU) AS jumlah FROM user JOIN city ON user.idC=city.idC GROUP BY city.name";
			$query_result = $this->db->executeSelectQuery($query);
			return $query_result;
		}
	}
?>