<?php 

namespace Libs\Database;

use PDOException;

class ProductTable
{
  private $db = null;

  public function __construct(MYSQL $db)
  {
    $this->db = $db->connect();
  }

  public function insert($data)
  {
    try{
      $query = "
        INSERT INTO products (name, category_id, quantity, price, created_at, image, description, summary) VALUES (:name, :category_id, :quantity, :price, now(), :image, :description, :summary)
      ";

    $statement = $this->db->prepare($query);
    
    $statement->execute($data);

    return $this->db->lastInsertId();
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }

  public function getAll()
  {
    $statement = $this->db->query(
      "SELECT 
      products.*, categories.name AS category
      FROM products LEFT JOIN categories 
      ON products.category_id = categories.id"
    );

    return $statement->fetchAll();
  }

  public function delete($id)
  {
    $statement = $this->db->prepare(
      "DELETE FROM products WHERE id=:id"
    );

    $statement->execute(
      [":id"=>$id]
    );

    return $statement->rowCount();
  }

  public function getById($id)
  {
    $statement = $this->db->prepare(
      "SELECT
        products.*, 
        categories.name 
      AS category 
      FROM products LEFT JOIN categories ON products.category_id = categories.id 
      WHERE products.id=:id"
    );

    $statement->execute([":id"=>$id]);

    $row = $statement->fetchAll();

    return $row; 
  }

  public function edit($id, $name, $category_id, $quantity, $price, $image, $description, $summary)
  {

    $statement = $this->db->prepare(
      "UPDATE products SET name=:name, category_id=:category_id, quantity=:quantity, price=:price,description=:description, summary=:summary, image=:image WHERE id=:id"
    );

    $statement->execute(
      [
        "id" => $id,
        "name" => $name,
        "category_id" => $category_id,
        "quantity" => $quantity,
        "price" => $price,
        "image" => $image,
        "description" => $description,
        "summary" => $summary
      ]
    );

    return $statement->rowCount();
  }
}