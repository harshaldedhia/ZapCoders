<?php session_start(); ?>
<form id="projects-form" class="project-form" method="post" action="projects.php" style="width: 500px; margin: 20px auto;">
  <div id="form-inputs">
    <div class="form-group">
      <label for="duration">Name and Description</label>
      <input type="text" class="form-control" id="duration" name="desc[]" placeholder="" required>
    </div>
    <div class="form-group">
      <label for="domain">Domain of your project</label>
      <select class="form-control" id="domain" name="domain[]">
        <option value="machine-learning">Machine Learning</option>
        <option value="artificial-intelligence">Artificial Intelligence</option>
        <option value="deep-learning">Deep Learning</option>
        <option value="game-theory">Game Theory</option>
        <option value="front-end">Front End</option>
        <option value="back-end">Back End</option>
      </select>
    </div>
    <div class="form-group">
      <label for="tech">Technologies used</label>
      <input type="text" class="form-control" id="tech" placeholder="html, css, javascript" name="tech[]" required>
    </div>
    <div class="form-group">
      <label for="tech">Github Link</label>
      <input type="url" class="form-control" name="github_link[]">
    </div>

  </div>

  <a onclick="add()">Add New Project</a><br>
  <button type="submit" id="submit" name="projects" class="btn btn-primary">Submit</button>
</form>
