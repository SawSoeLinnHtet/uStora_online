<?php

  include("../../../vendor/autoload.php");

  use Libs\Database\UsersTable;
  use Libs\Database\MYSQL;

  $id = $_GET["uuid"] ?? "undefined";
  $table = new UsersTable(new MYSQL());
  $user = $table->findById($id);
?>  
<?php include("../layouts/header.php") ?>

  <?php include("../layouts/aside.php") ?>  
  
    <div class="col-10 p-0 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h5 style="margin-left:20px;margin-top:20px">
              <i class="fa-solid fa-user-graduate text-white mr-3 ml-3" style="font-size:17px"></i>
              <span class="font-weight-bold text-white">
                Users Edit Form
              </span>
            </h5>
          </div>
          <div class="col-6 pr-5">
            <div class="container"> 
              <form 
              action="../../../HTTP/_actions/admin/users/edit.php?uuid=<?= $user[0]->id ?>" method="POST">
                <div class="form-row align-items-center p-4">
                <?php if (isset($_GET['incorrect'])) : ?>
                  <div class="alert alert-warning">
                    Incorrect Email or Password
                  </div>
                <?php endif ?>
                  <div class="col-sm-12 my-1 mt-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Username..." name="name" required value="<?= $user[0]->name ?>">
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Email address..." name="email" required value="<?= $user[0]->email ?>">
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Address..." name="address" value="<?= $user[0]->address ?>"> 
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Phone Number..."
                    name="phone-number" value="<?= $user[0]->phone_number ?>">
                  </div>
                  <div class="col-sm-6 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="City..."
                    name="city" required value="<?= $user[0]->city ?>">
                  </div>
                  <div class="col-sm-6 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Postal Code..." name="postal-code" required value="<?= $user[0]->postal_code ?>">
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <button type="submit" class="btn text-light btn-sm px-5 float-left" style="background-color: #E8AA42;">
                      Edit
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include("../layouts/footer.php") ?>