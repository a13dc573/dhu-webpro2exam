<html>
<head>
	<meta charset="utf-8"/>
	<link href="css/stylesheet.css" rel="stylesheet">
</head>

<body>
	<h1 id="head">ルーム一覧表</h1>
<div>
	<h2 id="head1">発信したいルームを選択してください</h2>
 <div id="contain">
<?php
	$pdo = new PDO(
		'mysql:host=localhost;dbname=webpro2examdb;charset=utf8;',
		'root',
		''
		);
	foreach ($pdo->query('SELECT * FROM rooms') as $row){
		echo "<li><a href='http://localhost/exam/messages/?room_id=".$row["id"]."'>".$row["name"]."</a></li><br>";			
}
?>
</div>
<footer>
  <p class="foot">Privacy Policy. Copy Right 2015 Naresh. All Right Reserved</p>
</footer>
</body>
</html>