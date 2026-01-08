<?php
include "../db/config.php";
if(isset($_POST['add'])){
mysqli_query($conn,
"INSERT INTO questions(question,answer)
VALUES('$_POST[q]','$_POST[a]')");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
<h2>Add Question</h2>
<form method="post">
<div class="input-group">
<input type="text" name="q" placeholder="Question">
</div>
<div class="input-group">
<input type="text" name="a" placeholder="Answer">
</div>
<button name="add">Add</button>
</form>
</div>
</body>
</html>