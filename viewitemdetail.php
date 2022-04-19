<?php
// Initialize the session
include('dbconnect.php'); 
///////////////////////////////////////////////////////////////////////////////////////////
$filename= "items/";
if($_COOKIE["loggedin"] != "true"){
    // Redirect user to page login
    header("location:index.php");
}else{
    ;
}
 
$result = mysqli_query($mysqli,"SELECT * FROM items WHERE itemid=".$_GET['itemid']."");
$row= mysqli_fetch_array($result);
?>

<html>
<head>
    <title>Items Details | <?php echo $row['name']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <table>
        <tr>
            <th>
            Items ID:
            </th>
            <td>
            <?php echo $row['itemid']; ?>
            </td>
        </tr>

        <tr>
            <th>
            Name:
            </th>
            <td>
            <?php echo $row['name']; ?>
            </td>
        </tr>

        <tr>
            <th>
            Description:
            </th>
            <td>
            <?php echo $row['discription']; ?>
            </td>
        </tr>


        <tr>
            <th>
            Price(HKD):<br>
            </th>
            <td>
            <?php echo $row['price']; ?>
            </td>
        </tr>

        <tr>
            <th>
            Photo:
            </th>
            <td>
            <img class="profile" src=<?php echo $filename.$row["photo_img"]; ?> alt="" width="100" height="100">
            </td>
        </tr>

    </table>
    <a href="addtocart.php?itemid=<?php echo $row["itemid"]; ?>">Add to cart</a>
    
    
</body>
</html>