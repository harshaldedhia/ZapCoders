<?php session_start(); ?>
<?php

$name = "";
$topic    = "";
$department = "";
$description= "";
$start = "";
$end = "";
$errors = array();

if (isset($_POST['float'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $topic = mysqli_real_escape_string($conn, $_POST['topic']);
  $department = mysqli_real_escape_string($conn, $_POST['department']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $start = mysqli_real_escape_string($conn, $_POST['startdate']);
  $end = mysqli_real_escape_string($conn, $_POST['enddate']);
  
    $result = mysqli_query($conn,"SELECT * FROM inhouse");
    $num_rows = mysqli_num_rows($result);

    $iid = "I".($num_rows+101) ;

    $result = mysqli_query($conn,"SELECT * FROM faculty_signup WHERE f_id = '$fid' ");
    $row = $result->fetch_assoc();
    $mobile = $row["mobile"];


  	$query = "INSERT INTO inhouse (f_id,internship_id,name, dept, topic, description, start_date, end_date, mobile, email) 
  			       VALUES('$fid','$iid','$name', '$topic', '$department', '$description' , '$start' , '$end', '$mobile' , '$email' )";
  	mysqli_query($conn, $query);

    $r = mysqli_query($conn,"SELECT * FROM inhouse WHERE internship_id = '$iid' ");
    if (mysqli_num_rows($r) == 1) 
    {
        echo "<script> alert('New Internship floated successfully'); </script>" ;
    }
}
?>