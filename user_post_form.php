<?php

include 'database_connection.php'; 
include 'functions.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id']; 
    $title = $_POST['title']; 
    $content = $_POST['content']; 
    
    
    $create_result = createPost($user_id, $title, $content);

    
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}


$sql = "SELECT id FROM `users`";
$result = $conn->query($sql);


$user_ids = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_ids[] = $row['id'];
    }
}
?>


<form method="post" action="">
    <select name="user_id" required>
        <option value="" disabled selected>Select User ID</option>
        <?php
        
        foreach ($user_ids as $id) {
            echo "<option value='$id'>$id</option>";
        }
        ?>
    </select><br>
    <input type="text" name="title" placeholder="Enter Title" required><br>
    <textarea name="content" placeholder="Enter Content" required></textarea><br>
    <input type="submit" value="Create Post">
</form>
