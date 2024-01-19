<?php session_start(); ?>
<?php require 'head.php' ?>
<?php require 'db_connect.php'; ?>

<body>

    <div class="title">
        <h2>楽曲登録</h2>
    </div>
    <center>
        <div class="touroku">
            <!-- 作曲者 -->
            <form action="sa_toroku_kanryo.php" method="post">
                作曲者名
                <input type="text" name=name class="" required><br>

                チャンネルリンク
                <input type="text" name=musician_link class=""required>


                <div class="sa_torokubu">
                    <button type="submit">登録</button>
                </div>
            </form>
            <form action="toroku.php" method="post">
                <button>戻る</button>
            </form>
        </div>
    </center>
</body>

</html>