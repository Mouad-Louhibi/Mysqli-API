<?php
require_once PROJECT_ROOT_PATH . "./Model/Database.php";

class UserModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM users ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    }

    public function setUser($username, $user_email, $user_status)
    {
        return $this->query("INSERT INTO users(username,user_email,user_status) VALUES('{$username}','{$user_email}','{$user_status}')");
    }

    public function deleteUser($id)
    {
        return $this->query("DELETE FROM users WHERE user_id = '{$id}'");
    }

    public function updateUser($id, $username, $user_email, $user_status)
    {
        return $this->query("UPDATE users SET username = '{$username}', user_email = '{$user_email}', user_status = '{$user_status}' WHERE user_id = '{$id}'");
    }
}
