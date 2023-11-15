<?php
$food = $_POST["food"];
// $food_txt = $_POST["food_txt"];

//文字作成
$str = $food;
// $str_txt= $food_txt;
//File書き込み
$file = fopen("data/data_food.txt","a");	// ファイル読み込み
//くっつけるときに.をつける
fwrite($file, $str."\n"); //opion+￥でバックスラッシュ\ →\n で改行
fclose($file);
?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/data_food.txt を確認</h2>
<p><?=$str?></p>
<ul>
<li><a href="include2.php">戻る</a></li>
</ul>
</body>
</html>