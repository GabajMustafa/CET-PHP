<?php
    $studentid = '';
    $studentname = '';
    $subj = [];
    $gender = '';
    $english = '';
    $math = '';
    $programming = '';

    function getFavoriteSubject($subject) {
        foreach($_POST['subj'] as $value) {
            if($subject == $value) {
                return "Yes";
            }
        }
        return "No";
    }

    function update() {
        try {

            $pdo = new  PDO("mysql:host=localhost;dbname=person","root", "");
            
            // PDO::ATTR_ERRMODE attribute controls how PDO should behave on errors.
            // PDO::ERRMODE_EXCEPTION : Throws a PDOException in case of an error.
            // In case of Error the system will throw a PDOException
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            // here are a few steps involved when using prepared statements:
            // 1) Create the SQL statement using placeholders
            $sqlNamed = 'UPDATE info SET name = :name, english = :english, math = :math, programming = :programming, gender = :gender WHERE studentid = :studentid';            // 2) Prepare the statement
            $stmt = $pdo->prepare($sqlNamed);
            // 3) Bind variables or values to the placeholders
            
            $stmt->bindValue(":name",$_POST['studentname']);
            $stmt->bindValue(":english",getFavoriteSubject("EL"));
            $stmt->bindValue(":math",getFavoriteSubject("MA"));
            $stmt->bindValue(":programming",getFavoriteSubject("PG"));
            $stmt->bindValue(":gender",$_POST['gender']);
            $stmt->bindValue(":studentid",$_POST['studentid']);
            // 4) Execute the statement
            $stmt->execute();
            header('Location: table.php?studentid=' . $_POST['studentid']);
            
        }
        catch( PDOException $Exception ) {
    
            echo '<br>There is something wrong!';
    
        }
      
    }

    if($_SERVER['REQUEST_METHOD']== "POST") {

        update();
        
    } else {

        $studentid = $_GET['studentid'];
        
        try {

            $pdo = new  PDO("mysql:host=localhost;dbname=person","root", "");
            
            // PDO::ATTR_ERRMODE attribute controls how PDO should behave on errors.
            // PDO::ERRMODE_EXCEPTION : Throws a PDOException in case of an error.
            // In case of Error the system will throw a PDOException
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            // here are a few steps involved when using prepared statements:
            // 1) Create the SQL statement using placeholders
            $sqlNamed = "SELECT * FROM info WHERE studentid = :studentid ";            
             // 2) Prepare the statement
            $stmt = $pdo->prepare($sqlNamed);
            // 3) Bind variables or values to the placeholders
            $stmt->bindValue(":studentid",$studentid);
            // 4) Execute the statement
            $stmt->execute();
            
            $resulte  = $stmt->fetch(PDO::FETCH_OBJ);
            if($resulte) {
                 $studentid = $resulte->studentid;
                 $studentname = $resulte->name;
                 $english = $resulte->english == "Yes" ? "checked" : "";
                 $math = $resulte->math == "Yes" ? "checked" : "";
                 $programming = $resulte->programming == "Yes" ? "checked" : "";
                 $gender = $resulte->gender;
                 
            }
            
            
        }
        catch( PDOException $Exception ) {
    
            echo '<br>There is something wrong!';
    
        }    

    }


?>
<!DOCTYPE html>
 <html>
 <head><title>Student Info</title></head>
 <body>
        <form action = "" method = "POST">
            Enter Student Id <BR>
            <input type = "text" name = "studentid" readonly value ="<?=$studentid?>" placeholder ="Student Id">
            <BR><BR>
            Enter Name <BR>
            <input type = "text" name = "studentname" value ="<?=$studentname?>" 
             placeholder="Your Name">
            <BR><BR>
            Favorite Subject(s)<BR>
            <input type = "checkbox" name = "subj[]" value ="EL" <?=$english?> >English
            <input type = "checkbox" name = "subj[]" value ="MA" <?=$math?> >Math
            <input type = "checkbox" name = "subj[]" value ="PG" <?=$programming?>>Programming
            <BR><BR>
            Gender <BR>
            <input type = "radio" name = "gender" value ="M" <?=($gender=='M'? 'checked' : '')?>>Male
            <input type = "radio" name = "gender" value ="F" <?=($gender=='F'? 'checked' : '')?>>Female
            <BR><BR>
            <input type = "submit" name="sm" value = "Submit Form">
        </form>
        <br>
        <a href="table.php">Show Table</a>
        <a href="list.php">Show Info Card</a>

 </body>
 </html>