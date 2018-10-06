<!DOCTYPE html>
<html lang="en">
<head>
<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kjsce_hackathon";
	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap core CSS-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom fonts for this template-->
  <link href="css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template-->
  <link href="css/dashboard.css" rel="stylesheet">
    
  <!-- Font awesome -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div id="content-wrapper">
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <!-- <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">New Internships</li>
          </ol> -->

          <div class="card card-register mx-auto mt-5 mb-5">
          <div class="card-header">Organise New Event</div>
            <div class="card-body">

              <form method="post" onsubmit="return validation()" action="#">
              <?php include('insert.php');?>

                <div class="form-group">
                  <div class="form-row">
                  <label for="staticid" class="col-sm-8 col-form-label"><b>Organiser Details</b></label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-row">     
                    <label for="staticid" class="col-sm-4 col-form-label">Organisation Name : </label>
                      <div class="col-sm-3">
                        <input type="text" readonly class="form-control-plaintext" id="staticid" value="Session variable">
                      </div>                   
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-row">
                  <label for="staticid" class="col-sm-8 col-form-label"><b>Requirement Details</b></label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="description" name = "description" class="form-control" placeholder="Description" required="required">
                    <label for="description">Description</label>
                  </div>
                </div>
                <div class="form-group">
                   <div class="form-row"> 
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="date" id="startdate" name = "startdate" class="form-control" placeholder="Start date(yyyy-mm-dd)" required="required">
                        <label for="startdate">Start Date</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="date" id="enddate" name="enddate" class="form-control" placeholder="End date(yyyy-mm-dd)" required="required">
                        <label for="enddate">End Date</label>
                      </div>
                    </div>
                    </div>
                </div>

                <span id="warning" class="text-danger font-weight-bold"> </span>

                <button class="btn btn-primary btn-block" type="submit" name="float">Organise Event</button>
              </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>