<?php
require 'config/db.php'; session_start();
if(!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
$uid=$_SESSION['user_id'];
$stmt=$pdo->prepare("SELECT COALESCE(SUM(CASE WHEN type='income' THEN amount ELSE 0 END),0) income,
COALESCE(SUM(CASE WHEN type='expense' THEN amount ELSE 0 END),0) expense FROM transactions WHERE user_id=?");
$stmt->execute([$uid]); $tot=$stmt->fetch();
$balance=$tot['income']-$tot['expense'];
$stmt=$pdo->prepare("SELECT * FROM transactions WHERE user_id=? ORDER BY transaction_date DESC,id DESC LIMIT 10");
$stmt->execute([$uid]); $rows=$stmt->fetchAll();
?>
<!DOCTYPE html><html><head><title>Dashboard</title><link rel="stylesheet" href="assets/style.css"></head>
<body><nav><b>Smart Expense Tracker</b><span>Welcome, <?=htmlspecialchars($_SESSION['name'])?> | <a href="logout.php">Logout</a></span></nav>
<div class="container"><h2>Dashboard</h2>
<div class="stats"><div class="stat">Income<br><strong>₹<?=number_format($tot['income'],2)?></strong></div>
<div class="stat">Expense<br><strong>₹<?=number_format($tot['expense'],2)?></strong></div>
<div class="stat">Balance<br><strong>₹<?=number_format($balance,2)?></strong></div></div>
<div class="card"><h3>Add Transaction</h3>
<form method="post" action="add_transaction.php" class="grid">
<select name="type"><option value="income">Income</option><option value="expense">Expense</option></select>
<input name="category" placeholder="Category" required><input type="number" step="0.01" name="amount" placeholder="Amount" required>
<input type="date" name="transaction_date" value="<?=date('Y-m-d')?>" required><input name="description" placeholder="Description">
<button class="btn">Add</button></form></div>
<div class="card"><h3>Recent Transactions</h3><table><tr><th>Date</th><th>Type</th><th>Category</th><th>Amount</th><th>Description</th></tr>
<?php foreach($rows as $r): ?><tr><td><?=$r['transaction_date']?></td><td><?=ucfirst($r['type'])?></td><td><?=htmlspecialchars($r['category'])?></td><td>₹<?=number_format($r['amount'],2)?></td><td><?=htmlspecialchars($r['description'])?></td></tr><?php endforeach; ?>
</table></div></div></body></html>