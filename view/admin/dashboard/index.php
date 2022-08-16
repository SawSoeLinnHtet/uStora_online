<?php 
  include("../layouts/header.php");
?>
    <?php include("../layouts/aside.php") ?>
      <div class="col-9 col-lg-10 p-0">
        <div class="container bg-dark">
          <h5 style="line-height: 70px;margin-left:20px">
            <i class="fa-solid fa-house text-white mr-3" style="font-size:17px"></i>
            <span class="font-weight-bold text-white">
              Dashboard
            </span>
          </h5>
          <div class="row">
            <div class="col-12 col-lg-4 p-3">
              <div class="profits p-3" style="border-radius:10px;background-image: linear-gradient( 109.6deg, rgba(156,252,248,1) 11.2%, rgba(110,123,251,1) 91.1% );">
                <i class="fa-solid fa-clipboard-list ml-3 text-light" style="font-size: 18px;display:block"></i>
                <span style="font-size: 15px;font-weight:bold" class="ml-3 mt-2 d-block text-white">
                  Stock Total
                </span>
                <span style="font-size: 18px;font-weight:bold" class="ml-3 mt-2 d-block text-white">
                  $1,500,000
                </span>
                <span style="font-size: 12px;font-weight:bold" class="ml-3 mt-5 d-block text-white">
                  Increase by 50%
                </span>
              </div>
            </div>
            <div class="col-12 col-lg-4 p-3">
              <div class="profits p-3" style="border-radius:10px;background-image: linear-gradient(to right, #8360c3, #2ebf91);">
                <i class="fa-solid fa-clipboard-list ml-3 text-light" style="font-size: 18px;display:block"></i>
                <span style="font-size: 15px;font-weight:bold" class="ml-3 mt-2 d-block text-white">
                  Total Profit
                </span>
                <span style="font-size: 18px;font-weight:bold" class="ml-3 mt-2 d-block text-white">
                  $120,000
                </span>
                <span style="font-size: 12px;font-weight:bold" class="ml-3 mt-5 d-block text-white">
                  Increase by 20%
                </span>
              </div>
            </div>
            <div class="col-12 col-lg-4 p-3">
              <div class="profits p-3" style="border-radius:10px;background-image: linear-gradient(to right, #00b4db, #0083b0);">
                <i class="fa-solid fa-clipboard-list ml-3 text-light" style="font-size: 18px;display:block"></i>
                <span style="font-size: 15px;font-weight:bold" class="ml-3 mt-2 d-block text-white">
                  Unique Visitors
                </span>
                <span style="font-size: 18px;font-weight:bold" class="ml-3 mt-2 d-block text-white">
                  $50,000,000
                </span>
                <span style="font-size: 12px;font-weight:bold" class="ml-3 mt-5 d-block text-white">
                  Increase by 90%
                </span>
              </div>
            </div>
          </div>
          <div class="row p-3">
            <div class="basic-table-design bg-light p-3 w-100" style="border-radius: 10px;">
              <div>
                <h5 style="line-height: 70px;margin-left:20px">
                  <i class="fa-solid fa-table-list mr-3" style="font-size:17px"></i>
                  <span class="font-weight-bold d-none d-lg-inline">
                    Basic Table Design
                  </span>
                </h5>
                <div class="container bg-light table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Joined</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="">Louis</td>
                        <td>louis@gmail.com</td>
                        <td>Admin</td>
                        <td>12-03-1999</td>
                        <td>
                          <p>
                            <i class="fa-solid fa-circle text-success mr-2"></i>
                            <span class="font-weight-bold"> Active</span>
                          </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="">Louis</td>
                        <td>louis@gmail.com</td>
                        <td>Admin</td>
                        <td>12-03-1999</td>
                        <td>
                          <p>
                            <i class="fa-solid fa-circle text-danger mr-2"></i>
                            <span class="font-weight-bold"> Offline</span>
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php include("../layouts/footer.php") ?>