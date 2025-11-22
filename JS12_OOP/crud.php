<?php
require_once 'database.php';

class Crud
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Create
    public function create($jabatan, $keterangan)
    {
        $query = "INSERT INTO jabatan (jabatan, keterangan) 
                  VALUES ('$jabatan', '$keterangan')";

        return pg_query($this->db->conn, $query);
    }

    // Read
    public function read()
    {
        $query = "SELECT * FROM jabatan";
        $result = pg_query($this->db->conn, $query);

        $data = [];
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Read By Id
    public function readById($id)
    {
        $query = "SELECT * FROM jabatan WHERE id = $id";
        $result = pg_query($this->db->conn, $query);

        if (pg_num_rows($result) == 1) {
            return pg_fetch_assoc($result);
        } else {
            return null;
        }
    }

    // Update
    public function update($id, $jabatan, $keterangan)
    {
        $query = "UPDATE jabatan 
                  SET jabatan = '$jabatan', 
                      keterangan = '$keterangan' 
                  WHERE id = $id";

        return pg_query($this->db->conn, $query);
    }

    // Delete
    public function delete($id)
    {
        $query = "DELETE FROM jabatan WHERE id = $id";
        return pg_query($this->db->conn, $query);
    }
}
?>
