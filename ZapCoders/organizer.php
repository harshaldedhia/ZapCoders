<?php
session_start();

$_SESSION['email']='abc@somaiya.edu';
include('conn.php');

$tech_list = array("html", "css", "bootstrap", "javascript", "jquery", "ajax","php", "python", "rubyonrails", "nodejs","java", "kotlin", "reactnative","objectivec", "swift","unity", "unreal", "godotengine", "cryengine", "c", "cpp", "c++", "c#","c#", "java", "python","oraclesql", "mysql", "mongodb", "microsoftsqlserver","python", "r", "javascript", "mathematics", "statistics", "data analysis", "machine learning", "deep learning", "reinforcement learning", "computer vision", "natural language processing", "image processing", "tensorflow", "keras", "sci-kit learn", "pytorch", "matlab, opencv","linux", "java", "scala", "hadoop", "spark", "python","aws", "ansible", "linux", "shell scripting", "nmap", "metasploit", "john the ripper", "thc hydra","python", "arm microcontroller", "robotics", "raspberry pi", "embedded systems", "arduino","c", "pcb design");

//if(isset($_POST['generate'])){

$query = "SELECT email FROM user_info WHERE user_type='applicant'";
$temp = mysqli_query($conn,$query);
$email_list = array();
while($row =  mysqli_fetch_array($temp)){
  array_push($email_list,$row['email']);
}

$final_file=array();
$j=0;
foreach($email_list as $e){

$result=array();

$q = "SELECT ssc_perc,hsc_diploma_perc,bachelor_cgpa,bachelor_college,masters_cgpa,masters_college,codechef_rating,codeforces_rating FROM applicant_details WHERE email='$e' ";
$temp = mysqli_query($conn,$q);
$academics = mysqli_fetch_array($temp);
$result['academics'] = $academics;

for($i=0;$i<count($tech_list);$i++){
  $tech_list[$i] = str_replace(' ','',$tech_list[$i]);

  $q1 = "SELECT source FROM applicant_certification WHERE email='$e' AND tech = '$tech_list[$i]'";
  $temp = mysqli_query($conn,$q1);
  $cert = array();
  while($row = mysqli_fetch_array($temp)){
    array_push($cert,$row);
  }
  
  $q2 = "SELECT rating FROM applicant_skills WHERE email='$e' AND tech = '$tech_list[$i]'";
  $temp = mysqli_query($conn,$q2);
  $skill = array();
  while($row = mysqli_fetch_array($temp)){
    array_push($skill,$row);
  }
  
  $q3 = "SELECT project_stars FROM applicant_projects,project_tech WHERE applicant_projects.email='$e' AND applicant_projects.email=project_tech.email AND applicant_projects.project_desc=project_tech.project_desc AND tech = '$tech_list[$i]'";
  $temp = mysqli_query($conn,$q3);
  $project = array();
  while($row = mysqli_fetch_array($temp)){
    array_push($project,$row);
  }
  
  $q4 = "SELECT company_rating FROM applicant_internships, internship_tech WHERE applicant_internships.email='$e' AND applicant_internships.email=internship_tech.email AND applicant_internships.company=internship_tech.company AND tech='$tech_list[$i]' ";
  $temp=mysqli_query($conn,$q4);
  $internship = array();
  while($row= mysqli_fetch_array($temp)){
    array_push($internship,$row);
  }

  $tuple['certification'] = $cert;
  $tuple['skill'] = $skill;
  $tuple['project'] = $project;
  $tuple['internship']=$internship;
  $result[$tech_list[$i]] = $tuple;
  }
  $final_file[$j]['email']=$e;
  $final_file[$j]['parameters']=$result;
  $j++;
}

  $fp = fopen("parameters.json","w");
  fwrite($fp,json_encode($final_file));
  fclose($fp);
