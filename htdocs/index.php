<?php
require'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($connect,"SELECT * FROM info WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/forIndex.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
</head>
<body>
<button><a href="logout.php" class="logout">Logout</a></button>
<h1 id="randomColorH1">YOU ARE IN :)</h1>
<script>
    function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function changeColor() {
  const h1 = document.getElementById('randomColorH1');
  h1.style.color = getRandomColor();
}

setInterval(changeColor, 500); 
</script>
</body>
</html>