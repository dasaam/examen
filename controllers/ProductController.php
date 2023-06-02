<?php

class ProductController {
    public $productModel;

    public function __construct($productModel) {
        $this->productModel = $productModel;
    }

    public function getProducts() {
        return $this->productModel->getProducts();
    }

    public function addProduct($product) {
        return $this->productModel->addProduct($product);
    }
    
    public function getProductById($id) {
        return $this->productModel->getProductById($id);
    }

    public function updateProduct($product) {
        return $this->productModel->updateProduct($product);
    }

    public function deleteProduct($id) {
        return $this->productModel->deleteProduct($id);
    }
}