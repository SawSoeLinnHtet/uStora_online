  <?php include("./layouts/header.php") ?>
    <div class="user-form-area register-area">
      <h4>
        Create Account
      </h4>
      <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">
          Account Created.Please Login 
        </div>
      <?php endif ?>
      <?php if(isset($_GET['fail'])): ?>
        <div class="alert alert-success">
          Account Cannot Create.Please register again 
        </div>
      <?php endif ?>
      <?php if(isset($_GET['password'])): ?>
        <div class="alert alert-success">
          Password doesn't Match
        </div>
      <?php endif ?>
      <form action="../../../HTTP/_actions/site/register.php" method="POST">
        <div class="form-row align-items-center p-4">
          <div class="col-sm-12 my-1 mt-1">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="text" class="form-control" id="inlineFormInputName" placeholder="Username..." name="name" required>
          </div>
          <div class="col-sm-12 my-1 mt-3">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="text" class="form-control" id="inlineFormInputName" placeholder="Email address..." name="email" required>
          </div>
          <div class="col-sm-6 my-1 mt-3">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="password" class="form-control" id="inlineFormInputName" placeholder="Password..." name="password" required>
          </div>
          <div class="col-sm-6 my-1 mt-3">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="password" class="form-control" id="inlineFormInputName" placeholder="Comfirm password..." name="comfirm-password" required>
          </div>
          <div class="col-sm-12 my-1 mt-3">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="password" class="form-control" id="inlineFormInputName" placeholder="Address..." name="address"> 
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
            <span class="p-2">Already registered?  <a href="./login.php">Login here</a></span>
            <button type="submit" class="btn text-light btn-sm px-4 ml-3 float-right" style="background-color: #E8AA42;">
              Register
            </button>
          </div>
        </div>
      </form>
    </div>
  <?php include("./layouts/footer.php") ?>