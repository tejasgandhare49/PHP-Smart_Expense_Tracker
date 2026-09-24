<?php
require 'config/db.php';
session_start();
$error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $name=trim($_POST['name']); $email=trim($_POST['email']); $password=$_POST['password'];
    if (!$name || !$email || !$password) $error='All fields are required.';
    else {
        try {
            $stmt=$pdo->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
            $stmt->execute([$name,$email,password_hash($password,PASSWORD_DEFAULT)]);
            header('Location: login.php?registered=1'); exit;
        } catch(PDOException $e) { $error='Email already registered.'; }
    }
}
?>
<!DOCTYPE html><html><head><title>Register</title><link rel="stylesheet" href="assets/style.css"></head>
<body><div class="container small"><h2>Create Account</h2>
<?php if($error): ?><div class="error"><?=htmlspecialchars($error)?></div><?php endif; ?>
<form method="post">
<input name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button class="btn">Register</button>
</form><p>Already registered? <a href="login.php">Login</a></p></div></body></html>