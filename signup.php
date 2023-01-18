<?php
$showError = false;
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'dbconnect.php';
  $fname = htmlentities($_POST["fname"]);
  $lname = htmlentities($_POST["lname"]);
  $email = htmlentities($_POST["email"]);
  $password = htmlentities($_POST["password"]);
  $mno = htmlentities($_POST["mno"]);


  //check whether the email exist
  $existSql = "SELECT * FROM  user where email='$email'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if ($numExistRows > 0) {
    $showError = "Email Already Exist.";
  } else {

    if (empty($_POST['gridCheck'])) {

      $showError = " Please Check the Box Below";
    } else {
      
  $password = htmlentities($_POST["password"]);
      $sql = "INSERT INTO `user` (`s_no`, `f_name`, `l_name`, `email`, `m_no`, `password`) VALUES (NULL, '$fname', '$lname', '$email', '$mno','$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showAlert = "true";
      }


    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Log-In</title>
</head>

<body>
  <div class="bgimg">
<?php include('nav.php') ;

    ?>
  <?php
  if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> Your account is now created and you can login. 
      </div>';
  }
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong> Warning!</strong>' . $showError . '
        </div>';
  }
  ?>
  <div class="container form_login_signup my-5">
    <form method="POST" action="signup.php">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">First Name</label>
          <input type="text" class="form-control" id="fname" id="fname" name="fname" placeholder="First Name">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Last Name</label>
          <input type="password" class="form-control" id="lname" name="lname" placeholder="Last Name">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">E-mail Id</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="@gmail.com">
      </div>
      <div class="form-group">
        <label for="inputAddress">Password</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="password">
      </div>
      <div class="form-group">
        <label for="inputAddress2">Mobile Number</label>
        <input type="text" class="form-control" id="mno" name="mno" placeholder="+91">
      </div>
      <!-- <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Chandigarh</option>
        <option>Haryana</option>
        <option>Delhi</option>
        <option>Uttar Pradesh</option>
        <option>Bihar</option>
        <option>Uttrakhand</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div> -->
      <div class="form-group">
        <div class="form-check">

          <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" value="1">

          <p>If, You are 18+ </p>
          <label class="form-check-label" for="gridCheck">
            Check me out
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
  
  </div>

  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>