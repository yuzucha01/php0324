<?php
session_start();

include("funcs.php");
loginCheck();

require_once "./dbc.php";
$files = getAllFile();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECIPE CHAT</title>
    <link rel="stylesheet" href="css/chat.css">
</head>
<body>
    <header class="leftNavigation">
        <h1>RECIPE CHAT</h1>
        <!-- 複数のものを送る -->
        <form enctype="multipart/form-data" action="chat_upload.php" method="POST">
            <div class="file-up">                <!-- valueは1MBのサイズの数字 -->
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <!-- 画像だけ選択するaccept -->
                <input class=file type="file" name="img" accept="image/*">
            </div>
            <div>
                <textarea name="name" class="name" placeholder="料理名" cols="40" rows="2"></textarea>
                <textarea name="zairyo" class="text" placeholder="材料" cols="40" rows="20"></textarea>
                <textarea name="recipe" class="text" placeholder="レシピ" cols="40" rows="20"></textarea>
            </div>
            <div class="submit">
                <input type="submit" value="送信" class="btn">
            </div>
        </form>
        <button class="btn" type=“button” onclick="location.href='./top-page.php'">Homeに戻る</button>
    </header>

    <div class="content-main">

        <form action="search.php" method="post">
            <input type="text" name="search">
            <input type="submit" href="./search.php">
        </form>

        <div class="content">
            <?php foreach($files as $file):?>
                <div class="chat-contents">
                    <img src="<?php echo "{$file['file_path']}"; ?>" alt="">
                    <p><?php echo "{$file['name']}"; ?></p>
                    <p><?php echo "{$file['zairyo']}"; ?></p>
                    <p><?php echo "{$file['recipe']}"; ?></p>
                    <p><?php echo "{$file['insert_time']}"; ?></p>
                </div>
            <?php endforeach; ?>
         </div>

    </div>

</body>
</html>