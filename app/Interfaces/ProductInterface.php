<?php
namespace App\Interfaces;

interface ProductInterface{
    public function saveProduct($userId,$request);
    public function getProducts($userId);
    public function deleteProductDetails($id);
}