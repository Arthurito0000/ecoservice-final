<?php

class DemandeModel {//ghfgfgfgfhgfgfg
    private $conn;
    private $table_name = 'demande_devis';

    public function __construct($db) {
        $this->conn = $db->getConnection();
    }

    public function getProductById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


}

?>