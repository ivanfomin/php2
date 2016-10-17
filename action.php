<?php

require_once __DIR__ . '/autoload.php';


$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

if (isset($_POST['update'])) {

    $article = \App\Model\Article::findById($id);

    $article->title = $title;
    $article->content = $content;
    $article->save();

} else if (isset($_POST['delete'])) {
    $article = \App\Model\Article::findById($id);

    $article->delete();

} else if (isset($_POST['insert'])) {
    $article = new \App\Model\Article();
    $article->title = $title;
    $article->content = $content;
    $article->save();
}

header('Location: /index.php');


