<?php    
$server="localhost";
$username="root";
$password="";
$database="bikerental";

$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("error!". mysqli_connect_error());
}

$sql= "SELECT * FROM vehicle_table";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

    <title>Admin Panel</title>
</head>

<body>

    <div class="bgimg">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="welcome.php">bR</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../signup.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../login.php">Log In</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav> -->
        <!--Main Navigation

        <!-- Sidebar -->
        <div class="wrapper">
            <input type="checkbox" id="btn" hidden>
            <label for="btn" class="menu-btn">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </label>
            <nav id="sidebar">
                <div class="title">
                    Side Menu
                </div>
                <ul class="list-items">
                    <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="#"><i class="fa-sign-in-alt"></i>Sign In</a></li>
                    <li><a href="#"><i class="fas fa-address-book"></i>log In</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i>Settings</a></li>
                    <li><a href="#"><i class="fas fa-user"></i>About us</a></li>
                    <li><a href="#"><i class="fas fa-globe-asia"></i>Languages</a></li>
                    <li><a href="#"><i class="fas fa-envelope"></i>Contact us</a></li>
                    <div class="icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </ul>
            </nav>
            
        </div>
    </div>
            <div class="container">
                <table class="table table-striped table-light my-5">
                <thead>
                    <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Vechile Name</th>
                        <th scope="col">Vechile Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($result->num_rows>0)
                        {
                            while($row= $result->fetch_assoc()){ 
                    ?>
                    <tr>
                    
                        <td><?php echo $row['sno'];?></td>
                        <td><?php echo $row['vehicle_name'];?></td>
                        <td><?php echo $row['vehicle_no'];?></td>
                        <td><?php echo $row['action'];?></td>
                        <td><a class="btn btn-info" href="../admin/update_record.php?id=<?php echo $row['sno']; ?>">UPDATE</a>&nbsp;

                        <a class="btn btn-danger" href="../admin/delete.php?id=<?php echo $row['sno']; ?>">DELETE</a> 

                    </tr>

                    <?php
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
            </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>