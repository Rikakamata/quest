<?php
session_start();
$gene = $_POST["gene"];
$oyatu_e = $_POST["oyatu"];


//文字作成
$str = $gene;
$str2= $oyatu_e;
$c  = ",";
//File書き込み
$file = fopen("data/data.txt","a");	// ファイル読み込み
//くっつけるときに.をつける
fwrite($file, $str.$c.$str2."\n"); //opion+￥でバックスラッシュ\ →\n で改行
fclose($file);
?>


<html>
<head>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all">
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<P>アンケートにお答えいただきありがとうございます。</P>

<p>ねんれい：<?=$str?></p>
<P>おやつ：<?=$str2?></p>
<BR>

<?php
// ファイルを変数に格納
$filename = './data/data.txt';
// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');
//＊配列の準備
$txt = [];
while (!feof($fp)) {
    //＊配列に入れる【explodeで配列に配列を入れる】
    $txt[] = explode(",", fgets($fp)); 
}
// print_r($txt);
fclose($fp);
//集計用の配列
    foreach($txt as $value){

       // $valueがすでに集計用の配列に存在するか確認
       if (array_key_exists(1, $value)) {
        $text = $value[1];
        // $textがすでに集計用の配列に存在するか確認
        if (isset($output[$text])) {
            // 存在する場合はカウントを増やす
            $output[$text]++;
        } else {
            // 存在しない場合は新しく追加
            $output[$text] = 1;
        }
    }
}
// HTMLの表を生成
echo '<table border="1">';
echo '<tr><th>昨日のおやつ</th><th>集計(人)</th></tr>';

foreach ($output as $text => $count) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($text) . '</td>';
    echo '<td>' . $count . '</td>';
    echo '</tr>';
}

echo '</table>';
?>

<a href="include.php">戻る</a></li>

</body>
</html>