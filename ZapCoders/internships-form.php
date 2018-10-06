<?php session_start(); ?>
<form id="internship-form" method="post" class="applicant-form" action="internships.php" style="width: 500px; margin: 20px auto;">
  <div id="form-inputs">
    <div class="form-group">
      <label for="domain">Company Name</label>
      <select class="form-control" id="company" name="company[]">
        <option value="google">Google</option>
        <option value="facebook">Facebook</option>
        <option value="oracle">Oracle</option>
        <option value="microsoft">Microsoft</option>
        <option value="amazon">Amazon</option>
        <option value="flipkart">Flipkart</option>
        <option value="apple">Apple</option>
        <option value="twitter">Twitter</option>
        <option value="tcs">TCS</option>
        <option value="infosys">infosys</option>
        <option value="ivp">Indus Valley Partner</option>
        <option value="morgan-stanley">Morgan Stanley</option>
        <option value="other">Other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="domain">Select your domain</label>
      <select class="form-control" id="domain" name="domain[]">
        <option name="ml" value="machine-learning">Machine Learning</option>
        <option name="ai" value="artificial-intelligence">Artificial Intelligence</option>
        <option name="dl" value="deep-learning">Deep Learning</option>
        <option name="game-theory" value="game-theory">Game Theory</option>
        <option name="front-end" value="front-end">Front End</option>
        <option name="back-end" value="back-end">Back End</option>
      </select>
    </div>
    <div class="form-group">
      <label for="tech">Technology used</label>
      <input type="text" class="form-control" id="tech" placeholder="html, css, javascript" name="technologies[]" required>
    </div>
    <div class="form-group">
      <label for="duration">Duration (in months)</label>
      <input type="text" class="form-control" id="duration" name="duration[]" placeholder="" required>
    </div>
  </div>

  <a onclick="add()">Add New Internship</a><br>
  <button type="submit" id="submit" class="btn btn-primary" name="internships">Submit</button>
</form>