//}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Applicant Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/organizer.css">
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
                <h3><?php 
                $x = $_SESSION['name'];
                echo $x; ?></h3>
            </div>
            <div class="col-xs-6 text-right">
                <a href="#">Logout</a>
            </div>
          </div>
        </div>
        <!-- <div class="custom-nav">
          <div class="topnav">
            <a class="active" onclick="loadForm('education-form.php')">Education</a>
            <a onclick="loadForm('competitive-form.php')">Competitive Programming</a>
            <a onclick="loadForm('projects-form.php')">Projects</a>
            <a onclick="loadForm('skills-form.php')">Skills</a>
            <a onclick="loadForm('internships-form.php')">Internships</a>
            <a onclick="loadForm('courses-form.php')">Courses</a>
          </div>
        </div> -->
      </div>

      <div class="col-xs-6">
        <div class="forms" id="forms">
        <form class="organizer-form" action="" method="post">
          <h2>Enter your requirements here</h2>
          <div class="form-group">
            <label for="domain">Required Domain</label>
            <select class="form-control domain" id="domain">
            <option value="Front-End Development">Front End</option>
            <option value="Back-End Development">Back End</option>
            <option value="IOS App Development">IOS</option>
            <option value="Android App Development">Android app development</option>
            <option value="Windows App Development">Windows app development</option>
            <option value="Hybrid App Development">Hybrid Development</option>
            <option value="Game Development">Game Development</option>
            <option value="Desktop Application Development">Desktop apps Development</option>
            <option value="Database Development">Database Development</option>
            <option value="AI/ML/DL">AI/ML/DL</option>
            <option value="Big Data">Big Data</option>
            <option value="Cloud Computing">Cloud Computing</option>
            <option value="Computer Security">Computer Security</option>
            <option value="IOT">IOT</option>
            </select>

          </div>
          <a onclick="addDomain()">Add another domain</a>

          <div class="form-group">
            <label for="tech">Required Technology</label>
            <select class="form-control tech" id="tech">
        <option value="html">HTML</option>
        <option value="css">CSS</option>
        <option value="javascript">Javascript</option>
        <option value="c++">C++</option>
        <option value="c#">C#</option>
        <option value="c">C</option>
        <option value="python">Python</option>
        <option value="java">Java</option>
        <option value="kotlin">kotlin</option>
        <option value="nodejs">nodejs</option>
        <option value="bootstrap">bootstrap</option>
        <option value="ajax">ajax</option>
        <option value="php">php</option>
        <option value="oraclesql">oraclesql</option>
        <option value="mysql">mysql</option>
        <option value="mongodb">mongodb</option>
        <option value="unity">unity</option>
        <option value="unreal">unreal</option>
        <option value="cryengine">cryengine</option>
        <option value="objectivec">objective-c</option>
        <option value="swift">swift</option>
        <option value="linux">linux</option>
        <option value="scala">scala</option>
        <option value="hadoop">hadoop</option>
        <option value="spark">spark</option>
        <option value="enmap">enmap</option>
        <option value="metasploit">metasploit</option>
        <option value="raspberrypi">raspberrypi</option>
        <option value="arduino">arduino</option>
        <option value="robotics">robotics</option>
        <option value="tensorflow">tensorflow</option>
        <option value="keras">keras</option>
        <option value="pytorch">pytorch</option>
        <option value="naturallanguageprocessing">naturallanguageprocessing</option>
        <option value="computervision">computervision</option>
        <option value="statistics">statistics</option>
        <option value="deeplearning">deeplearning</option>
      </select>
          </div>
          <a onclick="addTech()">Add another Technology</a>

          <div class="form-group">
            <label for="requirement">Number of candidates required</label>
            <input type="text" class="form-control" id="requirement" placeholder="" required>
          </div>
          <button type="submit" id="submit" class="btn btn-primary" onclick="abc();return false;">Submit</button>
        </form>
      </div>
      </div>
      <div class="col-xs-6">
        <table id="result-table" class="table table-striped">
          <thead>
            <tr>
              <th>Rank</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
      
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>

    // $(function(){
    //   var hash = window.location.hash;
    //   // console.log(hash);
    //   if(hash){
    //     hash = hash.substr(1) + ".php";
    //     loadForm(hash);
    //   }
    //   else {
    //     loadForm('education-form.php');
    //   }
    // })

    // function loadForm(formName) {
    //   $("#forms").load("./" + formName);
    // }




      var orgdomain=[];
      var orgtech=[];
      var organizer_data;
      var req;
      var temp;
     function abc(e) {
        var x = $('.domain');

        for(i=0;i<x.length;i++) {
          orgdomain[i]=x[i].value;
          console.log(orgdomain[i]);
        }
        var y = $('.tech');

        for(i=0;i<y.length;i++) {
          orgtech[i]=y[i].value;
          console.log(orgtech[i]);
        }
        organizer_data={"Domain":new Set(orgdomain),"Technology":new Set(orgtech)};
        start_algo();

        req = $("#requirement").val();

        
      
    }

    function addDomain() {
      var content = $('#domain');
      $(content[0]).clone().appendTo(content.parent());
    }
    function addTech() {
      var content = $('#tech');
      $(content[0]).clone().appendTo(content.parent());
    }

    


    
