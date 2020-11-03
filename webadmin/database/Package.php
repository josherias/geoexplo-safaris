<?php


class Package extends ParentClass
{
    //new package
    public function AddPackage($data)
    {
        $this->db->query("INSERT INTO safaris (name, overview, days, price, destination, lodge_id, publish, photo) 
                            VALUES(:namE, :overvieW, :dayS, :pricE, :destinatioN, :lodgEiD, :publisH, :photO)");

        /* bind the values before executing */
        $this->db->bind(':namE', $data['packageName']);
        $this->db->bind(':overvieW', $data['packageArticle']);
        $this->db->bind(':dayS', $data['packageDays']);
        $this->db->bind(':pricE', $data['packagePrice']);
        $this->db->bind(':destinatioN', $data['packageCountry']);
        $this->db->bind(':lodgEiD', $data['packageAccomodation']);
        $this->db->bind(':publisH', $data['packagePublish']);
        $this->db->bind(':photO', $data['packageImage']);


        $this->db->execute();
    }


    //edit Package
    public function editPackage($data, $id)
    {
        $this->db->query("UPDATE safaris SET name=:namE, overview=:overvieW, days=:dayS, price=:pricE, destination=:destinatioN, lodge_id=:lodgEiD, photo=:photO WHERE id=:id");
        /* bind the values before executing */
        $this->db->bind(':id', $id);

        /* bind the values before executing */
        $this->db->bind(':namE', $data['packageName']);
        $this->db->bind(':overvieW', $data['packageArticle']);
        $this->db->bind(':dayS', $data['packageDays']);
        $this->db->bind(':pricE', $data['packagePrice']);
        $this->db->bind(':destinatioN', $data['packageCountry']);
        $this->db->bind(':lodgEiD', $data['packageAccomodation']);
        $this->db->bind(':photO', $data['packageImage']);

        $this->db->execute();
    }
}
