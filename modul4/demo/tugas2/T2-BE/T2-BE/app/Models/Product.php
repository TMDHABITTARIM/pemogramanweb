<?php

namespace app\Models;
include "../app/config/DatabaseConfig.php";

use app\Config\DatabaseConfig;
use mysqli;

class Product extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {

        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }


    public function findAll()
    {
        $sql = "SELECT * FROM product";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
    
        
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }


    public function findById($id)
    {
        $sql = "SELECT * FROM product WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();
        $data = [];
        
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
    }


    public function create($data)
    {
        
        $productName = $data['nama_product'];
        $deskripsiProduct = $data['deksripsi_product'];
        $hargaProduct = $data['harga_product'];
        $gambarProduct = $data['gambar_product'];

        $query = "INSERT INTO Product (nama_product,deksripsi_product,harga_product,gambar_product) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssis", $productName,$deskripsiProduct,$hargaProduct,$gambarProduct);
        $stmt->execute();
        $this->conn->close();
    }


    public function update($data, $id)
    {
        $ProductTitle = $data['nama_product'];
        $query = "UPDATE product SET nama_product = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $ProductTitle, $id);
        $stmt->execute();
        $this->conn->close();
    }


    public function delete($id)
    {
        $query = "DELETE FROM product WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}