data={"Domain":{"weight":0, "Front-End Development":{"weight":0, "html":{"weight":0}, "css":{"weight":0}, "bootstrap":{"weight":0}, "javascript":{"weight":0}, "jquery":{"weight":0}, "ajax":{"weight":0}},"Back-End Development":{"weight":0, "php":{"weight":0}, "python":{"weight":0}, "rubyonrails":{"weight":0}, "nodejs":{"weight":0}},"IOS App Development":{"weight":0, "objectivec":{"weight":0}, "swift":{"weight":0}},"Android App Development":{"weight":0, "java":{"weight":0}, "kotlin":{"weight":0}},"Windows App Development":{"weight":0, "net":{"weight":0}},"Hybrid App Development":{"weight":0, "xamarin":{"weight":0}, "reactnative":{"weight":0}, "ionic":{"weight":0}},"Game Development":{"weight":0, "unity":{"weight":0}, "unreal":{"weight":0}, "godotengine":{"weight":0}, "cryengine":{"weight":0}, "c":{"weight":0},"cpp":{"weight":0},"c#":{"weight":0}},"Desktop Application Development":{"weight":0, "c#":{"weight":0}, "java":{"weight":0}, "python":{"weight":0}},"Database Developer":{"weight":0, "oraclesql":{"weight":0}, "mysql":{"weight":0}, "mongodb":{"weight":0}, "microsoftsqlserver":{"weight":0}},"AI/ML/DL":{"weight":0, "python":{"weight":0}, "r":{"weight":0}, "javascript":{"weight":0}, "mathematics":{"weight":0}, "statistics":{"weight":0}, "dataanalysis":{"weight":0}, "machinelearning":{"weight":0}, "deeplearning":{"weight":0}, "reinforcementlearning":{"weight":0}, "computervision":{"weight":0}, "naturallanguageprocessing":{"weight":0}, "imageprocessing":{"weight":0}, "tensorflow":{"weight":0}, "keras":{"weight":0}, "scikitlearn":{"weight":0}, "pytorch":{"weight":0}, "matlab":{"weight":0}, "opencv":{"weight":0}},"Big Data":{"weight":0, "linux":{"weight":0}, "java":{"weight":0}, "scala":{"weight":0}, "hadoop":{"weight":0}, "spark":{"weight":0}, "python":{"weight":0}, "database":{"weight":0}},"Cloud Computing":{"weight":0, "aws":{"weight":0}, "googleappengine":{"weight":0}, "azure":{"weight":0}, "bigdata":{"weight":0}},"Computer Security":{"weight":0, "aws":{"weight":0}, "ansible":{"weight":0}, "linux":{"weight":0}, "shellscripting":{"weight":0}, "nmap":{"weight":0}, "metasploit":{"weight":0}, "johntheripper":{"weight":0}, "thchydra":{"weight":0}},"IOT":{"weight":0, "python":{"weight":0}, "armmicrocontroller":{"weight":0}, "robotics":{"weight":0}, "raspberrypi":{"weight":0}, "embeddedsystems":{"weight":0}, "arduino":{"weight":0}, "cprogramming":{"weight":0}, "pcbdesign":{"weight":0}}},"Other Skills":{"weight":0, "School":{"weight":0.2,"X":{"weight":0.4},"XII":{"weight":0.6}},"College":{"weight":0.4,"Bachelors":{"weight":0.6},"Masters":{"weight_not_equal":0.2,"weight_equal":0.4}},"Competitive coding":{"weight":0.4}}};

//applicant_data={"HTML":{"Skills":0.6,"Certificates":0.4,"Internships":0.5,"Projects":0.8},"CSS":{"Skills":0.6,"Certificates":0.4,"Internships":0.5,"Projects":0.8},"JavaScript":{"Skills":0.6,"Certificates":0.4,"Internships":0.5,"Projects":0.8},"Tensorflow":{"Skills":0.6,"Certificates":0.4,"Internships":0.5,"Projects":0.8}}

function get_organizer_data() {
  organizer_data={"Domain":new Set(["Front-End Development","IOT"]),"Technology":new Set(["HTML","CSS","JavaScript","JQuery","Tensorflow","PCB Design"])};
  return organizer_data;
}

