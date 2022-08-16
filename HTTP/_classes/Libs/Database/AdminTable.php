<?php 

namespace Libs\Database;

use PDOException;

class AdminTable
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
        INSERT INTO admin (
          name,
          email,
          address,
          phone_number,
          password,
          created_at
        )  VALUES (
          :name,
          :email,
          :address,
          :phone_number,
          :password,
          now()
        )
      ";
      $statement = $this->db->prepare($query);

      $statement->execute($data);

      return $this->db->lastInsertId();
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  
  public function getAll(){
    $statement = $this->db->query(
      "
        SELECT
        admin.*,roles.name As role 
        FROM admin LEFT JOIN roles
        ON admin.role_id = roles.id
      "
    );
    return $statement->fetchAll();
  }

  public function findByEmailAndPassword($email, $password)
  {

    $statement = $this->db->prepare(
      "
      SELECT * FROM admin
      WHERE email = :email
      AND password = :password
      "
    );

    $statement->execute(
      [
        ":email"=>$email,
        ":password"=>$password
      ]
    );

    $row = $statement->fetchAll();

    return $row ?? false;
  }   

  public function suspended($id)
  {
    $statement = $this->db->prepare(
      "SELECT * FROM admin WHERE id = :id"
    );
    $statement->execute([":id" => $id]);

    $row = $statement->fetch();
    return $row->suspended;
  } 
}