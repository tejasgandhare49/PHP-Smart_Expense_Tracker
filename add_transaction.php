<?php
require 'config/db.php'; session_start();
if(!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
if($_SERVER['REQUEST_METHOD']==='POST'){
$stmt=$pdo->prepare("INSERT INTO transactions(user_id,type,category,amount,description,transaction_date) VALUES(?,?,?,?,?,?)");
$stmt->execute([$_SESSION['user_id'],$_POST['type'],trim($_POST['category']),$_POST['amount'],trim($_POST['description']),$_POST['transaction_date']]);
}
header('Location: dashboard.php'); exit;
?>