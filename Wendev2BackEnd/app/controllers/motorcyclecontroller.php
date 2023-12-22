<?php

namespace Controllers;

use Exception;
use Services\MotorcycleService;

class MotorcycleController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new MotorcycleService();
    }


    public function getAll()
    {
        // Get the limit and offset values from the query string
        $limit = isset($_GET['limit']) ? $_GET['limit'] : null;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : null;

        // Call the getAll method from the service
        $motorcycles = $this->service->getAll($offset, $limit);

        // Respond with the motorcycles
        $this->respond($motorcycles);
    }

    public function getOne($id)
    {
        $motorcycle = $this->service->getOne($id);

        // Check if the motorcycle is not found in the DB
        if (!$motorcycle) {
            $this->respondWithError(404, "Motorcycle not found");
        } else {
            $this->respond($motorcycle);
        }
    }

    public function create()
    {
        try {
            $motorcycle = $this->createObjectFromPostedJson("Models\Motorcycle");

            // Insert the motorcycle into the database
            $insertedMotorcycle = $this->service->insert($motorcycle);

            // Respond with the inserted motorcycle
            $this->respond($insertedMotorcycle);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function update($id)
    {
        try {
            $motorcycle = $this->createObjectFromPostedJson("Models\Motorcycle");

            // Update the motorcycle in the database
            $updatedMotorcycle = $this->service->update($motorcycle, $id);

            // Respond with the updated motorcycle
            $this->respond($updatedMotorcycle);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->service->delete($id);
            $this->respond(true);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
}