function get_applicant_data1(d) {
  applicant_data={"email":d["email"],"Other Skills":{"School":{"X":d["parameters"]["academics"]["ssc_perc"],"XII":d["parameters"]["academics"]["hsc_diploma_perc"]},"College":{"Bachelors":d["parameters"]["academics"]["bachelor_cgpa"],"Masters":d["parameters"]["academics"]["masters_cgpa"]}, "College names":{"Bachelors":d["parameters"]["academics"]["bachelor_college"],"Masters":d["parameters"]["academics"]["masters_college"]},"Competitive coding":[d["parameters"]["academics"]["codechef_rating"],d["parameters"]["academics"]["codeforces_rating"]]},"Technologies":{}};
  for(i in d["parameters"]) {
  if(i!="academics") {
    applicant_data["Technologies"][i]={"Skills":null,"Certificates":d["parameters"][i]["certification"],"Internships":d["parameters"][i]["internship"],"Projects":d["parameters"][i]["project"]};
    if(i=="pcbdesign") {
      console.log(d["parameters"][i]);
    }
    if(d["parameters"][i]["skill"]==null) {
      applicant_data["Technologies"][i]["Skills"]=0;
    }
    else if("0" in d["parameters"][i]["certification"]){
      applicant_data["Technologies"][i]["Skills"]=d["parameters"][i]["skill"]["rating"];
    }
    else if (d["parameters"][i]["skill"].length==0){
      applicant_data["Technologies"][i]["Skills"]=0;
    }
    else {
      applicant_data["Technologies"][i]["Skills"]=d["parameters"][i]["skill"][0]["rating"];
    }
    
    if(d["parameters"][i]["certification"]==null) {
      applicant_data["Technologies"][i]["Certificates"]=[];
    }
    else if("0" in d["parameters"][i]["certification"]) {
      applicant_data["Technologies"][i]["Certificates"]=[d["parameters"][i]["certification"]];
    }
    else {
    applicant_data["Technologies"][i]["Certificates"]=d["parameters"][i]["certification"];
    }
    
    if(d["parameters"][i]["internship"]==null) {
      applicant_data["Technologies"][i]["Internships"]=[];
    }
    else if("company_rating" in d["parameters"][i]["internship"]) {
      applicant_data["Technologies"][i]["Internships"]=[d["parameters"][i]["internship"]];
    }
    else {
    applicant_data["Technologies"][i]["Internships"]=d["parameters"][i]["internship"];
    }
    
    if(d["parameters"][i]["project"]==null) {
      applicant_data["Technologies"][i]["Projects"]=[];
    }
    else if("project_stars" in d["parameters"][i]["project"]) {
      applicant_data["Technologies"][i]["Projects"]=[d["parameters"][i]["project"]];
    }
    else {
    applicant_data["Technologies"][i]["Projects"]=d["parameters"][i]["project"];
    }
  
  }
  }
  return applicant_data;
}

function get_applicant_data() {
  applicant_data={"Other Skills":{"School":{"X":98,"XII":80},"College":{"Bachelors":9,"Masters":8}, "Competitive coding":[2000,2000]},"Technologies":{"HTML":{"Skills":0.6,"Certificates":[],"Internships":[],"Projects":[]},"CSS":{"Skills":0.8,"Certificates":[],"Internships":[],"Projects":[]},"JavaScript":{"Skills":1,"Certificates":[],"Internships":[],"Projects":[]},"Tensorflow":{"Skills":0,"Certificates":[],"Internships":[],"Projects":[]},"PCB Design":{"Skills":0,"Certificates":[],"Internships":[],"Projects":[]}}};

  return applicant_data;
}



function tanh(t,x) {
  //var t=3;               //Constant
  return Math.tanh(t*x);
}


function compute_score_technology_wise(technology) {
  var score=0;
  return score;
}


function set_weights_level0(data) {
  var p=set_weights_level1(data["Domain"]);
  //console.log(p,"xyz");
  data["Domain"]["weight"]=0.8;
  data["Other Skills"]["weight"]=0.2;
}

