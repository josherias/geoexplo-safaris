<?php
/* 
spl_autoload_register(function ($className) {
    require_once("$className.php");
});
 */

require_once "C:\wamp64\www\geoexplo\webadmin\database\Database.php";



class ParentClass
{
    public $db = null;

    public function __construct(Database $db)
    {
        /* dependency injection */

        if ($db->isConnected()) {
            $this->db = $db;
        } else {
            return null;
            echo "Database not connected";
        }
    }

    //display a collection form database
    public function displayCollection($table)
    {
        $this->db->query("SELECT * FROM {$table}");
        return $this->db->resultset();
    }

    //display a collection form database
    public function displaySearch($table, $title, $attr)
    {
        $this->db->query("SELECT * FROM {$table} WHERE {$attr} LIKE '%" . $title . "%'");
        return $this->db->resultset();
    }


    //display a collection form database
    public function displayCollectionLimit($table, $limit)
    {
        $this->db->query("SELECT * FROM {$table} LIMIT  $limit");
        return $this->db->resultset();
    }

    //display single instance of model
    public function displaySingleInstance($table, $id)
    {
        $this->db->query("SELECT * FROM {$table} WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultset();
    }

    //delete item from db
    public function deleteInstance($table, $id)
    {
        $this->db->query("DELETE FROM {$table} WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    //count items from db
    public function instanceCount($data)
    {
        return $this->db->rowCount($data);
    }
}
