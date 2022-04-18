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

$sql = "SELECT * FROM items WHERE company = '$username'";
$resultitem = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $username ?> | Table Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('comnav.php'); ?>
    <div class="container">
    <h1>Your Items in Table Form:</h1>


<?php
        if($resultitem -> num_rows >0){
            $countrow = 0;
                while($rowitems = $resultitem-> fetch_assoc()){
                ?> 
                <div class="card">
                <div class="col-md-4">
                Photo: <br>
                
                <img class="profile" src=<?php echo $filename.$rowitems["photo_img"]; ?> alt="" width="100" height="100"><br>
                </div>
                <div class="col-md-8">
                Name: <?php echo $rowitems["name"];?><br>
                
                Discription: <?php echo $rowitems["discription"];?><br>
                
                Price: $<?php echo $rowitems["price"];?><br>
                
                Update/View: <a href="updateitem.php?itemid=<?php echo $rowitems["itemid"]; ?>">Update</a><br>
                
                Delete: <a href="deleteitems.php?itemid=<?php echo $rowitems["itemid"]; ?>">Delete</a><br>
                
                Item Purchase Record: <a href="itempurchase.php?itemid=<?php echo $rowitems["itemid"]; ?>">History</a><br>
                <br>
                </div>
                </div>

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