function set_weights_level1(domain) {
  var p=0;
  var n=Object.keys(domain).length-1;
  var k=5;    //Constant
  var per=[];
  var i=0;
  var inp;
  for (domain_name in domain) {
    //console.log(domain_name,organizer_data["Domain"].has(domain_name));
    if(domain_name!="weight" && organizer_data["Domain"].has(domain_name)) {
      p++;
    }
    per[i]=set_weights_level2(domain[domain_name]);
    //console.log(per[i]);
    i++;
    }

  //console.log(p);
  var q=n-p;
  var x=k/(k*p+q);
  var y=1/(k*p+q);
  var total=x*p;
  var summ=0;
  
  i=0;
  for (domain_name in domain) {
    if(domain_name!="weight" && organizer_data["Domain"].has(domain_name)) {
      summ+=per[i];
    }
    i++;
  }

  //console.log(per);

  i=0;
  for (domain_name in domain) {
    //console.log(domain_name,domain_name!="weight",organizer_data["Domain"].has(domain_name));
    if(domain_name!="weight" && organizer_data["Domain"].has(domain_name)) {
      //console.log(per[i],total,"abcd");
      domain[domain_name]["weight"]=(per[i]/summ)*total;
    }
    else if(domain_name!="weight") {
      domain[domain_name]["weight"]=y;
    }
    i++;
  }

  //console.log(p,q,summ,n,x,y,total);
  var t=10;            //Constant
  return tanh(t,p/n);

}

function set_weights_level2(technologies) {
  var p=0;
  var k=5;   //Constant
  var n=Object.keys(technologies).length-1;
  for (technology_name in technologies) {
    //console.log(technology_name);
    if (technology_name!="weight" && set_weights_level3(technology_name)) {
      //console.log(technology_name);
      p++;
    }
  }
  var q=n-p;
  var x=k/(k*p+q);
  var y=1/(k*p+q);
  //console.log(technologies,organizer_data);
  for(technology_name in technologies) {
    //console.log(technology_name,organizer_data["Technology"].has(technology_name));
    if (technology_name!="weight" && set_weights_level3(technology_name)) {
      technologies[technology_name]["weight"]=x;
    }
    else if(technology_name!="weight") {
      technologies[technology_name]["weight"]=y;
    }
  }

  //console.log(technologies,n,p,q,x,y);
  var t=2;                                //Constant
  return tanh(t,(p+1)/(n+1));
}

function set_weights_level3(technology_name) {
  //console.log(technology_name,organizer_data["Technology"].has(technology_name));
  if(organizer_data["Technology"].has(technology_name)) {
    return true;
  }
  return false;
}

function set_weights_level2_1() {
  
}

//console.log(data);













function compute_score_technology_wise(technology) {
  var score=0;
  if(!isNaN(score)) {
  return score;
  }
  else {
    return 0;
  }
}


function find_score_level0(data) {
  var score=0;
  score+=data["Domain"]["weight"]*find_score_level1(data["Domain"]);
  //console.log(score,"aaaaaaaaaa");
  score+=data["Other Skills"]["weight"]*find_score_level2_1();
  //console.log(score,"aaaaaaaaaa");
  //score+=w2*level2(data["Other Skills"]);
  if(!isNaN(score)) {
  return score;
  }
  else {
    return 0;
  }
}

function find_score_level1(domain) {
  var score=0;
  //console.log(domain);
  for (domain_name in domain) {
    if (domain_name!="weight") {
      //console.log(domain_name);
      score+=domain[domain_name]["weight"]*find_score_level2(domain[domain_name]);
      //console.log(score,find_score_level2(domain[domain_name]),domain[domain_name]);
    }
  }
  if(!isNaN(score)) {
  return score;
  }
  else {
    return 0;
  }
}

function find_score_level2(technologies) {
  var score=0;
  //console.log(technologies);
  for (technology_name in technologies) {
    if (technology_name!="weight") {
      //console.log(technology_name);
      score+=technologies[technology_name]["weight"]*find_score_level3(technology_name);
      //console.log(score);
    }
  }
  //console.log(technologies,score,"abcd");
  if(!isNaN(score)) {
  return score;
  }
  else {
    return 0;
  }
}

