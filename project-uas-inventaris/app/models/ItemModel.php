<?php
class ItemModel {
    private $db;
    private $table = 'items';

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll($page = 1, $keyword = null) {
        $limit = 5;
        $start = ($page - 1) * $limit;
        
        $sql = "SELECT * FROM " . $this->table;
        if ($keyword) {
            $sql .= " WHERE name LIKE '%$keyword%' OR category LIKE '%$keyword%'";
        }
        $sql .= " ORDER BY id DESC LIMIT $start, $limit";
        
        $result = $this->db->conn->query($sql);
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function countItems($keyword = null) {
        $sql = "SELECT COUNT(*) as total FROM " . $this->table;
        if ($keyword) {
            $sql .= " WHERE name LIKE '%$keyword%' OR category LIKE '%$keyword%'";
        }
        return $this->db->conn->query($sql)->fetch_assoc()['total'];
    }

    public function getById($id) {
        return $this->db->conn->query("SELECT * FROM items WHERE id=$id")->fetch_assoc();
    }

    public function add($data) {
        $name = $data['name'];
        $cat = $data['category'];
       
        $price = str_replace('.', '', $data['price']); 
        $stock = $data['stock'];
        
        
        $sql = "INSERT INTO items (name, category, price, stock) 
                VALUES ('$name', '$cat', '$price', '$stock')";
                
        return $this->db->conn->query($sql);
    }
    // ------------------------------------------

    public function update($data) {
        $id = $data['id'];
        $name = $data['name'];
        $cat = $data['category'];
    
        $price = str_replace('.', '', $data['price']);
        $stock = $data['stock'];
        
        $sql = "UPDATE items SET name='$name', category='$cat', price='$price', stock='$stock' WHERE id=$id";
        return $this->db->conn->query($sql);
    }

    public function delete($id) {
        return $this->db->conn->query("DELETE FROM items WHERE id=$id");
    }
}