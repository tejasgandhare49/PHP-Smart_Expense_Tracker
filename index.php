<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html><head><title>Smart Expense Tracker</title><link rel="stylesheet" href="assets/style.css"></head>
<body>
<div class="container center">
<h1>Smart Expense Tracker</h1>
<p>Track your income, expenses and balance easily.</p>
<div class="card">
<a class="btn" href="login.php">Login</a>
<a class="btn secondary" href="register.php">Create Account</a>
</div>
</div>
</body></html>