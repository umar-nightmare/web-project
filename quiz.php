<?php
session_start();
include "db/config.php";

// Fetch one question (you can improve this later)
$q = mysqli_query($conn, "SELECT * FROM questions ORDER BY RAND() LIMIT 1");
$question = mysqli_fetch_assoc($q);

$result = "";
if(isset($_POST['submit'])){
    if($_POST['answer'] == $_POST['correct']){
        $result = "✅ Correct Answer!";
    } else {
        $result = "❌ Wrong Answer!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Quiz Time</h2>

    <?php if($result!="") echo "<p>$result</p>"; ?>

    <form method="post">
        <p><strong><?php echo $question['question']; ?></strong></p>

        <div class="input-group">
            <input type="text" name="answer" placeholder="Your Answer" required>
        </div>

        <input type="hidden" name="correct" value="<?php echo $question['answer']; ?>">

        <button name="submit">Submit Answer</button>
    </form>

    <div class="links">
        <a href="user/dashboard.php">⬅ Back to Dashboard</a>
    </div>
</div>

</body>
</html>
