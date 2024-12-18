<?php

$pdo = null;
$resultset = null;
$studentid = '';

if(isset($_GET['studentid']))
{
    $studentid = $_GET['studentid'];
}

try {
    // We can use the PDO library to connect to 12 different types of database servers - 
    // such as a MySQL server, an Oracle server, or a Microsoft SQL Server.
    // PDO uses an object-oriented approach.
    // To connect to our database, we create a PDO object.  
    $pdo = new  PDO("mysql:host=localhost;dbname=person","root", "");
    // To get PDO to inform us of any issues, we need to use the
    // setAttribute() method to configure the error mode.
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM info ORDER BY `studentid`';
    // Execute the query
    $stmt = $pdo->query($sql); 
    
    
}
catch(PDOException $Exception ) {
    
    echo '<br>There is something wrong!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Info</title>
    <style>
        .selectrow {
            background-color: gainsboro;
        }
    </style>
</head>
<body>
        <table border="1">
            <thead>
                <tr>
                    <th rowspan="2">Student Id</th>
                    <th rowspan="2" >Name</th>
                    <th colspan="3">Favorite Subjects</th>
                    <th rowspan="2">Gender</th>
                    <th colspan="2" rowspan="2">Action</th>
                </tr>
                <tr>
                    <th>English</th>
                    <th>Math</th>
                    <th>Programing</th>
                

                </tr>
            </thead>
            <tbody>
                <?php
                $id='';
                // The fetch() method fetches the rows one by one and returns false on failure.
                // Commonly used styles include the FETCH_ASSOC and FETCH_NUM styles.
                // The FETCH_ASSOC style fetches the rows as an associative array
                // while the FETCH_NUM style fetches them as an indexed array
                while($row = $stmt->fetch(PDO::FETCH_NUM)){ ?>
                    <tr align="center" <?= ($row[0]== $studentid ? "class='selectrow'" : "") ?>>
                        <td><?=$row[0]?></td>
                        <td><?=$row[1]?></td>
                        <td><?=$row[2]?></td>
                        <td><?=$row[3]?></td>
                        <td><?=$row[4]?></td>
                        <td><?=($row[5] == "F" ? "Female" : "Male")?></td>
                        <?php 
                            $id= $row[0]; 
                        ?>
                        <td><a href="edit.php?studentid=<?php echo $id ?>">Edit</a></td>
                        <td><a href="delete.php">Delete</a></td>
                    </tr>

                <?php  } ?>

            </tbody>

        </table>
        <br>
        <a href="../person">Add New Person</a>

</body>
</html>