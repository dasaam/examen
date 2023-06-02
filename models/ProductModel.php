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

    public function addProduct($product) {
        try {
            $sql = "INSERT INTO products (name, price, quantity) VALUES (:name, :price, :quantity)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindValue(':name', $product->getName());
            $stmt->bindValue(':price', $product->getPrice());
            $stmt->bindValue(':quantity', $product->getQuantity());
            $stmt->execute();

            $product->setId($this->conexion->lastInsertId());
            
            return $product;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id_product = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $product = new Product($row['name'], $row['price'], $row['quantity']);
            $product->setId($row['id_product']);
            return $product;
        } else {
            return null;
        }
    }

    public function updateProduct($product) {
        try {
            $sql = "UPDATE products SET name = :name, price = :price, quantity = :quantity WHERE id_product = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':name', $product->getName());
            $stmt->bindParam(':price', $product->getPrice());
            $stmt->bindParam(':quantity', $product->getQuantity());
            $stmt->bindParam(':id', $product->getId());
            $stmt->execute();
            return $product;
        } catch (PDOException $e) {
            return null;
        }
    }

}