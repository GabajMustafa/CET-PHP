<?php
    
    //require_once 'config.php';
    //require_once 'database.php';
    spl_autoload_register(function($classname) {

        require_once $classname . '.php';
    
    
    });


    $db = new Database();
    $db->query('select * from customers where CustomerID > :custmerid');
    $db->bind(":custmerid",4);
    $results = $db->resultSet();
    foreach($results as $obj) {
        echo $obj->CustomerID . '<br/>';
    }
    // echo '<pre>';
    //     var_dump($result);
    // echo '</pre>';

?>