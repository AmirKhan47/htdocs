<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Main Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
  </head>

  <body style="background: url('<?php echo SURL.'assets/logo/medical-background-with-loop_n26ve-_yg__F0005.png';?>')no-repeat center;">

    <nav class="navbar mb-1 navbar-dark fixed-top bg-info flex-md-nowrap p-0 shadow">
      <a class="navbar-brand m-2 p-1 text-light bg-light" href="#"><img src="<?php echo SURL.'assets/logo/logo1.jpg';?>" height="30px"/></a>
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Automated Patient Support System</a>
     <ul class="navbar-nav px-3">
    </ul>
    </nav>
     <div class="container-fluid">
      <div class="row">
     <nav class="col-md-2 d-none d-md-block bg-gradient-light text-dark sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column mt-2">
              <li class="nav-item">
                <a class="nav-link active text-secondary" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo SURL.'Login/validate_user';?>">
                  <span data-feather="file"></span>
                 <b style="color: white; font-size: 14px;"> Medical Assistant</b>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo SURL.'Login/validate_user';?>">
                  <span data-feather="shopping-cart"></span>
                  <b style="color: white; font-size: 14px;"> Doctor</b>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo SURL.'Login/validate_user';?>">
                  <span data-feather="bar-chart-2"></span>
                 <b style="color: white; font-size: 14px;"> Admin</b>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li> -->
            </ul>

              <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Saved reports</span>
                <a class="d-flex align-items-center text-muted" href="#">
                  <span data-feather="plus-circle"></span>
                </a>
              </h6>
              <ul class="nav flex-column mb-2">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                  </a>
                </li>
              </ul> -->
          </div>
        </nav>
     <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="display-4 text-light mt-5">Dashboard</h1>
          </div>
            <div class="container">
              <div class="row mt-3">
                <div class="col-md-4 offset-md-2">
                  <div class="card bg-light text-center border-info">
                    <div class="card-body">
                      <h5 class="card-title">Medical Assistant</h5>
                      <p class="card-text">Let me help you with your registration</p>
                      <a href="<?php echo SURL. 'Login/validate_user'; ?>" class="btn btn-info">Login</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card bg-light text-center border-info">
                    <div class="card-body">
                      <h5 class="card-title">Doctor</h5>
                      <p class="card-text">The link below leads to doctor's dashboard</p>
                      <a href="<?php echo SURL. 'Login/validate_user'; ?>" class="btn btn-info">Login</a>
                    </div>
                  </div>
                </div>
               </div>
               <div class="row mt-5">
              <div class="col-md-4" style="margin-left: 33%;">
                  <div class="card bg-light text-center border-info">
                    <div class="card-body">
                      <h5 class="card-title">Admin</h5>
                      <p class="card-text">Admin can login here</p>
                      <a href="<?php echo SURL. 'Login/validate_user'; ?>" class="btn btn-info">Login</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>

