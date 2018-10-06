<?php
session_start();
// variable declaration
$name = "";
$email    = "";
$errors = array();
$_SESSION['success'] = ""; 

// connect to database
$db = mysqli_connect('localhost', 'root', '','kjsce_hackathon');


// REGISTER USER
if (isset($_POST['signup'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);
  $user_type = mysqli_real_escape_string($db, $_POST['p-t']);

  $query = "INSERT INTO user_info (name,email,password,user_type) 
  			       VALUES('$name','$email','$password','$user_type')";
  mysqli_query($db, $query);

  header('location: login.php');
  }


//LOGIN USER
  if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

    $query = "SELECT * FROM user_info WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) 
    {
        $row = $results->fetch_assoc();
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        if ($row["user_type"]=="organizer"){
          header('location: organizer.php');
        }
        else{
          header('location: applicant-form.php');
        }
    }else {
      echo ("Invalid username/password ");
    }
}
