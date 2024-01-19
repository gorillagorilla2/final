<?php session_start(); ?>
<?php require 'head.php'; ?>
<?php require 'db_connect.php';?>

<body>
<?php
if (isset($_GET['music_id'])) {
    $musicId = $_GET['music_id'];

    // データベースから楽曲を削除
    $pdo = new PDO($connect, USER, PASS);
    $stmt = $pdo->prepare('DELETE FROM Music WHERE music_id = ?');
    $stmt->execute([$musicId]);

    // 削除が成功したらメッセージを表示
    if ($stmt->rowCount() > 0) {
        echo '<p>楽曲を削除しました。</p>';
    } else {
        echo '<p>削除に失敗しました。</p>';
    }
} else {
    echo '<p>削除対象の楽曲が指定されていません。</p>';
}

 echo'<form action="https://aso2201196.kill.jp/final/src/top.php">';
   echo  '<button type="submit">トップに戻る</button>';
    echo '</form>'
?>
    
</body>
</html>