<?php


class Destination extends ParentClass
{
    //new package
    public function addDestination($data)
    {
        $this->db->query("INSERT INTO destinations (country_id, title, description, image) 
                            VALUES(:countrYiD, :titlE, :descriptioN, :imagE)");

        /* bind the values before executing */
        $this->db->bind(':countrYiD', $data['destinationCountry']);
        $this->db->bind(':titlE', $data['destinationTitle']);
        $this->db->bind(':descriptioN', $data['destinationDescription']);
        $this->db->bind(':imagE', $data['destinationImage']);

        $this->db->execute();
    }


    //edit Destination
    public function editDestination($data, $id)
    {
        $this->db->query("UPDATE destinations SET country_id = :countrYiD, title = :titlE, description = :descriptioN, image = :imagE WHERE id=:id");
        /* bind the values before executing */
        $this->db->bind(':id', $id);

        $this->db->bind(':countrYiD', $data['destinationCountry']);
        $this->db->bind(':titlE', $data['destinationTitle']);
        $this->db->bind(':descriptioN', $data['destinationDescription']);
        $this->db->bind(':imagE', $data['destinationImage']);

        $this->db->execute();
    }
}
