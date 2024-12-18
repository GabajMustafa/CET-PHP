
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
        $sql = 'SELECT * FROM info';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_NUM)){
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
              echo '<a href="#">Edit</a> ';
              echo '<a href="#">Delete</a>';
              echo '</div>';
              echo '</div>';
        }
    }
    catch(PDOException $Exception ) {
        
        echo '<br>Error: Database Connction!';
    }
 ?>
</body>
</html>
