<?php 

  namespace Libs\Database;

  use PDOException;

  class UsersTable
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
          INSERT INTO users (
          name, 
          email, 
          password,
          address, 
          phone_number, 
          city,
          postal_code,
          created_at
          ) VALUES (
          :name,
          :email,
          :password,
          :address,
          :phone_number,
          :city,
          :postal_code,
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

    public function getAll()
    {
      $statement = $this->db->query(
        "SELECT 
        users.*,roles.name AS role
        FROM users LEFT JOIN roles
        ON users.role_id = roles.id
        "
      );

      return $statement->fetchAll();
    }

    public function findByEmailAndPassword($email, $password)
    {
      $statement = $this->db->prepare(
        "
        SELECT * FROM users
        WHERE email = :email 
        AND password = :password
      ");
      
      $statement->execute(
        ["email"=>$email,
        "password"=>$password]
      );
      
      $row = $statement->fetchAll();
      
      return $row ?? false;
    }

    public function delete($id)
    {
      $statement = $this->db->prepare(
        "DELETE FROM users WHERE id=:id"
      );

      $statement->execute([":id"=>$id]);

      return $statement->rowCount();
    }

    public function findById($id)
    { 
      $statement = $this->db->prepare(
        "SELECT * FROM users
        WHERE id = :id"
      );
      $statement->execute(["id" => $id]);

      $row = $statement->fetchAll();

      return $row;
    }

    public function edit($id, $name, $email, $address, $phone_number, $city, $postal_code)
    {
      $query = "
      UPDATE users SET
        name=:name, 
        email=:email, 
        address=:address, 
        phone_number=:phone_number, 
        city=:city, 
        postal_code=:postal_code,
        updated_at=now()
      WHERE id=:id";

      $statement = $this->db->prepare($query);

      $statement->execute(
        [
          ":name"=>$name,
          ":email"=>$email,
          ":address"=>$address,
          ":phone_number"=>$phone_number,
          ":city"=>$city,
          ":postal_code"=>$postal_code,
          ":id"=>$id
        ]
      );
      
      return $statement->rowCount();
    }

    public function suspended($id)
    {
      $statement = $this->db->prepare(
        "SELECT * FROM users WHERE id=:id"
      );

      $statement->execute(["id"=>$id]);

      $row = $statement->fetch();

      return $row->suspended;
    }

    public function siteEdit($id, $name, $email, $image, $address, $phone_number, $city, $postal_code)
    {
      $query = "
      UPDATE users SET
        name=:name, 
        email=:email, 
        image=:image,
        address=:address, 
        phone_number=:phone_number, 
        city=:city, 
        postal_code=:postal_code
      WHERE id=:id";

      $statement = $this->db->prepare($query);

      $statement->execute(
        [
          ":name"=>$name,
          ":email"=>$email,
          ":image"=>$image,
          ":address"=>$address,
          ":phone_number"=>$phone_number,
          ":city"=>$city,
          ":postal_code"=>$postal_code,
          ":id"=>$id
        ]
      );
      
      return $statement->rowCount();
    }

    public function suspend($id, $suspended)
    {
      $statement = $this->db->prepare(
        "UPDATE users SET suspended=:suspended WHERE id=:id"
      );
      $statement->execute(
        [
          ":id"=>$id,
          ":suspended"=>$suspended
        ]
      );

      return $statement->rowCount();
    }
  }