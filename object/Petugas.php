<?php

class Petugas  {

    // koneksi database dan nama tabel
    private $conn;
    private $table_name = "Petugas";

    // property object petugas
    public $ID;
    public $NamaPetugas;
    public $Alamat;
    public $NoTelp;
    public $Email;
    public $Password;
    public $Role;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        // insert
        $query = "INSERT INTO " . $this->table_name . " (NamaPetugas, Alamat, NoTelp, Email, Password, Role)" .
                                " VALUES (:NamaPetugas, :Alamat, :NoTelp, :Email, :Password, :Role)";

        $result = $this->conn->prepare($query);

        $this->NamaPetugas = htmlspecialchars(strip_tags($this->NamaPetugas));
        $this->Alamat = htmlspecialchars(strip_tags($this->Alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Password = htmlspecialchars(strip_tags($this->Password));
        $this->Role = htmlspecialchars(strip_tags($this->Role));

        $result->bindParam(":NamaPetugas", $this->NamaPetugas);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":Email", $this->Email);
        $result->bindParam(":Password", $this->Password);
        $result->bindParam(":Role", $this->Role);

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

        $this->NamaPetugas = $row["NamaPetugas"];
        $this->Alamat = $row["Alamat"];
        $this->NoTelp = $row["NoTelp"];
        $this->Email = $row["Email"];
        $this->Password = $row["Password"];
        $this->Role = $row["Role"];
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET
                                                    NamaPetugas = :NamaPetugas,
                                                    Alamat = :Alamat,
                                                    NoTelp = :NoTelp,
                                                    Email = :Email,
                                                    Password = :Password,
                                                    Role = :Role
                                                    Where
                                                    ID = :ID";
        
        $result = $this->conn->prepare($query);

        $this->NamaPetugas = htmlspecialchars(strip_tags($this->NamaPetugas));
        $this->Alamat = htmlspecialchars(strip_tags($this->Alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Password = htmlspecialchars(strip_tags($this->Password));
        $this->Role = htmlspecialchars(strip_tags($this->Role));
        
        $result->bindParam(":NamaPetugas", $this->NamaPetugas);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":Email", $this->Email);
        $result->bindParam(":Password", $this->Password);
        $result->bindParam(":Role", $this->Role);
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