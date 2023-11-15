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
    <title>Document</title>
    <style>
    td{
        background-color: #FF0000;
    }
    </style>
</head>
<body>
<select name="oyatu">

<?php 

//＊ここで表示処理
for($i=0; $i<count($txt)-1;$i++){
    print_r($txt[$i][0]);
        echo "<option name=".$txt[$i][0]. "value=".$txt[$i][0].">";

}

?>
</select>
</body>
</html>