<?php
session_start();

$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "";
$db = "phplogin";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
///////////////////////////////////////////////////////////////////////////////////////////


$sql = "SELECT * FROM poll";
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Site</title>
</head>
<body>
    <div>

            <h3> All question: </h3>
            <?php
            if($result -> num_rows >0){
            ?>
            <table>
                <tr>
                    <th>Question No.</th>
                    <th>Title</th>
                    <th>Action</th>
                    
                </tr>
                <?php 
                $countrow = 0;
                    while($row = $result-> fetch_assoc()){
                        ?>
                    <tr>
                    <td> <?php echo $row["QuestionNo"];?></td>
                    <td> <?php echo $row["title"];?></td>
                    <td><a href="viewquestion.php?qid=<?php echo $rowjob["QuestionNo"]; ?>" target="iframe_view" >View details</a></td>
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
    


</body>
</html>