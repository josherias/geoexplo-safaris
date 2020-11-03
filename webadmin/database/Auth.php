<?php

class Auth extends ParentClass
{
    public function getCredentials($table, $password, $username)
    {
        $this->db->query("SELECT * FROM {$table} WHERE username = :usernamE AND password = :passworD");
        $this->db->bind(':usernamE', $username);
        $this->db->bind(':passworD', $password);
        return $this->db->resultset();
    }
}
