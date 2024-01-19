<?php session_start(); ?>
<?php require 'head.php' ?>
<?php require 'db_connect.php'; ?>

</head>

<body>

    <div class="title">
        <h2>楽曲登録</h2>
    </div>
    <center>
        <div class="touroku">
            <!-- 作曲者 -->
            <form action="toroku_kanryo.php" method="post">
                作曲者名
                <select name="Musician_toroku" id="" required>
                    <option value="" selected>選択してください</option>
                    <?php
                    $pdo = new PDO($connect, USER, PASS);
                    foreach ($pdo->query('select * from Musician') as $row) {
                        echo '<option value=', $row['musician_id'], '>', $row['musician_name'], '</option>';
                    }
                    ?>


                </select>
                <a href="sa_toroku.php">作曲者新規登録</a><br>
                <p>楽曲名
                    <input type="text" name="music" class="" required>
                </p>
                <p> 楽曲リンク
                    <input type="text" name="music_link" placeholder="YOUTUBEの埋め込みで入力" required>
                </p>
                <div class="torokubu">
                    <button type="submit">登録</button>
                </div>
            </form>
            <form action="top.php" method="post">
                <button>戻る</button>
            </form>
        </div>
    </center>
</body>

</html>