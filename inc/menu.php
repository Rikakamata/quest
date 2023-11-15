<?php
// ファイルを変数に格納
$filename = './data/data_food.txt';

// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');
//＊配列の準備
$txt = [];
while (!feof($fp)) {
    //＊配列に入れる【explodeで配列に配列を入れる】
    $txt[] = explode(",", fgets($fp)); 
}
fclose($fp);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/style.css" rel="stylesheet" type="text/css" media="all">
    <title>おやつなにたべた？</title>
</head>
<body>


   <form action ="write.php" method="post">
    <select name="gene" id="gene">
      <option name="select" value="">ねんれい</option>
      <option value="u10">1～9さい</option>  
      <option value="10s">10代</option>
      <option value="20s">20代</option>
      <option value="30s">30代</option>
      <option value="40s">40代</option>
      <option value="50s">50代</option>
      <option value="60s">60代</option>
      <option value="70s">70代</option>
      <option value="80s">80代</option>
      <option value="o90">90歳以上</option> 
    </select>
    <select name="oyatu" id="oyatu">
      <option value="" id ="nanitabe" type="text">たべたおやつ</option>

    <?php 

//＊ここで表示処理
for($i=0; $i<count($txt);$i++){

print_r($txt[$i][0]);
        echo "<option value=".$txt[$i][0].">";
}
?>
</select>
<br>
<br>
<input type="submit" value="アンケート送信">
</body>
</html>
</select>
    <BR>
    <BR>
   </form>
  </div>
