<?php
require "db.php";

if(isset($_POST['signup'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(name,email,password) VALUES(:name,:email,:password)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':name'=>$name,
        ':email'=>$email,
        ':password'=>$password
    ]);

    echo "Signup Successful!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h2>Signup</h2>

<form method="POST">

<input type="text" name="name" placeholder="Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="signup">Signup</button>

</form>

<a href="login.php">Already have account? Login</a>

</div>

</body>
</html>