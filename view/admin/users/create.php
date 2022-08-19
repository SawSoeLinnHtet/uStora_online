<?php include("../layouts/header.php") ?>

  <?php include("../layouts/aside.php") ?>  
  
    <div class="col-lg-10 col-9 p-0 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-12 col-12">
            <h5 style="margin-left:20px;margin-top:20px">
              <i class="fa-solid fa-user-graduate text-white mr-3 ml-3" style="font-size:17px"></i>
              <span class="font-weight-bold text-white">
                Users Create Form
              </span>
            </h5>
          </div>
          <div class="col-12 pr-5">
            <div class="container">
              <form action="../../../HTTP/_actions/admin/users/create.php" method="POST">
                <div class="form-row align-items-center p-lg-4 p-0">
                <?php if (isset($_GET['incorrect'])) : ?>
                  <div class="alert alert-warning">
                    Incorrect Email or Password
                  </div>
                <?php endif ?>
                  <div class="col-sm-12 my-1 mt-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Username..." name="name" required>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Email address..." name="email" required>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="password" class="form-control" id="inlineFormInputName" placeholder="Password..." name="password" required>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Address..." name="address"> 
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Phone Number..."
                    name="phone-number">
                  </div>
                  <div class="col-sm-6 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="City..."
                    name="city" required>
                  </div>
                  <div class="col-sm-6 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Postal Code..." name="postal-code" required>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <button type="submit" class="btn text-light btn-sm px-5 float-left" style="background-color: #E8AA42;">
                      Create
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