function find_score_level3(technology_name) {
  var score=0;

  var weight_skill=0.2;
  var weight_certifications=0.15;
  var weight_internships=0.4;
  var weight_projects=0.25;

  if(technology_name in applicant_data["Technologies"]) {
  if(applicant_data["Technologies"][technology_name]["Skills"]!=null) {
    score+=weight_skill*parseInt(applicant_data["Technologies"][technology_name]["Skills"]);
  }
    var summ=0;
    
    var t1=5;        //constant
    var t2=5;        //constant
    var t3=5;        //constant

    var c1=1/10;        //constant
    var c2=1/10;        //constant
    var c31=1/2;        //constant
    var c32=1/5;        //constant
    
  
    var certificates=applicant_data["Technologies"][technology_name]["Certificates"];

    for(i in certificates) {
      summ+=Math.pow(t1,parseInt(certificates[i]["source"]))-1;
    }
    score+=weight_certifications*tanh(c1,summ);

    summ=0;
    var internships=applicant_data["Technologies"][technology_name]["Internships"];

    for(i in internships) {
      summ+=Math.pow(t2,parseInt(internships[i]["company_rating"]))-1;
    }
    score+=weight_internships*tanh(c2,summ);

    summ=0;

    var projects=applicant_data["Technologies"][technology_name]["Projects"]; 

    for(i in projects) {
    if(projects[i]["project_stars"]!=null) {
    summ+=Math.pow(t3,0.6+tanh(c31,parseInt(projects[i]["project_stars"]))*0.4)-1;
    }
    else {
    summ+=Math.pow(t3,0.6+tanh(c31,0)*0.4)-1;
    }
      //console.log(projects[i]);
    }
    
    score+=weight_projects*tanh(c32,summ);
  }

  console.log(technology_name,score);
  if(!isNaN(score)) {
  return score;
  }
  else {
    return 0;
  }
}

function find_score_level2_1() {
  var score=0;

  summ=0;
  if(applicant_data["Other Skills"]["School"]["X"]!=null) {
  summ+=0.4*(parseInt(applicant_data["Other Skills"]["School"]["X"])/100);
  }
  if(applicant_data["Other Skills"]["School"]["XII"]!=null) {
  summ+=0.6*(parseInt(applicant_data["Other Skills"]["School"]["XII"])/100);
  }
  score+=0.2*summ;
  //console.log(score,"aaaaaaaaaa");
  summ=0;
  if(applicant_data["Other Skills"]["College"]["Bachelors"]!=null) {
  summ+=(parseInt(applicant_data["Other Skills"]["College"]["Bachelors"])/10)*0.7;
  }
  if(applicant_data["Other Skills"]["College"]["Masters"]!=null) {
  summ+=(parseInt(applicant_data["Other Skills"]["College"]["Masters"])/10)*0.3;
  }
  score+=0.4*summ;
  //console.log(parseInt(applicant_data["Other Skills"]["College"]["Bachelors"]),parseInt(applicant_data["Other Skills"]["College"]["Masters"]),score,"bbbbbbbbbbb");
  
  var r;
  var l1;
  var l2;

  if(applicant_data["Other Skills"]["Competitive coding"][0]!=null) {
  r=parseInt(applicant_data["Other Skills"]["Competitive coding"][0]);
  }
  else {
    r=0;
  }
  if(r<1500) {
    l1=0.2;
  }
  else if(r<2000) {
    l1=0.3;
  }
  else if(r<2500) {
    l1=0.6;
  }
  else if(r<3000) {
    l1=0.75;
  }
  else {
    l1=1.0;
  }

  if(applicant_data["Other Skills"]["Competitive coding"][1]!=null) {
  r=parseInt(applicant_data["Other Skills"]["Competitive coding"][1]);
  }
  else {
    r=0;
  }
  if(r<1400) {
    l2=0.2;
  }
  else if(r<1800) {
    l2=0.3;
  }
  else if(r<2200) {
    l2=0.6;
  }
  else if(r<2600) {
    l2=0.75;
  }
  else {
    l2=1.0;
    }

  score+=0.4*Math.max(l1,l2);
  console.log(score,r,"aaaaaaaaaa");
  
  
  if(!isNaN(score)) {
  return score;
  }
  else {
    return 0;
  }
}


//for(i in data["Domain"]) {
//  console.log(data["Domain"][i]);
//}
//var organizer_data=get_organizer_data();
function start_algo() {
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        //document.getElementById("demo").innerHTML = myObj;
     var results=[];
    var jj=0;
    //console.log(myObj.length);
    for(iii=0;iii<myObj.length;iii++) {
    var applicant_data=get_applicant_data1(myObj[jj]);
    //console.log(applicant_data);
    console.log(set_weights_level0(data));
    var arr=[find_score_level0(data),applicant_data["email"]];
    results[jj]=arr;
    console.log(results,"aaaaaaaaaaaaaaaa");
    //console.log(jj,arr);
    jj++;
    }
    results=results.sort().reverse();
    for(zzz=0;zzz<req;zzz++){
      //console.log(results[zzz][1]);
      $("#result-table tbody").append('<tr><td>'+(zzz+1)+'</td><td>'+results[zzz][1]+'</td></tr>');
    }
    console.log(results,"aaa");
    }
}


xmlhttp.open("GET", "parameters.json", true);
xmlhttp.send();
}


// console.log(temp);

</script>


  </body>
</html>
