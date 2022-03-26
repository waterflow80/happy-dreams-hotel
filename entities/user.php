<?php
    class Client {
        private $id;
        private $email;
        private $gender;
        private $password;
        private $userName;


        public function set_email($email){
            $this->email = $email;
        }
        public function set_gender($gender){
            $this->gender = $gender;
        }
        public function set_password($password){
            $this->password = $password;
        }
        public function set_userName($userName){
            $this->userName = $userName;
        }


    }

?>