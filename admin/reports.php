<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
   session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {

   include_once("connections/connection.php");
   $con = connection();

?>

   <head>
      <script>
      </script>
   </head>

   <body>
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
         <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- Main wrapper - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

         <?php include 'includes/topbar.php' ?>
         <?php include 'includes/sidebar.php' ?>

         <!-- ============================================================== -->
         <!-- Page wrapper  -->
         <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
               <div class="row align-items-center">
                  <div class="col-5">
                     <h4 class="page-title"><i class="mdi mdi-chart-bar"></i> Reports</h4>
                     <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"> Home</a></li>
                           </ol>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
               <!-- ============================================================== -->
               <!-- Start Page Content -->
               <!-- ============================================================== -->
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <form class="btn btn-sm elevation-2" action="generate_reports.php" method="post">
                           <div id="first_quarter">
                              <label for="">Please Select Date for Reports Generation</label><br>
                              <input type="date" dateformat="YYYY MMMM DD" name="from" required>
                              <label for="">to</label>
                              <input type="date" dateformat="YYYY MMMM DD" name="to" required><br>
                              <button type="submit" name="generate_reports" class="btn btn-success btn-block">Generate Report</button>
                           </div></br></br>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

            <?php include 'includes/footer.php' ?>
            <script src="../dist/js/chart.js"></script>
         </div>
      </div>

   </body>
<?php } else {
   echo header("Location: ../login.php");
}
?>

</html>