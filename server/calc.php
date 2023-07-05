<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>calc.php</title>
</head>
<body>
<?php
$x = $_POST["x"];
$y = $_POST["y"];
?>

計算結果
<table border=1>
<tr><td>加</td><td><?php echo $x + $y ?></td></tr>
<tr><td>減</td><td><?php echo $x - $y ?></td></tr>
<tr><td>乗</td><td><?php echo $x * $y ?></td></tr>
<tr><td>除</td><td><?php echo $x / $y ?></td></tr>
</table>
</body>
</html>