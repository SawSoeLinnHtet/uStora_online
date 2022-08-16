<?php 

namespace Libs\Database;

use PDOException;

class OrderTable
{
  private $db = null;

  public function __construct(MYSQL $db)
  {
    $this->db = $db->connect();
  }

  public function insert($product_id, $product_price, $total_price, $user_id, $quantity)
  {
    $query = "
      INSERT INTO orders
      (
        product_id,
        product_price,
        total_price,
        user_id,
        quantities,
        created_at
      ) VALUES (
        :product_id,
        :product_price,
        :total_price,
        :user_id,
        :quantities,
        now()
      )
    ";

    $statement = $this->db->prepare($query);

    $statement->execute(
      [
        ":product_id" =>$product_id,
        ":product_price" =>$product_price,
        ":total_price"=>$total_price,
        ":user_id"=>$user_id,
        ":quantities"=>$quantity
      ]
    );

    return $this->db->lastInsertId();
  }

  public function getAll()
  {
    $statement = $this->db->query(
      "SELECT orders.*,products.name AS name,products.image AS image,products.price AS price FROM orders LEFT JOIN products ON orders.product_id = products.id"
    );
    return $statement->fetchAll();
  }

  public function getAllOrders()
  {
    $query = "
      SELECT 
      orders.*, 
      products.name as product_name, 
      users.name as user_name 
      FROM products RIGHT JOIN orders 
      ON orders.product_id = products.id 
      LEFT JOIN users 
      ON orders.user_id = users.id
    ";

    $statement = $this->db->query($query);

    return $statement->fetchAll();
  }
}