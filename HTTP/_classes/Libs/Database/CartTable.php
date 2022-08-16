<?php 

namespace Libs\Database;

use PDOException;

class CartTable
{
  private $db = null;

  public function __construct(MYSQL $db)
  {
    $this->db = $db->connect();
  }

  public function insert($cart)
  {
    try{
      $query = "
        INSERT INTO 
        carts (
          product_id,
          product_image, 
          product_name, 
          product_price, 
          user_id, 
          quantity, 
          created_at
        ) VALUES (
          :product_id,
          :product_image,
          :product_name,
          :product_price,
          :user_id,
          :quantity,
          now()
        ) 
      ";
      $statement = $this->db->prepare($query);

      $statement->execute($cart);

      return $this->db->lastInsertId();
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  public function getByUserId($id)
  {
    $query = "SELECT * from carts WHERE user_id=:user_id";

    $statement = $this->db->prepare($query);

    $statement->execute([":user_id"=>$id]);

    $row = $statement->fetchAll();

    return $row;
  }

  public function delete($id)
  {
    $statement = $this->db->prepare(
      "DELETE FROM carts WHERE id=:id"
    );
    $statement->execute(["id"=>$id]);

    return $statement->rowCount();
  }

  public function removeAllByUserid($id)
  {
    $statement = $this->db->prepare(
      "DELETE FROM carts WHERE user_id=:user_id"
    );

    $statement->execute([
      "user_id"=>$id
    ]);

    return $statement->rowCount();
  }

  public function getQuantityById($id)
  {
    $query = "SELECT quantity from carts WHERE id=:id";

    $statement = $this->db->prepare($query);

    $statement->execute([":id"=>$id]);

    $row = $statement->fetchAll();
  
    return $row;
  }

  public function plusOne($id, $quantity)
  {
    $statement = $this->db->prepare(
      "UPDATE carts SET quantity=:quantity WHERE id=:id"
    );

    $statement->execute(
      [":id"=>$id,":quantity"=>$quantity]
    );

    $statement->rowCount();
  }
}