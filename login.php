<?php 
    // WARNING: This code is highly vulnerable to SQL Injection and uses unhashed passwords.
    
    session_start();
    include "db.php"; // Assumes $conn is the mysqli database connection

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insecure Query: Directly inserting user input ($email) creates a SQL Injection vulnerability.
    $sql = "SELECT id, password, role FROM users WHERE email='$email'";
    
    $result = mysqli_query($conn, $sql);
    
    // Check if the query itself failed (use mysqli_error for connection errors)
    if ($result === false) {
        echo "Database query error: " . mysqli_error($conn);
        exit();
    }
    
    // LOGIC FIX: Check if exactly ONE row was returned
    if ($result->num_rows === 1) {
        
        $row = mysqli_fetch_assoc($result);
        
        // INSECURE: Comparing plain-text password from the database.
        if($row['password'] == $password){
            
            // Success: Set session variables and redirect
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
            exit();
            
        } else {
            // Password mismatch
            header("Location: login.php");
            exit();
        }
    } else {
        // No user found (or more than one, though unlikely for unique email)
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "heading.php"; ?>
<body>
    <div class="register">
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>