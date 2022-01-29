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

     <!-- Bootstrap CSS-->
     <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

     <!-- Vendor CSS-->
     <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
     <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
     <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
     <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
     <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
     <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
     <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

     <!-- Main CSS-->
     <link href="../css/theme.css" rel="stylesheet" media="all">


     <?php

      $connection = mysqli_connect("localhost", "root", "", "project7");
      if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $query = "SELECT * FROM categories WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);
        foreach ($query_run as $row) {
      ?>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
           <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
           </div>
           <div class="card-body">
             <form action="update.php" method='post'>
               <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
               <div class="form-group">
                 <label> category name </label>
                 <input type="text" name="category_name-edit" class="form-control" value=<?php echo $row['category_name'] ?> placeholder="product_name">
               </div>

               <button><a href="index.php" class="btn btn-danger"> CANCEL </a></button>
               <button name='update' class="btn btn-primary"> Update </button>
             </form>
         <?php

        }
      }
          ?>
           </div>
         </div>