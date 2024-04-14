<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class MotorcycleRepository extends Repository
{
    function getAll($offset = NULL, $limit = NULL)
    {
        $query = "SELECT * FROM motorcycles";
        if (isset($limit) && isset($offset)) {
            $query .= " LIMIT :limit OFFSET :offset ";
        }
        $stmt = $this->connection->prepare($query);
        if (isset($limit) && isset($offset)) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        }
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Motorcycle');
        $motorcycles = $stmt->fetchAll();

        return $motorcycles;
    }

    function getAllAvailableMotorcycles($offset = NULL, $limit = NULL)
    {
        $query = "SELECT * FROM motorcycles WHERE sold = 0";
        if (isset($limit) && isset($offset)) {
            $query .= " LIMIT :limit OFFSET :offset ";
        }
        $stmt = $this->connection->prepare($query);
        if (isset($limit) && isset($offset)) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        }
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Motorcycle');
        $motorcycles = $stmt->fetchAll();

        return $motorcycles;
    }

    function getOne($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM motorcycles WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Motorcycle');
        $motorcycles = $stmt->fetch();

        return $motorcycles;
    }

    function insert($motorcycle)
    {
        $stmt = $this->connection->prepare("INSERT INTO `motorcycles`(`brand`, `type`, `constructionYear`, `price`, `power`, `mass`, `engine`, `accessories`, `img_url`, `sold`)
        VALUES (:brand, :type, :constructionYear, :price, :power, :mass, :engine, :accessories, :img_url, 0)");
        $stmt->bindParam(':brand', $motorcycle->brand);
        $stmt->bindParam(':type', $motorcycle->type);
        $stmt->bindParam(':constructionYear', $motorcycle->constructionYear);
        $stmt->bindParam(':price', $motorcycle->price);
        $stmt->bindParam(':power', $motorcycle->power);
        $stmt->bindParam(':mass', $motorcycle->mass);
        $stmt->bindParam(':engine', $motorcycle->engine);
        $stmt->bindParam(':accessories', $motorcycle->accessories);
        $stmt->bindParam(':img_url', $motorcycle->img_url);
        $stmt->execute();
        
        $motorcycle->id = $this->connection->lastInsertId();
        
        return $motorcycle;
    }


    function update($motorcycle, $id)
    {
        $stmt = $this->connection->prepare("UPDATE `motorcycles` SET 
            `brand` = :brand, 
            `type` = :type, 
            `constructionYear` = :constructionYear, 
            `price` = :price, 
            `power` = :power, 
            `mass` = :mass, 
            `engine` = :engine, 
            `accessories` = :accessories, 
            `img_url` = :img_url,
            `sold` = :sold
            WHERE `id` = :id");

        $stmt->bindParam(':brand', $motorcycle->brand);
        $stmt->bindParam(':type', $motorcycle->type);
        $stmt->bindParam(':constructionYear', $motorcycle->constructionYear);
        $stmt->bindParam(':price', $motorcycle->price);
        $stmt->bindParam(':power', $motorcycle->power);
        $stmt->bindParam(':mass', $motorcycle->mass);
        $stmt->bindParam(':engine', $motorcycle->engine);
        $stmt->bindParam(':accessories', $motorcycle->accessories);
        $stmt->bindParam(':img_url', $motorcycle->img_url);
        $stmt->bindParam(':sold', $motorcycle->sold, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $motorcycle;
    }

    function delete($id)
    {
        $stmt = $this->connection->prepare("DELETE FROM motorcycles WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;
    }
}
