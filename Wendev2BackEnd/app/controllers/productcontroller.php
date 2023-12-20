<?php

namespace Controllers;

use Exception;
use Services\ProductService;

class ProductController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new ProductService();
    }

    public function getAll()
    {
        // Get the limit and offset values from the query string
        $limit = isset($_GET['limit']) ? $_GET['limit'] : null;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : null;

        // Call the getAll method from the service
        $products = $this->service->getAll($offset, $limit);

        // Respond with the products
        $this->respond($products);
        // this code seems to have been lost
    }

    public function getOne($id)
    {
        $product = $this->service->getOne($id);

        // we might need some kind of error checking that returns a 404 if the product is not found in the DB
        if(!$product) {
            $this->respondWithError(404, "Product not found");
        }else {
            $this->respond($product);
        }

    }

    public function create()
    {//here
        try {
            $product = $this->createObjectFromPostedJson("Models\Product");

            // Insert the product into the database
            $insertedProduct = $this->service->insert($product);
            
            // Respond with the inserted product
            $this->respond($insertedProduct);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($product);
    }

    public function update($id)
    {
        try {
            $product = $this->createObjectFromPostedJson("Models\Product");
            // Insert the product into the database
            $updatedProduct = $this->service->update($product, $id);
            
            // Respond with the inserted product
            $this->respond($updatedProduct);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
    
    public function delete($id){
        try {
            $this->service->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
}
