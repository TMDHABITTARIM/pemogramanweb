<?php

namespace app\Controller;
include "../app/Traits/ApiResponseFormatter.php";
include "E:\DOCUMENTS\KULIAH DHABIT\semester 5\Pemograman Web\mod4\T2-BE\T2-BE\app\Models\Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    use ApiResponseFormatter;

    public function index()
    {
        $ProductModel = new Product();
        $response = $ProductModel->findAll();
    
        if (empty($response)) {  
            return $this->apiResponse(404, "No data found", []);
        }else{
            return $this->apiResponse(200, "success", $response);
        }
        
    }
    

    public function insert()
    {

        $jsonInput = file_get_contents("php://input");
        $inputData = json_decode($jsonInput, true);
        if (!isset($inputData['nama_product'])) {
            return $this->apiResponse(400, "Error: Invalid input", null);
        }

        $ProductModel = new Product();
        $response = $ProductModel->create($inputData);
        
        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        $jsonInput = file_get_contents("php://input");
        $inputData = json_decode($jsonInput, true);

        if (!isset($inputData['nama_product'])) {
            return $this->apiResponse(400, "Error: Invalid input", null);
        }

        $ProductModel = new Product();
        $response = $ProductModel->update($inputData, $id);
        
        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $ProductModel = new Product();
        $response = $ProductModel->delete($id);
        
        return $this->apiResponse(200, "success", $response);
    }
}