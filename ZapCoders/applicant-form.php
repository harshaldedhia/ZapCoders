<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Applicant Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/applicant-form.css">
    <link rel="stylesheet" href="./css/main.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="main">
      <div class="header">
        <div class="brand">
          <h1>ZapCoder</h1>
        </div>
        <div class="user-info">
          <div class="row">
            <div class="col-xs-6">
                <h3><?php echo $_SESSION['name'] ?></h3>
            </div>
            <div class="col-xs-6 text-right">
                <a href="./applicant-dashboard.php">Back to Dashboard</a>
            </div>
          </div>
        </div>
        <div class="custom-nav">
          <div class="topnav">
            <a class="active" onclick="loadForm('education-form.php')">Education</a>
            <!-- <a onclick="loadForm('competitive-form.php')">Competitive Programming</a> -->
            <a onclick="loadForm('projects-form.php')">Projects</a>
            <a onclick="loadForm('skills-form.php')">Skills</a>
            <a onclick="loadForm('internships-form.php')">Internships</a>
            <a onclick="loadForm('courses-form.php')">Courses</a>
          </div>
        </div>
      </div>

      <div class="forms" id="forms">

      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>

    $(function(){
      var hash = window.location.hash;
      // console.log(hash);
      if(hash){
        hash = hash.substr(1) + ".php";
        loadForm(hash);
      }
      else {
        loadForm('education-form.php');
      }
    })

    function loadForm(formName) {
      $("#forms").load("./" + formName);
    }

    function add() {
      var content = $('#form-inputs');
      $(content[0]).clone().insertAfter("#form-inputs:last");
    }

    </script>
  </body>
</html>
