<?php
session_start();
$_SESSION['email']='abc@somaiya.edu';
include('con.php');

$tech_list = array("html", "css", "bootstrap", "javascript", "jquery", "ajax","php", "python", "rubyonrails", "nodejs","java", "kotlin", "reactnative","objectivec", "swift","unity", "unreal", "godotengine", "cryengine", "c", "cpp", "c++", "c#","c#", "java", "python","oraclesql", "mysql", "mongodb", "microsoftsqlserver","python", "r", "javascript", "mathematics", "statistics", "data analysis", "machine learning", "deep learning", "reinforcement learning", "computer vision", "natural language processing", "image processing", "tensorflow", "keras", "sci-kit learn", "pytorch", "matlab, opencv","linux", "java", "scala", "hadoop", "spark", "python","aws", "ansible", "linux", "shell scripting", "nmap", "metasploit", "john the ripper", "thc hydra","python", "arm microcontroller", "robotics", "raspberry pi", "embedded systems", "arduino","c", "pcb design");

$result=array();

$q = "SELECT ssc_perc,hsc_diploma_perc,bachelor_cgpa,bachelor_college,masters_cgpa,masters_college,codechef_rating,codeforces_rating FROM applicant_details WHERE email=".$_SESSION['email']."";
mysqli_query($conn,$q);
$result->academic = $academics;
$result = array_push($academics);

for($i=0;$i<count($tech_list);$i++){
	$tech_list[$i] = $tech_list[$i].replace(' ','');

	$q1 = "SELECT domain,source FROM applicant_certificates WHERE email=".$_SESSION['email']." tech = ".$tech_list[$i]."";
	$temp = mysqli_query($conn,$q1);
	$cert = mysqli_fetch_array($temp);

	$q2 = "SELECT domain,rating FROM applicant_skills WHERE email=".$_SESSION['email']." AND tech = ".$tech_list[$i]."";
	$temp = mysqli_query($conn,$q2);
	$skill = mysqli_fetch_array($temp);

	$q3 = "SELECT domain,project_stars FROM applicant_projects,project_tech WHERE applicant_projects.email=".$_SESSION['email']." AND applicant_projects.email=project_tech.email AND applicant_projects.project_desc=project_tech.project_desc AND tech = ".$tech_list[$i]."";
	$temp = mysqli_query($conn,$q3);
	$project = mysqli_fetch_array($temp);

	$q4 = "SELECT domain,company_rating FROM applicant_internships, internship_tech WHERE applicant_internships.email=".$_SESSION['email']." AND applicant_internships.email=internship_tech.email AND applicant_internships.company=project_tech.company AND tech=".$tech_list[$i]."";
	$temp=$mysqli_query($conn,$q4);
	$internship = mysqli_fetch_array($temp);

	$tuple->certification = $cert;
	$tuple->skill = $skill;
	$tuple->project = $project;
	$tuple->internship=$internship;

	$result->strtolower($tech_list[$i]) = $tuple;
	echo $result;
}

?>

