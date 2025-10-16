<?php
include 'db.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from users where email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        if($row['password'] == $password){
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            if($row['role'] == 'admin'){
                header("Location: admin/dashboard.php");
            }else{
                header("Location: dashboard.php");
            }
    }else{
        echo "Error: {$result->error}";
    }
}
}else{
    
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'heading.php' ?>
<body>
    <div class="register">
        
        <form action="login.php" method="POST">
            <h2>Log In</h2>
            <label for="name">Name:</label> <br>
            <input type="text" name="name" placeholder="Enter your Name"> <br>
            <label for="email">E-mail:</label> <br>
            <input type="email" name="email" placeholder="Enter your Email"> <br>
            <label for="password">Password:</label> <br>
            <input type="password" name="password" placeholder="Enter your Password"> <br>
            <input type="text" name="role" value="user" hidden> <br>
            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>