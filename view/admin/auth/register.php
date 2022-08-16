<?php include("./layouts/header.php") ?>
    <div class="admin-form-area register-area" style="background-color: #1f2234;">
      <h4>
        Create Account
      </h4>
      <form action="../../../HTTP/_actions/admin/register.php" method="POST">
        <div class="form-row align-items-center p-4">
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
          <!-- <div class="col-sm-6 my-1 mt-3">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="text" class="form-control" id="inlineFormInputName" placeholder="City..."
            name="city" required>
          </div>
          <div class="col-sm-6 my-1 mt-3">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="text" class="form-control" id="inlineFormInputName" placeholder="Postle Code..." name="postle-code" required>
          </div> -->
          <div class="col-sm-12 my-1 mt-3">
            <span class="p-2 text-white">Already registered?  <a href="./login.php" class="text-success">Login here</a></span>
            <button type="submit" class="btn btn-success btn-sm px-4 ml-3 float-right">
              Register
            </button>
          </div>
        </div>
      </form>
    </div>
  <?php include("./layouts/footer.php") ?>  