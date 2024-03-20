<?php



include 'database_connection.php';
include 'create_table.php';
include 'functions.php'; 


echo createUser("new", "new@gmail.com");

$user = getUser(38);
print_r($user);


$user_update_record = updateUser(38, "abc", "abc@gmail.com");
print_r($user_update_record);



//echo deleteUser(37);

?>
