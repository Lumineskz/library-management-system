<?php
include '../db.php';
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == 'user'){
        echo "You are logged in as user.";
    }else{
        header("Location: admin/dashboard.php");
        exit();
    }
}else{
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php?user_id=<?php echo $user_id ?>">Log out</a>
</body>
</html>