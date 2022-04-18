<?php
// Initialize the session
$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "";
$db = "phplogin";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
 
///////////////////////////////////////////////////////////////////////////////////////////

$result = mysqli_query($mysqli,"SELECT * FROM poll WHERE QuestionNo=".$_GET['qid']."");
$row= mysqli_fetch_array($result);
?>

<html>
<head>
    <title>View Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table class="job">
        <tr>
            <th>
            Question No.:
            </th>
            <td>
            <?php echo $row['QuestionNo']; ?>
            </td>
        </tr>

        <tr>
            <th>
            Job Title:
            </th>
            <td>
            <?php echo $row['title']; ?>
            </td>
        </tr>

        <tr>
            <th>
            O1:
            </th>
            <td>
            <?php echo $row['option1']; ?>
            </td>
        </tr>


        <tr>
            <th>
            O2:<br>
            </th>
            <td>
            <?php echo $row['option2']; ?>
            </td>
        </tr>

        <tr>
            <th>
            O3:
            </th>
            <td>
            <?php echo $row['option3']; ?>
            </td>
        </tr>

        <tr>
            <th>
            O4:
            </th>
            <td>
            <?php echo $row['option4']; ?>
            </td>
        </tr>

    </table>
</body>
</html>