<?php
 $string = "abcd";
 // Strings;
 echo preg_match("/^[a-zA-Z ]*$/",$string);
 echo '<br/>';
 // Numbers
 $string = "89";
 echo preg_match("/^[0-9]*$/",$string);
 echo '<br/>';
 // Email
 $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
 echo preg_match($pattern,"testy@ahoo.com");
 echo '<br/>';
 // Search
 echo preg_match('/(foo)(bar)(baz)/', 'foobarbaz',$matches, PREG_OFFSET_CAPTURE);
 echo '<br/>';
 echo '<pre>';
 print_r($matches);

 echo '<br/>';
 echo preg_match('/(a)(b)*(c)*(v)/', 'abcvv', $matches);
 //var_dump($matches);
?>