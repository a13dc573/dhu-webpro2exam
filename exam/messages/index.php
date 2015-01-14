<?php
if(!empty($_POST)){
	try{
		$pdo=new PDO('mysql:host=localhost;dbname=webpro2examdb;charset=utf8;',
		'root',
		''
		);
		$sql="insert into messages(room_id,sent_at,content) value(".intval($_POST['room_id']).",now(), '".$_POST['article']."')";
		echo $sql;
		$pdo->query($sql);
	}catch (PDOException $e){
		print('Error:' .$se->getMessage());
		die();
	}
	$pdo=null;
	header("location:index.php?room_id=".$_POST['room_id']);
	exit();
}else{
	try{
		$pdo=new PDO('mysql:host=localhost;dbname=webpro2examdb;charset=utf8;',
		'root',
		''
		);
		$msql = "select * from messages where room_id =" .$_GET['room_id']. "";
		$tmp = $pdo->query("select * from rooms where id=" .$_GET['room_id']);
		$title;
		foreach($tmp as $row){
			$title=$row['name'];
		}
		$messages=$pdo->query($msql);
	}catch (PDOException $e){
		print('Error:'.$e->getMessage());
		die();
	}
	$pdo = null;
}
?>

<html lang="ja">
<head>
<link href="css/stylesheet.css" rel="stylesheet">
</head>

<body>
<a href="/exam/rooms">戻る</a>
<h1 id="head">ルーム一覧</h1>
<ul>
	
	<h2><?php echo $title;?>のメッセージの一覧です。</h2>
</ul>
<div id="bod">
</br>
<?php

foreach($messages as $row){
	echo $row["sent_at"]. " ".$row["content"]."<br>";
}
?>
<div id="bag">
<p class="txt">何か話しましょう！</p>
<form method="POST" action="">
<?php
echo "<input type='hidden' name='room_id' value=".$_GET['room_id'].">";
?>
<textarea id="artcile" name="article" cols="70" rows="15"></textarea>
<input type="submit" class="btn btn-warning btn-sm" id="btn-chat" value="send"/>
</form>
</div>
</div>
<footer>
  <p class="foot">Privacy Policy. Copy Right 2015 Naresh. All Right Reserved</p>
</footer>
</body>
</html>