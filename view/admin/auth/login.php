<?php include("./layouts/header.php") ?>
    <div class="admin-form-area" style="background-color: #1f2234;">
      <h4>
        Admin Login 
      </h4>
      <br/>
      <div class="px-4">
        <?php if($_GET['Registered'] == 1): ?>
          <div class="alert alert-success">
            Account Created.Please Login 
          </div>
        <?php endif ?>

        <?php if(isset($_GET['Suspended'])): ?>
          <div class="alert alert-danger">
            Your Account is Suspended.
          </div> 
        <?php endif ?>

        <?php if (isset($_GET['incorrect'])) : ?>
          <div class="alert alert-warning">
            Incorrect Email or Password
          </div>
        <?php endif ?>
      </div>
      <form action="../../../HTTP/_actions/admin/login.php" method="POST">
        <div class="form-row align-items-center p-4">
          <div class="col-sm-12 my-1">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="text" class="form-control" id="inlineFormInputName" placeholder="Email address..." name="email" required>
          </div>
          <div class="col-sm-12 my-1 mt-3">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="password" class="form-control" id="inlineFormInputName" placeholder="Password..." name="password" required>
          </div>
          <div class="col-sm-12 my-1 mt-3">
            <span class="text-white">Not registered yet? <a href="./register.php" class="text-success">Register here</a></span>
            <button type="submit" class="btn btn-success btn-sm px-3 ml-3 float-right">
              Login
            </button>
          </div>
        </div>
      </form>
    </div>
<?php include("./layouts/footer.php") ?>