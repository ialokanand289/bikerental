<?php
// $server="localhost";
// $username="root";
// $password="";
// $database="bikerental";

// $conn=mysqli_connect($server,$username,$password,$database);
// if(!$conn){
//     die("error!" . mysqli_connect_error());
// }
include '../dbconnect.php';

$sql="SELECT * FROM vehicle_table";
$result=mysqli_query($conn,$sql);

if(isset($_POST['action']) && $_POST['action'] == 'update_Record'){
    // echo "<pre>";
    // print_r($_POST);
    // exit;
    $sno=$_POST["sno"];
    $vehicle_name=$_POST["v_name"];
    $vehicle_no=$_POST["v_no"];
    $action=$_POST["jackson"];


    $sql="UPDATE `vehicle_table` SET  `vehicle_name` = '$vehicle_name',`vehicle_no` = '$vehicle_no',`action` = '$action' WHERE `sno`= '$sno'";
    $result=mysqli_query($conn,$sql);
    if ($result == true) {
        echo "Record Successfully Updated";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }


    // return "Sucess";
}


if(isset($_GET['id'])){
    $sno= $_GET['id'];
    $sql="SELECT * FROM `vehicle_table` where `sno` = '$sno'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
        $vehicle_name=$row["vehicle_name"];
        $vehicle_no=$row["vehicle_no"];
        $action=$row["action"];
    

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>UPDATE RECORDS</title>
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
        </nav> 
        <!--Main Navigation

        <!-  Sidebar -->
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
        <!-- <form method="POST" action=""> -->
        <div class="mb-3">
            <label for="text" class="form-label">Vehicle Name</label>
            <input type="text" class="form-control" id="vname" name="vehicle_name" value="<?php echo $vehicle_name?>">
            
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Vehicle Number</label>
            <input type="text" class="form-control" id="vno" name="vehicle_no" value="<?php echo $vehicle_no?>">
            
        </div>
       
        
        
        <div class="mb-3">
            <label for="text" class="form-label">Action</label>
            <select class="form-select" value="<?php echo $action?>" aria-label="Default select example" id="action" name="action" >
                <!-- <option selected>Open this select menu</option> -->
                <option value="AVAILABLE">AVAILABLE</option>
                <option value="NOT AVAILABLE">NOT AVAILABLE</option>
                
            </select>
        </div>
        
        <!-- <input type="hidden" class="form-control" id="sno" name="sno" value="<php echo $sno?>"> -->
        <button type="submit" id="update-btn" name="update" class="btn btn-primary">Submit</button>
    <!-- </form> -->

    <?php 
                }
            }
        }

    ?>
    </div>
    
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<script>
    $(document).ready(function(){
        $('#update-btn').click(function(){

            var vechile_name=$('#vname').val();
            var vechile_no=$('#vno').val();
            var jackson=$('#action').val();
            var sno=<?php echo $_GET['id']; ?>;
    
            $.ajax({
                type:"post",
                data: {
                    action: 'update_Record',
                    v_name: vechile_name,
                    v_no: vechile_no,
                    jackson: jackson,
                    sno: sno
                },

                success:function(data){

                    // console.log(response);
                    alert('your data is successfully updated');
                },
            })
        })

    })
</script>