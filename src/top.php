<?php
session_start();
require 'head.php';
require 'db_connect.php';
?>

<body>
    <?php
    // データベースから楽曲データを取得
    $pdo = new PDO($connect, USER, PASS);
    $query = $pdo->query('SELECT Music.music_id, Music.music_name, Music.music_link, Musician.musician_name FROM Music JOIN Musician ON Music.musician_id = Musician.musician_id');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    // MusicテーブルとMusicianテーブルから取得したデータを表示
    echo '<center>';
    echo '<div class="title">';
    echo '<h2>楽曲一覧</h2>';
    echo '<a href="toroku.php">登録</a>';
    echo '</div>';
    echo '<center>';
    echo '<div class="music-list">';
    echo '</center>';

    // カウンターを初期化
    $columnCounter = 0;

    foreach ($data as $item) {
        // カラムが四つ以上表示されたら改行
        if ($columnCounter % 4 == 0) {
            echo '<div style="clear:both;"></div>'; // 改行
        }

        echo '<div style="float:left; margin:10px; width:23%;">';
        echo '<p style="margin-bottom: 0;">';
        echo '作曲者名: ' . $item['musician_name'] . '<br>';
        echo '楽曲名: ' . $item['music_name'];

        // 更新フォームの表示
        echo '<form action="update.php" method="post">';
        echo '<input type="hidden" name="music_id" value="' . $item['music_id'] . '">';
        echo '<button type="submit">更新</button>';
        echo '</form>';

        // 削除ボタンを表示
        echo '<form action="delete.php" method="get" onsubmit="return confirm(\'削除してもよろしいですか？\');">';
        echo '<input type="hidden" name="music_id" value="' . $item['music_id'] . '">';
        echo '<button type="submit">削除</button>';
        echo '</form>';

        echo '</p>';

        // YouTubeの埋め込みコードを生成
        $youtubeEmbedCode = getYoutubeEmbedCode($item['music_link']);
        echo '<p style="margin-top: 0;">YouTube動画:<br>' . $youtubeEmbedCode . '</p>';

        echo '</div>';

        // カウンターを更新
        $columnCounter++;
    }

    echo '</div>';
    echo '</center>';

    // YouTubeの動画リンクから埋め込みコードを生成する関数
    function getYoutubeEmbedCode($youtubeLink)
    {
        // YouTubeの動画IDを抽出
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $youtubeLink, $matches);
        $youtubeVideoId = isset($matches[1]) ? $matches[1] : '';


        // 埋め込みコードを生成
        $embedCode = '<iframe width="auto" height="auto" src="https://www.youtube.com/embed/' . $youtubeVideoId . '" frameborder="0" allowfullscreen></iframe>';
        return $embedCode;
    }

    echo '</div>';
    echo '</center>';
    ?>
</body>

</html>