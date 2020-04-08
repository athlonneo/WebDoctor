<?php
    require_once "controller/services/mysqlDB.php";
    class UploadController{
        protected $db;

        public function __construct(){
            $this->db = new MySQLDB ("localhost", "root", "", "webdoctor");
        }

        function upload(){
            $target_dir = "view/img/";
            $file = $_FILES['fileUpload']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['fileUpload']['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;
            move_uploaded_file($temp_name,$path_filename_ext);
            $temp = $filename.".".$ext;
            $query = "UPDATE user SET image='".$temp."' WHERE idU='".$_SESSION['idU']."'";
            $this->db->executeNonSelectQuery($query);
        }

        function delete(){
            $query = "SELECT image FROM user WHERE idU='".$_SESSION['idU']."'";
            $query_result = $this->db->executeSelectQuery($query);
            $temp = $query_result[0]['image'];
            $filepath = "view/img/".$temp;
            unlink($filepath);
            $query = "UPDATE user SET image='placeholder.png' WHERE idU='".$_SESSION['idU']."'";
            $this->db->executeNonSelectQuery($query);
        }
    }
?>