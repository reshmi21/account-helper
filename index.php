<!DOCTYPE html>
   <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styleFront.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	</head>
<body>
  
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="front.php">Account Helper &nbsp <i class="fa fa-calculator"></i></a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
		<?php 
		session_start();
		$conn= new mysqli("localhost","root","","flat_account");
		if(isset($_SESSION['IS_LOGIN']))
		{?>
          <a class="nav-link" href="back.php">Sign out</a>
		  <?php 
		}
		else
		{
			?>
			 <a class="nav-link" href="userLogin.php">Sign In</a>
			 <?php 
		}
		?>
        </li>
		
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add_res.php">
                  <span data-feather="file"></span>
                  Add new resident
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="search.php">
                  <span data-feather="shopping-cart"></span>
                  Add money to account
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="expense.php">
                  <span data-feather="users"></span>
                  Add expenses
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="total.php">
                  <span data-feather="bar-chart-2"></span>
                  View monthly Cost
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="due_search.php">
                  <span data-feather="layers"></span>
                  View due accounts
                </a>
              </li>
            </ul>
          </div>
        </nav>
     
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="row row-header">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<div class="col-12 col-md-9">
            <p class="h3">we provide solutions for keeping accounts up-to-date for an apartment by calculating expenditure and overall maintainace charges for a time period</p><br>
       <a class="btn btn-light btn-lg" href="#contact">Contact<i class="fa fa-phone"></i></a>
		   </div>
		   </div>
			</div>
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
			<img class="img-fluid" src="https://miro.medium.com/max/3840/1*MGv5b9bNEIRcYPVxQ50m0Q.jpeg" alt="apartment-calculator">
			</div>
		  </main>
		   <footer role="footer" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="contact">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h5>Contact Us @ </h5>
			</div>
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <address>
		              121, Clear Water Bay Road
		              HONG KONG </br>
		              Tel.: +852 1234 5678
		              Fax: +852 8765 4321<br>
		              Email: <a href="mailto:confusion@food.net">confusion@food.net</a>
		           </address>
                </div>
    </footer>
		  </div>
		  </div>
</body>
</html>