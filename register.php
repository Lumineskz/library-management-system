<?php
include 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "insert into users(name, email, password, role) values('$name', '$email', '$password', '$role')";
    $result = mysqli_query($conn, $sql);

    if(!$result){
        die("Error: " . mysqli_error($conn));
    }else{
        echo "New record created successfully";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'heading.php' ?>
<body>
    <div class="register">
        
        <form action="register.php" method="POST">
            <h2>Register</h2>
            <label for="name">Name:</label> <br>
            <input type="text" name="name" placeholder="Enter your Name"> <br>
            <label for="email">E-mail:</label> <br>
            <input type="email" name="email" placeholder="Enter your Email"> <br>
            <label for="password">Password:</label> <br>
            <input type="password" name="password" placeholder="Enter your Password"> <br>
            <input type="text" name="role" value="user" hidden> <br>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>