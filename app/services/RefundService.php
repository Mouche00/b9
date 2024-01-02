<?php

require_once 'InsurerServiceI.php';

class InsurerService implements InsurerServiceI
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create(Insurer $insurer)
    {
        $this->db->query('INSERT INTO insurer VALUES (:id, :name, :address)');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':address', $address);
        
        return $this->db->execute();
    }
    public function read()
    {
        $sql = "SELECT * FROM insurer";

        $this->db->query($sql);
        return $this->db->resultSet();
    }
    public function update(Insurer $insurer)
    {

    }
    public function delete()
    {

    }
}