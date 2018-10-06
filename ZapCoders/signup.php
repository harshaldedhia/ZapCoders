<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="./css/main.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="signup-wrapper">
      <h2>Sign up</h2>
      <form method="post" class="signup-form" action="signup.php">
        <?php include('server.php') ?>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="individual or company name" required>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="johndoe@example.com" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="***" required>
        </div>
        <div class="form-group">
          <label for="password2">Confirm Password</label>
          <input type="password" name="password2" class="form-control" id="confirm-password" placeholder="***" required>
          <div class="help-block"></div>
        </div>
        <div class="form-group">
          <label class="radio-inline">
            <input type="radio" name="p-t" id="organizer" value="organizer" required> Register as an Organizer
          </label>
          <label class="radio-inline">
            <input type="radio" name="p-t" id="applicant" value="applicant" required> Register as an Applicant
          </label>
        </div>
        <button type="submit" id="submit" class="btn btn-primary" name="signup">Submit</button>
      </form>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>

      function matchPassword() {
        var pass = $('#password').val();
        var confirmPass = $('#confirm-password').val();
        var submit = $('#submit');
        // console.log(pass, confirmPass);
        if(pass!='' && confirmPass!='' && pass != confirmPass) {
          $('.help-block').html("<p>Passwords don't match.</p>");
          submit.prop('disabled',true);
        }
        else {
          $('.help-block').html("");
          submit.prop('disabled',false);
        }
      }

      $('#confirm-password, #password').on('input', matchPassword);
    </script>
  </body>
</html>
