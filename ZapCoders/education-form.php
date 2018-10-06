
<form class="applicant-form" action="education.php"  method="GET" style="width: 500px; margin: 20px auto;">
  <div class="form-group">
    <label for="ssc">10th Percentage</label>
    <input type="text" class="form-control" id="ssc" name="ssc" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="hsc">12th Percentage</label>
    <input type="text" class="form-control" id="hsc" name="hsc" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="bachelor-college-name">Bachelor College Name</label>
    <input type="text" class="form-control" id="bachelor-college-name" name="bcn" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="bachelor-college-cgpa">Bachelor College CGPA</label>
    <input type="text" class="form-control" id="bachelor-college-cgpa" name="bcc" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="bachelor-college-degree">Bachelor College Degree</label>
    <select class="form-control" name="bcd" id="bachelor-college-degree" required>
      <option name="computer" value="computer">Bachelor in Computer Science</option>
      <option name="it" value="IT">Bachelor in Information Technology</option>
      <option name="mechanical" value="mechanical">Bachelor in Mechanical Engineering</option>
      <option name="civil" value="civil">Bachelor in Civil Engineering</option>
    </select>
  </div>
  <div class="form-group">
    <label for="masters-college-name">Masters College Name</label>
    <input type="text" class="form-control" name="mcn" id="masters-college-name" placeholder="" >
  </div>
  <div class="form-group">
    <label for="masters-college-cgpa">Masters College CGPA</label>
    <input type="text" class="form-control" id="masters-college-cgpa" name="mcc" placeholder="" >
  </div>
  <div class="form-group">
    <label for="masters-college-degree">Masters College Degree</label>
    <select class="form-control" name="mcd" id="masters-college-degree">
      <option name="computer" value="computer">Masters in Computer Science</option>
      <option name="it" value="IT">Masters in Information Technology</option>
      <option name="mechanical" value="mechanical">Masters in Mechanical Engineering</option>
      <option name="civil" value="civil">Masters in Civil Engineering</option>
    </select>
  </div>
  <div class="form-group">
    <label for="codechef">Codechef profile</label>
    <input type="url" class="form-control" id="codechef" name="codechef" placeholder="" >
  </div>
  <div class="form-group">
    <label for="codeforces">Codeforces profile</label>
    <input type="url" class="form-control" id="codeforces" name="codeforces" placeholder="" >
  </div>

  <button type="submit" id="submit" name="ed" value="bb" class="btn btn-primary">Submit</button>
</form>
