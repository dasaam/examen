<?php 

class Product {
    public $id;
    public $name;
    public $price;
    public $quantity;
    
    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    
}

class ProductModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getProducts() {
        $sql = "SELECT * FROM products";
        $stmt = $this->conexion->query($sql);
        $productos = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $producto = new Product($row['name'], $row['price'], $row['quantity']);
            $producto->setId($row['id_product']);
            array_push($productos, $producto);
        }

        return $productos;
    }

}