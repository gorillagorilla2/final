<?php
session_start();
require 'head.php';
require 'db_connect.php';
?>

<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $musicId = $_POST['music_id'];

    // データベースから指定された楽曲データを取得
    $pdo = new PDO($connect, USER, PASS);
    $query = $pdo->prepare('SELECT * FROM Music WHERE music_id = :music_id');
    $query->bindParam(':music_id', $musicId, PDO::PARAM_INT);
    $query->execute();
    $musicData = $query->fetch(PDO::FETCH_ASSOC);

    // 取得した楽曲データを用いて更新フォームを表示
    echo '<center>';
    echo '<div class="title">';
    echo '<h2>楽曲更新</h2>';
    echo '</div>';
    echo '<center>';
    echo '<div class="music-update-form">';
    echo '<form action="update_success.php" method="post">';
    echo '<input type="hidden" name="music_id" value="' . $musicData['music_id'] . '">';
    echo '楽曲名: <input type="text" name="music_name" value="' . $musicData['music_name'] . '"><br>';
    // 他の更新項目も同様に追加
    echo 'Youtubeリンク: <input type="text" name="music_link" value="' . $musicData['music_link'] . '"><br>';

    echo '<button type="submit">更新</button>';
    echo '</form>';
    echo '</div>';
    echo '</center>';
}
?>
</body>
</html>