  <?php include("./layouts/header.php") ?>
    <div class="user-form-area">
      <h4>
        Login Account
      </h4>
      <?php if(isset($_GET['incorrect'])): ?>
        <div class="alert alert-success ml-2">
          Incorrect Email or Password!
        </div>
      <?php endif ?>
      <?php if(isset($_GET['suspended'])): ?>
        <div class="alert alert-success px-3">
          Your Account is Suspended!
        </div> 
      <?php endif ?>
      <form action="../../../HTTP/_actions/site/login.php" method="POST">
        <div class="form-row align-items-center p-4">
          <div class="col-sm-12 my-1 mt-3">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="text" class="form-control" id="inlineFormInputName" placeholder="Email address..." name="email" required>
          </div>
          <div class="col-sm-12 my-1 mt-3">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="password" class="form-control" id="inlineFormInputName" placeholder="Password..." name="password" required>
          </div>
          <div class="col-sm-12 my-1 mt-3">
            <span>Not registered yet? <a href="./register.php">Register here</a></span>
            <button type="submit" class="btn btn-sm text-light px-3 ml-3 float-right" style="background-color: #E8AA42;">
              Login
            </button>
          </div>
        </div>
      </form>
    </div>
  <?php include("./layouts/footer.php") ?>