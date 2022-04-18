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
    <title><?php echo $username ?> | Table Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('usernav.php'); ?>        
    <div class="container">

    <h1>Avilible Items in Table Form:</h1>


<?php
        if($resultitem -> num_rows >0){
            $countrow = 0;
                while($rowitems = $resultitem-> fetch_assoc()){
                ?>
                Photo: <br>
                <img class="profile" src=<?php echo $filename.$rowitems["photo_img"]; ?> alt="" width="100" height="100"><br>
                Name: <?php echo $rowitems["name"];?><br>
                Discription: <?php echo $rowitems["discription"];?><br>
                Price: $<?php echo $rowitems["price"];?><br>
                View: <a href="viewitemdetail.php?itemid=<?php echo $rowitems["itemid"]; ?>">View</a><br>
                Add to Cart: <a href="addtocart.php?itemid=<?php echo $row["itemid"]; ?>">Add to cart</a><br>
                <br>
            <?php
            $countrow++;
            }
        }
        else
        {
        echo "No result";
        }
        ?>
    

    </div>
</body>
</html>