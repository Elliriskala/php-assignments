<?php

namespace MediaProject;

require_once __DIR__ . '/User.class.php';

class UserDBOps
{
    private \PDO $DBH;

    public function __construct($DBH)
    {
        $this->DBH = $DBH;
    }

    public function login($username, $password): User|null
    {
        $sql = "SELECT * FROM Users WHERE username = :username";
        $data = [
            'username' => $_POST['username'],
        ];
        $STH = $this->DBH->prepare($sql);
        $STH->execute($data);
        $user = $STH->fetch(\PDO::FETCH_ASSOC);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            return new User($user);
        }
        return null;
    }
}