<?php
session_start();

include('../../config/functions.php');
if (!isLoggedIn()) {
  header('location: ../index.php');
}
if (!isAdmin()) {
  header('location: ../index.php');
}
if (isset($_GET["error"])) {
  echo "<script>alert('This category has a products');</script>";
  unset($_GET["error"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Tables</title>

  <!-- Fontfaces CSS-->
  <link href="../css/font-face.css" rel="stylesheet" media="all">
  <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <!-- Bootstr../ap CSS-->
  <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
  <!-- Vendor ../CSS-->
  <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="../css/theme.css" rel="stylesheet" media="all">
  <style>
    a {
      color: black;
    }
  </style>
</head>

<body class="animsition">
  <div class="page-wrapper">


    <!-- MENU SIDEBAR-->
    <?php include_once("../sidebar.php") ?>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <?php include_once("../adminNav.php") ?>


      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="table-data__tool-right">
              <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="create.php"><i class="zmdi zmdi-plus"> </i> add item </a>

              <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <div class="dropDownSelect2"></div>
              </div>
              <?php
              $connection = mysqli_connect("localhost", "root", "", "project7");
              $query = "SELECT * FROM categories";
              $query_run = mysqli_query($connection, $query);
              ?>
              <div class="row m-t-30">
                <div class="col-md-12">
                  <!-- DATA TABLE-->
                  <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                      <thead>
                        <tr>
                          <th> No. </th>
                          <th>category name</th>
                          <th>EDIT</th>
                          <th>DELETE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $counter = 1;
                        if (mysqli_num_rows($query_run) > 0)
                          while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                          <tr>
                            <td><?php echo $counter;
                                $counter++ ?> </td>
                            <td><?php echo $row['category_name']; ?> </td>
                            <td>
                              <form action="edit.php" method="POST">
                                <input type="hidden" name="edit" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-warning"> EDIT</button>
                              </form>
                            </td>
                            <td>
                              <form action="up.php?id=<?php echo $row['id']; ?>" method="POST">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger">
                                  Delete
                                </button>
                              </form>
                            </td>
                          </tr>
                        <?php
                          }
                        else {
                          echo "No Record Found";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- END DATA TABLE-->
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="copyright">
                    <p>Copyright © 2021 Furnitica. All rights reserved.</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

    <script type="text/javascript">
      (function() {
        window['__CF$cv$params'] = {
          r: '6d5433f31bc75b80',
          m: 'gv7H83Is4o6s8VNM6bqZnmA010KLqb4m8li2xnRd6n0-1643477578-0-Ac9gKmPCbCdl+MP0X9O2Z1ZwwEnYY0m9PzNaS4ndVS3GczSN3ouOYu92xM3rVC79uhk4dzLRcUSuwj3y0ulcXSYExXsfV3PKUOingfMAsyfqTEnJ1o6pvlezZBJYCC87Nx/j/2WkNz7u4GJom/gRcgWczHzriYPofBPQexf5xA16xa0dGEs2LOOIRVl37clACQ==',
          s: [0x196ccbd686, 0xb55c502a9c],
        }
      })();
    </script>
</body>

</html>
<!-- end document-->