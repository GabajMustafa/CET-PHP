<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="witrh=device-witrh, initial-scale=1.0">
    <title>Order Tracking</title>
    <style>
        #submit {
            width: 100%;
            height: 100%;
        }
        .selectrow {
            background-color: gainsboro;
            font-weight: bold;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        
        
    </style>
</head>
<body>
    <h1>Customer Info </h1>
    <form method="post">

        <table border="0">
            <tr>
                <td>Customer ID</td>
                <td><input type="text" name="customerid"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name = "name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name = "email"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name = "phone"></td>
            </tr>
            <tr>
                <td>
                </td>
                <td align="center">
                    <input type="submit" value="Submit" id="submit">
                </td>
            </tr>
        </table>    
     
    </form>
    <hr>
    <table border="1">
        <thead>
            <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th colspan="3">Action</th>
            
            </tr>
        </thead>
        <tbody>
        
        </tbody>
 
    </table>
</body>
</html>