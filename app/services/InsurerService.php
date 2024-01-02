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
        $id = $insurer->id;
        $name = $insurer->name;
        $address = $insurer->address;

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
        $id = $insurer->id;
        $name = $insurer->name;
        $address = $insurer->address;

        $this->db->query('UPDATE insurer SET name = :name, address = :address WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':address', $address);
        
        return $this->db->execute();
    }
    public function delete($id)
    {
        $this->db->query('DELETE FROM insurer WHERE id = :id');
        $this->db->bind(':id', $id);
        
        return $this->db->execute();
    }

    public function fetch($id)
    {
        $this->db->query('SELECT * FROM insurer WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}