<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <style>
        div {
            width: 800px;
            border: 2px solid grey;
            margin: 50px auto 0;
            padding: 0 15px;
            font-family: Verdana, sans-serif;
            background-color: #d8e9f1;
        }
    </style>
</head>
<body>
<?php foreach ($articles as $article) { ?>
    <div class="wrapper">
        <form method="post" action="../action.php">
            <input type="text" name="id" value="<?php echo $article->id; ?>" style="width: 5%">
            <input type="text" name="title" value="<?php echo $article->title; ?>">
            <input type="text" name="content" value="<?php echo $article->content; ?>" style="width: 50%">
            <input type="submit" name="update" value="Изменить">
            <input type="submit" name="delete" value="Удалить">
        </form>
    </div>
<?php } ?>

<div class="wrapper">
    <form method="post" action="../action.php">
        <input type="text" name="title">
        <input type="text" name="content" style="width: 50%">
        <input type="submit" name="insert" value="Сохранить">
    </form>
</div>

</body>
</html>