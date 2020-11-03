<?php


class Blog extends ParentClass
{
    //new package
    public function addBlog($data)
    {
        $this->db->query("INSERT INTO blog_tb (title, category, article, photo, publish, date) 
                            VALUES(:titlE, :categorY, :articlE, :photO, :publisH, :datE)");
        /* bind the values before executing */
        $this->db->bind(':titlE', $data['blogTitle']);
        $this->db->bind(':categorY', $data['blogCategory']);
        $this->db->bind(':articlE', $data['blogArticle']);
        $this->db->bind(':photO', $data['blogImage']);
        $this->db->bind(':publisH', $data['blogPublish']);
        $this->db->bind(':datE', $data['blogDate']);

        $this->db->execute();
    }


    //edit Blog
    public function editBlog($data, $id)
    {
        $this->db->query("UPDATE blog_tb SET title=:titlE, category=:categorY, article=:articlE, photo=:photO
                            WHERE id=:id");
        /* bind the values before executing */
        $this->db->bind(':id', $id);

        $this->db->bind(':titlE', $data['blogTitle']);
        $this->db->bind(':categorY', $data['blogCategory']);
        $this->db->bind(':articlE', $data['blogArticle']);
        $this->db->bind(':photO', $data['blogImage']);


        $this->db->execute();
    }
}
