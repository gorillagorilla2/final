<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/music.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
            $('.slider').bxSlider({
                auto: true,
                pause: 3000,
            });
        });
</script>
    <title>楽曲登録サイト</title>

    <script>
        function validateInput() {
            var textBoxValue = document.getElementById('myTextBox').value;

            // 必須の部分文字列
            var requiredSubstring = 'abc';

            // 必須の部分文字列が最初に現れる位置を取得
            var index = textBoxValue.indexOf(requiredSubstring);

            if (index === 0) {
                // 必須の部分文字列が最初に現れる場合
                return true;
            } else {
                // 必須の部分文字列が最初に現れない場合
                alert('テキストボックスの先頭に ' + requiredSubstring + ' を含めてください。');
                return false;
            }
        }
    </script>
    <!-- これを使う際には引き継いだ方に/headを使うこと -->