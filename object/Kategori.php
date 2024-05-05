<?php

class Kategori  {

    // koneksi database dan nama tabel
    private $conn;
    private $table_name = "Kategori";

    // property object Kategori
    public $ID;
    public $NamaKategori;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        // insert
        $query = "INSERT INTO " . $this->table_name . " (NamaKategori)" .
                                " VALUES (:NamaKategori)";

        $result = $this->conn->prepare($query);

        $this->NamaKategori = htmlspecialchars(strip_tags($this->NamaKategori));

        $result->bindParam(":NamaKategori", $this->NamaKategori);

        if($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function readAll() {
        //select
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }

    function readOne() {
        // select by ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ?";

        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $this->NamaKategori = $row["NamaKategori"];
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET
                                                    NamaKategori = :NamaKategori
                                                    Where
                                                    ID = :ID";
        
        $result = $this->conn->prepare($query);

        $this->NamaKategori = htmlspecialchars(strip_tags($this->NamaKategori));
    
        $result->bindParam(":NamaKategori", $this->NamaKategori);
        $result->bindParam(":ID", $this->ID);

        $result->execute();
    }

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";
        
        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);

        $result->execute();
    }
}        
?>