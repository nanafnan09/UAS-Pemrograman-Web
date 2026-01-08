<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUser($username) {
        $res = $this->db->conn->query("SELECT * FROM users WHERE username='$username'");
        return $res->fetch_assoc();
    }
}