<?php
    declare(strict_types=1);

    class User {
        private $name;
        private $age;
        private $username;
        private $password;

        public function __construct($name, $age, $username, $password) {
            $this->name = $name;
            $this->age = intval($age);
            $this->username = $username;
            $this->password = $password;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getAge() {
            return $this->age;
        }

        public function setAge($age) {
            $this->age = $age;
        }

        public function getUserName() {
            return $this->username;
        }

        public function setUserName($username) {
            $this->username = $username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function insert() {
            return "insert into user_info values (\"$this->name\",
            \"$this->username\", \"$this->password\", $this->age);";
        }

        public function update() {
            return "update user_info set name=\"$this->name\",
            age=$this->gpa, password=\"$this->password\" where
            username=\"$this->username\";";
        }

        public function insert_image($price, $imgPath, $image) {
            return "insert into user_images values (\"$this->name\",
            $price, \"$imgPath\", \"$image\");";
        }
    }
?>