<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | SIM BK</title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/main.css">
    <script src="<?= BASE_URL; ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/popper.min.js"></script>
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
        <!-- #EBEDEF -->
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="min-height:calc(100vh - 56px); padding:20px 0px 60px 0px;background-color: #fafbfc !important;">  
          <?php include 'app/Views/'. $content; ?>       
          <!-- Footer -->
          <?php require_once 'app/Views/layout/footer.php' ?>   
        </main>
      </div>
    </div>
    <script src="<?= BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/main.js"></script>
 </body>
</html>