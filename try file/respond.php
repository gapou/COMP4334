<?php
// Initialize the session
$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "";
$db = "phplogin";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
 
///////////////////////////////////////////////////////////////////////////////////////////
$username = $_COOKIE['user'];
$result = mysqli_query($mysqli,"SELECT * FROM poll WHERE QuestionNo=".$_GET['qid']."");
$row= mysqli_fetch_array($result);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $qid=$_POST['qid'];
    $choice=$_POST['ch'];
    
    $sql="INSERT INTO vote set username=?, questionno=?, choice=? ,salary=? WHERE jobid=?";
    $stmt=$mysqli->prepare($sql);
    $stmt->bind_param("sss", $username, $qid, $choice);
    $stmt->execute();

    $message = "Respond Successfully";
    }



?>

<html>
<head>
    <title>Respond</title>

</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Question No.: <br>
        <input disabled="true" type="text" name="qid"  value="<?php echo $row['QuestionNo']; ?>">
        <br>

        Title: <br>
        <input disabled="true" type="text" name="title" value="<?php echo $row['title']; ?>">
        <br>
       
        Please choice:<br>
        <br>
        <input type="radio" name="ch" value="choice"/><?php echo $row['option1']; ?><br>
        <input type="radio" name="ch" value="choice"/><?php echo $row['option2']; ?><br>
        <input type="radio" name="ch" value="choice"/><?php echo $row['option3']; ?><br>
        <input type="radio" name="ch" value="choice"/><?php echo $row['option4']; ?><br>

        <input type="submit" name="submit" value="Submit" class="but">

    </form>
</body>
</html>