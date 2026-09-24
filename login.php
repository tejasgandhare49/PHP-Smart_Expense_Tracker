<?php
require 'config/db.php'; session_start(); $error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $stmt=$pdo->prepare("SELECT * FROM users WHERE email=?"); $stmt->execute([trim($_POST['email'])]);
    $user=$stmt->fetch();
    if ($user && password_verify($_POST['password'],$user['password'])) {
        $_SESSION['user_id']=$user['id']; $_SESSION['name']=$user['name'];
        header('Location: dashboard.php'); exit;
    } $error='Invalid email or password.';
}
?>
<!DOCTYPE html><html><head><title>Login</title><link rel="stylesheet" href="assets/style.css"></head>
<body><div class="container small"><h2>Login</h2>
<?php if(isset($_GET['registered'])): ?><div class="success">Registration successful. Login now.</div><?php endif; ?>
<?php if($error): ?><div class="error"><?=htmlspecialchars($error)?></div><?php endif; ?>
<form method="post"><input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button class="btn">Login</button></form><p>New user? <a href="register.php">Register</a></p></div></body></html>