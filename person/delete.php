<?php
  if(isset($_POST['studentid'])) {
    $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $pdo = new  PDO("mysql:host=localhost;dbname=person","root", "",$option);
    $sql = 'DELETE FROM info  WHERE studentid= ?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1,$_POST['studentid']);
    $stmt->execute();   
    header('Location: table.php?studentid=' . $_POST['studentid']); 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Info</title>
</head>
<body>

<a href="../person">Add New Person</a>
<?php
    function checkboxstatus($subj) {
        if(strtolower($subj) == "yes") {
            return "checked";
        } else {
            return "";
        }
    }
    $pdo = null;
    try {
        $pdo = new  PDO("mysql:host=localhost;dbname=person","root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM info WHERE studentid = :studentid';
        // Execute the query
        $stmt = $pdo->prepare($sql); 
        $stmt->bindValue(":studentid",$_GET['studentid']);
        $stmt->execute();
        if($row = $stmt->fetch(PDO::FETCH_NUM)){
              echo '<div style="border: thin solid black;padding-left:5px;margin-top:5px;">';
              
              echo '<dl>';
                echo '<dt>'. 'Student Id: '.$row[0].'<dt>';
                echo '<dt>'. 'Name: '.$row[1].'<dt>';
                echo 'Favorite Subject(s):';
                echo '<dd>';
                    echo '<input type="checkbox" ' . checkboxstatus($row[2]) . ' disabled >English' ;
                echo '</dd>';
                echo '<dd>';
                    echo '<input type="checkbox" ' . checkboxstatus($row[3]) . ' disabled >Math';
                echo '</dd>';
                echo '<dd>';
                    echo '<input type="checkbox" ' . checkboxstatus($row[4]) . ' disabled >Programming';
                echo '</dd>';
                echo 'Gender: '. ($row[5] == "F" ? "Female" : "Male");
              echo '</dl>';
              echo '<div align="center">';
              echo '<form method = "post">';
                echo '<input type="hidden" name="studentid" value="'. $row[0] .'"> ';
                echo '<input type="submit" value="Delete"> ';
                echo '<a href="table.php">Show Table</a>';
              echo '</form>';
              
              
              echo '</div>';
              echo '<br>';
              echo '</div>';
             
        }
    }
    catch(PDOException $Exception ) {
        
        echo '<br>Error: Database Connction!';
    }
 ?>
</body>
</html>
