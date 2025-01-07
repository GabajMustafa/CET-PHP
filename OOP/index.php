<?php
    declare(strict_types=1);
    include 'student.php';
    $student = new Student(100,"Ali");
    $student->name = 'khalid';
    $student->age = 40;
    $student->salary = 4000;
    echo $student;
?>