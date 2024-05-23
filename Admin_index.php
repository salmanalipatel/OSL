  <?php
  session_start();
  include "includes/config.php";

  if(!isset($_SESSION["username"]))
  {
    header("location:Admin_index.php");
  }

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
    
  </head>

  <style>
    .logo-btns {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 10px 0px;
      }
      
      .logo-btns a {
      border-radius: 0;
      line-height: normal;
      padding: 12px 40px;
      margin-bottom: 0px !important;
      background: #111470;
      border: none;
      font-size: 16px;
      font-family: 'satoshi';
      transition: all ease 500ms;
  }
      
      .logo-btns h2 {
          margin-bottom: 0px !important;
      }
      
      .logo-btns a:hover {
          background: #5d5d5d;
          transition: all ease 500ms;
      }

      form.datesearch-form {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 0px;
      }

      form.datesearch-form h2 {
      text-transform: uppercase;
      font-weight: 100;
      }

      .admin-search-date input {
      border: 2px solid #ccc;
      font-size: 16px;
      font-family: 'satoshi';
      padding: 7px 12px;
  }
  .admin-search-date label {
      padding: 0px 10px;
      font-size: 18px;
      font-weight: 700;
  }
  span.search-barr {
      position: relative;
  }

  span.search-barr button {
      position: absolute;
      right: 5px;
      font-size: 20px;
      top: 5px;
      border: none;
      background: transparent;
      transition: all ease 500ms;
      color: #ccc;
  }

  span.search-barr:hover button {
      transition: all ease 500ms;
      color: #000;
  }
  a.eye-icon {
      padding-right: 10px;
      color: #000;
  }
  .admin-search-date {
    display: flex;
    align-items: center;
}
  </style>


    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    </nav>
    <div class="container">
      <?php
      if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      ?>
  <div class="top-head mb-4">
      <div class="logo-btns">
          <img src="assets/logo-new.png">
          <div class="login-btns">
          <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>
          <a href="logout.php" class="btn btn-dark mb-3">Logout</a>
          </div>
      </div>    

  <form id="form" class="datesearch-form" action="" method="GET"> 
  <h2>Admin Dashboard</h2>
  <div class="admin-search-date">
      <span class="search-barr">
    <input type="search" id="query" name="q" VALUE="<?php if(isset($_GET['q'])){echo $_GET['q']; }   ?>" placeholder="Search...">
    <button class="search-icon-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
  </span>
   <form id="form2" class="datesearch-form" action="" method="GET">
    <label>From</label><input type="date"  value="<?php if(isset($_GET['startdate'])){ echo $_GET['startdate']; } ?>"   name="startdate" >
    <label>To</label><input type="date"    value="<?php if(isset($_GET['enddate'])){ echo $_GET['enddate']; } ?>" onchange="this.form.submit();" name="enddate">
  </div>
  </form>
  
    <!-- </span>
    <label>From</label><input type="date"  value="<?php if(isset($_GET['startdate'])){ echo $_GET['startdate']; } ?>"   name="startdate" >
    <label>To</label><input type="date"    value="<?php if(isset($_GET['enddate'])){ echo $_GET['enddate']; } ?>" name="enddate">
  </div>
  </form> -->


  <!-- <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
  <input type="date" name="to_date" onchange="this.form.submit();" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
  <button type="submit" class="btn btn-primary">Filter</button> -->

  </div>

      <!-- <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>
      <a href="logout.php" class="btn btn-dark mb-3">Logout</a> -->

      <table class="table table-hover text-center">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Client Name</th>
            <th scope="col">Client Code</th>
            <th scope="col">Email</th>
            <th scope="col">Date Of Account Opening</th>
            <th scope="col">Contact No</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

        <?php 
         
          $con = mysqli_connect("localhost","oslcompk","Rahim2020","oslcompk_oriental");

          if(isset($_GET['q']))
          {
              $filtervalues = $_GET['q'];
              $query = "SELECT * FROM crud WHERE CONCAT(Client_name,Client_code,email) LIKE '%$filtervalues%' ";
              $query_run = mysqli_query($con, $query);

              if(mysqli_num_rows($query_run) > 0)
              {
                  foreach($query_run as $items)
                  {
                      ?>
                      <tr>
                          <td><?= $items['id']; ?></td>
                          <td><?= $items['Client_name']; ?></td>
                          <td><?= $items['Client_code']; ?></td>
                          <td><?= $items['email']; ?></td>
                          <td><?= $items['datepicker']; ?></td>
                          <td><?= $items['Contact_no']; ?></td>
                          <td><?= $items['Status']; ?></td>
                          
                          
                          <td>
              <a class="eye-icon" href="View.php?id=<?php echo $items["id"] ?>" class="link-dark"><i class="fa-solid fa-eye"></i></a>
                <a href="edit.php?id=<?php echo $items["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete.php?id=<?php echo $items["id"] ?>" class="link-dark" onclick="return confirm('Are you sure that you want delete?')"><i class="fa-solid fa-trash fs-5"></i></a>
              </td>
                      </tr>
                      <?php
                  }
              }
              else
              {
                  ?>
                      <tr>
                          <td colspan="6">No Record Found</td>
                      </tr>
                  <?php
              }
            }
      ?>


  <?php 
         
          $con = mysqli_connect("localhost","oslcompk","Rahim2020","oslcompk_oriental");

                                  if(isset($_GET['startdate']) && isset($_GET['enddate']))
                                  {
                                      $startdate = $_GET['startdate'];
                                      $enddate = $_GET['enddate'];

                                      $query = "SELECT * FROM crud WHERE datepicker BETWEEN '$startdate' AND '$enddate' ";
                                      $query_run = mysqli_query($con, $query);

                                      if(mysqli_num_rows($query_run) > 0)
                                      {
                                          foreach($query_run as $row)
                                          {
                                              ?>
                                              <tr>
                                                  <td><?= $row['id']; ?></td>
                                                  <td><?= $row['Client_name']; ?></td>
                                                  <td><?= $row['Client_code']; ?></td>
                                                  <td><?= $row['email']; ?></td>
                                                  <td><?= $row['datepicker']; ?></td>
                                                  <td><?= $row['Contact_no']; ?></td>
                                                  <td><?= $row['Status']; ?></td>
                                                  <td>
                                                  <a class="eye-icon" href="View.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-eye"></i></a>
                <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark" onclick="return confirm('Are you sure that you want delete?')"><i class="fa-solid fa-trash fs-5"></i></a>
                                                  </td>
                                              </tr>
                                              <?php
                  }
              }
              else
              {
                  ?>
                      <tr>
                          <td colspan="6">No Record Found</td>
                      </tr>
                  <?php
              }
            }
      ?>
 <?php
         
          $con = mysqli_connect("localhost","oslcompk","Rahim2020","oslcompk_oriental");
          if(!isset($_GET['q']) && !isset($_GET['startdate']) && !isset($_GET['enddate'])){
          $sql = "SELECT * FROM crud";
          $query_run = mysqli_query($con, $sql);

          if(mysqli_num_rows($query_run) > 0)
                                      {
                                          foreach($query_run as $row)
                                          {
                                              ?>
                                              <tr>
                                                  <td><?= $row['id']; ?></td>
                                                  <td><?= $row['Client_name']; ?></td>
                                                  <td><?= $row['Client_code']; ?></td>
                                                  <td><?= $row['email']; ?></td>
                                                  <td><?= $row['datepicker']; ?></td>
                                                  <td><?= $row['Contact_no']; ?></td>
                                                  <td><?= $row['Status']; ?></td>
                                                  <td>
                <form method='post' action="pdf_curd.php">
                <a class="eye-icon" href="View.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-eye"></i></a>
                <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark" onclick="return confirm('Are you sure that you want delete?')"><i class="fa-solid fa-trash fs-5"></i></a>
                        <input type='hidden' name='client_id' value='<?php echo $row['id']?>'>
                        <button style="border: none;"  type='submit'  name='downloadButton'><i class="fa-solid fa-download"></i></button>
                       
                    </form>
               
              </td>
                                              </tr>
            
          <?php
          }}}
          ?>


         
        </tbody>
      </table>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
          <script src="../js/scripts.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
          <script src="../js/datatables-simple-demo.js"></script>
  </body>

  </html>