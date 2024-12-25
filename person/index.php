<!DOCTYPE html>
 <html>
 <head><title>PHP Form Handling</title></head>
 <body>
        <form action = "add.php" method = "POST">
            Enter Student Id <BR>
            <input type = "text" name = "studentid" value ="" placeholder ="Student Id" required >
            <BR><BR>
            Enter Name <BR>
            <input type = "text" name = "studentname" value ="" 
             placeholder="Your Name">
            <BR><BR>
            Favorite Subject(s)<BR>
            <input type = "checkbox" name = "subj[]" value ="EL">English
            <input type = "checkbox" name = "subj[]" value ="MA">Math
            <input type = "checkbox" name = "subj[]" value ="PG">Programming
            <BR><BR>
            Gender <BR>
            <input type = "radio" name = "gender" value ="M">Male
            <input type = "radio" name = "gender" value ="F">Female
            <BR><BR>
            <input type = "submit" name="sm" value = "Submit Form">
        </form>
        <br>
        <a href="table.php">Show Table</a>
        <a href="list.php">Show Info Card</a>

 </body>
 </html>