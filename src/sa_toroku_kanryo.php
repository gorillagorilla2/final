<body>
<?php

// 必要なファイルの読み込みや設定を行う

// DB 接続
require 'db_connect.php';
$pdo = new PDO($connect, USER, PASS);

// POST データの取得
$musician_id = isset($_POST['Musician_toroku']) ? $_POST['Musician_toroku'] : '';
$musician_name = isset($_POST['name']) ? $_POST['name'] : '';
$musician_ch = isset($_POST['musician_link']) ? $_POST['musician_link'] : '';


// 作曲者と楽曲の関連情報を登録
$stmt = $pdo->prepare('INSERT INTO Musician(musician_name, musician_ch) VALUES (?,?)');
$stmt->execute([$musician_name,$musician_ch]);


// SQL 実行
// $stmt = $pdo->prepare('INSERT INTO Musician (musician_name) VALUES (?)');
// $stmt->execute([$musician_name,]);

// 新しく追加された楽曲の ID 取得
// $music_id = $pdo->lastInsertId();


// 登録完了メッセージを表示
echo '<p>作曲者が正常に登録されました。</p>';

echo'<form action="https://aso2201196.kill.jp/final/src/top.php">';
    echo  '<button type="submit">トップに戻る</button>';
     echo '</form>'
// 必要なら他の処理やリダイレクトなどを行う

?>
</body>
</html>