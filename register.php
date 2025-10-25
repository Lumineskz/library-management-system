<?php 
include "db.php";
if($_SERVER['REQUEST_METHOD']== "POST"){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $role= $_POST['role'];

    $sql = "insert into users(name,email,password,role) values('$name','$email','$password','$role')";
    $result = mysqli_query($conn,$sql);

    if(!$result){
        echo "Error: {$result->error}";
    }else{
        echo "Registered succesfully";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "heading.php"; ?>
<body>
    <div class="register">
        <form action="register.php" method="POST">
            <input type="text" name="name" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="role" value="user" hidden>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>