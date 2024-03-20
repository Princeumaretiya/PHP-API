<?php

function createUser($username, $email) {
    global $conn;
    $sql = "INSERT INTO `users`(`username`, `email`) VALUES ('$username','$email')";
    
    if ($conn->query($sql) === TRUE) {
        return "New record created successfully <br>";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}


function getUser($id) {
    global $conn;
    $sql = "SELECT * FROM `users` WHERE id=$id";
    
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
  
        return $result->fetch_assoc();
    } else {
        return "No user found with id: $id  <br>";
    }
}


function updateUser($id, $username, $email) {
    global $conn;
    $sql = "UPDATE `users` SET `username`='$username',`email`='$email' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Upadate record Successfully <br>";
        return getUser($id);
    } else {
        return "Error updating record: <br>" . $conn->error;
    }
}

function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM `users` WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "<br> Record deleted successfully <br>";
    } else {
        return "Error deleting record: <br>" . $conn->error;
    }
}

function createPost($user_id, $title, $content){
    global $conn;
    $sql = "INSERT INTO `posts`(`user_id`, `title`, `content`) VALUES ('$user_id','$title','$content')";
    
    
    if ($conn->query($sql) === TRUE) {
        return "New record created successfully <br>";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
