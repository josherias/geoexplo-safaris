<?php

require_once('ParentClass.php');

class Activity extends ParentClass
{
    //new package
    public function addActivity($data)
    {
        $this->db->query("INSERT INTO activities (title, description, short_desc, price, photo, countries) 
                            VALUES(:titlE, :descriptioN, :shorTdesC, :pricE, :photO, :countrieS)");

        /* bind the values before executing */
        $this->db->bind(':titlE', $data['activityTitle']);
        $this->db->bind(':descriptioN', $data['activityDescription']);
        $this->db->bind(':shorTdesC', $data['activityShortDesc']);
        $this->db->bind(':pricE', $data['activityPrice']);
        $this->db->bind(':photO', $data['activityImage']);
        $this->db->bind(':countrieS', $data['activityCountries']);

        $this->db->execute();
    }


    //edit activity
    public function editActivity($data, $id)
    {
        $this->db->query("UPDATE activities SET title=:titlE, description=:descriptioN, short_desc=:shorTdesC, price=:pricE, photo=:photO, countries=:countrieS
                            WHERE id=:id");
        /* bind the values before executing */
        $this->db->bind(':id', $id);

        /* bind the values before executing */
        $this->db->bind(':titlE', $data['activityTitle']);
        $this->db->bind(':descriptioN', $data['activityDescription']);
        $this->db->bind(':shorTdesC', $data['activityShortDesc']);
        $this->db->bind(':pricE', $data['activityPrice']);
        $this->db->bind(':photO', $data['activityImage']);
        $this->db->bind(':countrieS', $data['activityCountries']);

        $this->db->execute();
    }
}
