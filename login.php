<?php
$login = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){

  include 'dbconnect.php';
  $email = $_POST["email"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM user WHERE email='$email' AND password ='$password'";
  $result = mysqli_query($conn, $sql);

  $num =  mysqli_num_rows($result);
// echo"<pre>";
//   print_r($num);
//   exit;
  if ($num == 1) {
    $login = "true";
    header("location:../../index.php");
  }
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <title>Log-In</title>
</head>

<body>
  <?php include('nav.php') ?>
  <div class="container form_login_signup my-5">
    <form method="POST" action="login.php">

      <div class="form-group">
        <label for="inputAddress">E-mail Id</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="@gmail.com">
      </div>
      <div class="form-group">
        <label for="inputAddress">Password</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="password">
      </div>
      <button type="submit" class="btn btn-primary">Log in</button>
    </form>

  </div>






  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>