<?php
include('dbconnect.php'); 
///////////////////////////////////////////////////////////////////////////////////////////
$result="";
if($_COOKIE["loggedin"] != "true"){
    // Redirect user to page login
    header("location:index.php");
}else{
    ;
}

$username=$_COOKIE['user'];

$sqlpurchase = "SELECT * FROM purchase INNER JOIN items ON purchase.itemid=items.itemid WHERE user = '$username' ";
$resultpurchase = $mysqli->query($sqlpurchase);

$sqlusers = "SELECT * FROM users WHERE username = '$username'";
$resultusers = mysqli_query($mysqli,$sqlusers);
$rowusers = mysqli_fetch_array($resultusers);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Purchase History | <?php echo $rowusers["username"] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('usernav.php'); ?>
    <div class="container">
    <div>
        <div>
            <h3> <?php echo "User Name: " . $rowusers["username"] ?> </h3> 

            <h3> These are your purchase history have applied your job: </h3>
            <?php
            if($resultpurchase -> num_rows >0){
            ?>
            <table class="job">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Payment Method</th>
                    <th>Item Details</th>
                </tr>
                <?php 
                $countrow = 0;
                    while($rowpurchase = $resultpurchase-> fetch_assoc()){
                        ?>
                    <tr>
                    <td> <?php echo $rowpurchase["itemid"];?></td>
                    <td> <?php echo $rowpurchase["price"];?></td>
                    <td> <?php echo $rowpurchase["quantity"];?></td>
                    <td> <?php echo $rowpurchase["payment_method"];?></td>
                    <td><a href="viewitemdetail.php?itemid=<?php echo $rowpurchase["itemid"]; ?>" target="iframe_view" >View Items</a></td>
                    </tr>

                <?php
			    $countrow++;
			    }
			    ?>


            </table>
            <?php
            }
            else
            {
            echo "No result";
            }
            ?>

        </div>
        
        <div>
        <iframe name="iframe_view" src="" title="view" class="iframe"></iframe>
        </div>
    
    </div>
    
    </div>

</body>
</html>