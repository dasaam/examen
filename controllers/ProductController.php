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

}