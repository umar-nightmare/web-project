<?php
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
<h2>Admin Panel</h2>
<a href="add_question.php"><button>Add Question</button></a><br><br>
<a href="../logout.php"><button>Logout</button></a>
</div>
</body>
</html>
