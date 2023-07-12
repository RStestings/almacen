<?php

$password = '1234';
$password = hash('sha512', $password);


echo $password;

?>