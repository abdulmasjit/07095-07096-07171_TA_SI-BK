<?php $base_url = 'http://localhost/SIM-BK/'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM BK</title>
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/main.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>  
    <!-- Header -->
    <?php require_once 'app/Views/layout/header.php' ?>
    <!-- Sidebar -->
    <?php require_once 'app/Views/layout/sidebar.php' ?>
    <!-- Main -->
    <div class="container-fluid">
      <div class="row">
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="min-height:calc(100vh - 56px); padding:20px 0px 60px 0px;">  
          <?php include('app/Views/'.$content) ?>        
          <!-- Footer -->
          <?php require_once 'app/Views/layout/footer.php' ?>   
        </main>
      </div>
    </div>
    <script src="<?= $base_url ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $base_url ?>assets/js/popper.min.js"></script>
    <script src="<?= $base_url ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= $base_url ?>assets/js/main.js"></script>
 </body>
</html>