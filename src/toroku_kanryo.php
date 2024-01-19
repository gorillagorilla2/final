<body>
<?php

// 必要なファイルの読み込みや設定を行う

// DB 接続
require 'db_connect.php';
$pdo = new PDO($connect, USER, PASS);
$musician_id = $_POST["Musician_toroku"];
// POST データの取得
$musician_id = isset($_POST['Musician_toroku']) ? $_POST['Musician_toroku'] : '';
$music_name = isset($_POST['music']) ? $_POST['music'] : '';
$music_link = isset($_POST['music_link']) ? $_POST['music_link'] : '';
$musician_link = isset($_POST['musician_link']) ? $_POST['musician_link'] : '';

// 作曲者と楽曲の関連情報を登録
// $stmt = $pdo->prepare('INSERT INTO Musician(musician_name) VALUES (?)');
// $stmt->execute([$musician_name]);

// SQL 実行
$stmt = $pdo->prepare('INSERT INTO Music (music_name, music_link,musician_id) VALUES (?, ?,?)');
$stmt->execute([$music_name, $music_link,$musician_id]);

// 新しく追加された楽曲の ID 取得
$music_id = $pdo->lastInsertId();


// 登録完了メッセージを表示
echo '<p>楽曲が正常に登録されました。</p>';

// 必要なら他の処理やリダイレクトなどを行う
echo'<form action="https://aso2201196.kill.jp/final/src/top.php">';
    echo  '<button type="submit">トップに戻る</button>';
     echo '</form>'

?>
</body>
</html>