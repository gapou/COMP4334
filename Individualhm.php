<?php
// Initialize the session
include('dbconnect.php'); 
///////////////////////////////////////////////////////////////////////////////////////////
$result="";
$filename = "";
if($_COOKIE["loggedin"] != "true"){
    // Redirect user to welcome page
    header("location:index.php");
}else{
    ;
}
////////////////////////////////////////////////////////////////////////////////////////
//show database data
$filename= "items/";
$username = $_COOKIE["user"];
$sql = "SELECT * FROM users WHERE username = '$username'";
$resultusers = mysqli_query($mysqli,$sql);
$rowusers = mysqli_fetch_array($resultusers);

$sql = "SELECT * FROM items";
$resultitem = $mysqli->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
    <title>User Site | <?php echo $rowusers["username"] ?></title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include('usernav.php'); ?>
 
    

    <div class="container">
    <h2> Welcome! <?php echo $rowusers["username"] ?> </h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/cat.jpg" alt="" style="width:100%;">
      </div>

      <div class="item">
        <img src="img/hamster.jpg" alt="" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="img/dogfood.jpg" alt="" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>





    <h1> Avilible Items:</h1>


    <?php
            if($resultitem -> num_rows >0){
            ?>
            <table>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Discription</th>
                    <th>Price</th>
                    <th>View</th>
                    <th>Add to cart</th>
                </tr>
                <?php 
                $countrow = 0;
                    while($rowitems = $resultitem-> fetch_assoc()){
                        ?>
                    <tr>
                    <td><img class="profile" src=<?php echo $filename.$rowitems["photo_img"]; ?> alt="" width="100" height="100"></td>
                    <td> <?php echo $rowitems["name"];?></td>
                    <td> <?php echo $rowitems["company"];?></td>
                    <td><?php echo $rowitems["discription"];?></td>
                    <td>$<?php echo $rowitems["price"];?></td>
                    <td><a href="viewitemdetail.php?itemid=<?php echo $rowitems["itemid"]; ?>">View</a></td>
                    <td><a href="addtocart.php?itemid=<?php echo $rowitems["itemid"]; ?>">Add to cart</a></td>
                    </tr>
                <?php
			    $countrow++;
			    }
			    ?>


            </table>

            </div>

            <?php
            }
            else
            {
            echo "No result";
            }
            ?>
</body>
</html>