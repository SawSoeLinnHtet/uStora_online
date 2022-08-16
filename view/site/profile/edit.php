<?php

  include("../../../vendor/autoload.php");

  use Libs\Database\UsersTable;
  use Libs\Database\MYSQL;

  $table = new UsersTable(new MYSQL());

  $id = $_GET["uid"] ?? "undefined";

  $user = $table->findById($id);

?>

<?php include("../layouts/header.php") ?>
<section>
  <div class="contianer p-5">
    <h3 style="color: #E8AA42;" class="ml-3">
      Edit Your Profile
    </h3>
    <div class="col-12 mt-4">
      <form action="../../../HTTP/_actions/site/users/edit.php?uid=<?= $user[0]->id ?>&&uimg=<?= $user[0]->image ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="inputUser1" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputUser1" name="name" value=<?= $user[0]->name ?>>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail2" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail2" name="email" value=<?= $user[0]->email ?>>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputAddress4" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" name="address" value=<?= $user[0]->address ?>>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" name="phone-number" value=<?= $user[0]->phone_number ?>>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Upload</label>
          <div class="col-sm-10">
            <img src="../../../public/images/users/<?= $user[0]->image ?>" alt="profile_img" style="height:150px">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Upload</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="inputPassword3" name= "cover-image">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">City</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" name= "city" value="<?= $user[0]->city ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Postal Code</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" name="postal-code" value=<?= $user[0]->postal_code?>>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>


<?php include("../layouts/footer.php") ?>