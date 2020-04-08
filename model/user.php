<?php
    class User {
        public $username;
        public $password;
        public $name;
        public $birth_date;
        public $cityID;

        public function __construct($username, $password, $name, $birth_date, $cityID){
            $this->username = $username;
            $this->password = $password;
            $this->name = $name;
            $this->birth_date = $birth_date;
            $this->city = $cityID;
        }
    }
?>