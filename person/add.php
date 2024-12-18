<?php
    
    function getFavoriteSubject($subject) {
        foreach($_POST['subj'] as $value) {
            if($subject == $value) {
                return "Yes";
            }
        }
        return "No";
    }

    try {

        $pdo = new  PDO("mysql:host=localhost;dbname=person","root", "");
        
        // PDO::ATTR_ERRMODE attribute controls how PDO should behave on errors.
        // PDO::ERRMODE_EXCEPTION : Throws a PDOException in case of an error.
        // In case of Error the system will throw a PDOException
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        // here are a few steps involved when using prepared statements:
        // 1) Create the SQL statement using placeholders
        $sqlNamed = "INSERT INTO `info`(`studentid`, `name`, `english`, `math`, `programming`, `gender`) VALUES(:studentid,:name,:english,:math,:programming,:gender)"; 
        // 2) Prepare the statement
        $stmt = $pdo->prepare($sqlNamed);
        // 3) Bind variables or values to the placeholders
        $stmt->bindValue(":studentid",$_POST['studentid']);
        $stmt->bindValue(":name",$_POST['studentname']);
        $stmt->bindValue(":english",getFavoriteSubject("EL"));
        $stmt->bindValue(":math",getFavoriteSubject("MA"));
        $stmt->bindValue(":programming",getFavoriteSubject("PG"));
        $stmt->bindValue(":gender",$_POST['gender']);
        // 4) Execute the statement
        $stmt->execute();
        header('Location: table.php?studentid=' . $_POST['studentid']);
        
    }
    catch( PDOException $Exception ) {

        echo '<br>There is something wrong!';

    }

?>