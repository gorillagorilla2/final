<?php
session_start();
require 'head.php';
require 'db_connect.php';
?>

<body>    
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $musicId = $_POST['music_id'];
    $musicName = $_POST['music_name'];
    $musicLink = $_POST['music_link'];
    // 他の更新項目も同様に取得

    // データベースを更新する処理を追加
    $pdo = new PDO($connect, USER, PASS);
    $query = $pdo->prepare('UPDATE Music SET music_name = :music_name, music_link = :music_link WHERE music_id = :music_id');
    $query->bindParam(':music_name', $musicName, PDO::PARAM_STR);
    $query->bindParam(':music_link', $musicLink, PDO::PARAM_STR);
    $query->bindParam(':music_id', $musicId, PDO::PARAM_INT);
    $query->execute();
    
    echo "更新に成功しました";

    echo'<form action="https://aso2201196.kill.jp/final/src/top.php">';
        echo  '<button type="submit">トップに戻る</button>';
         echo '</form>';
    // 更新が完了したら成功ページにリダイレクト
    // header('Location: update_success.php');
    // exit();
} else {
    // POSTメソッド以外でアクセスされた場合はトップページにリダイレクト
    header('Location: top.php');
    exit();
}
?>
</body>
</html>