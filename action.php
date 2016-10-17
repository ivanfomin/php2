<?php

require_once __DIR__ . '/autoload.php';

//var_dump($_POST);

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

$articles = \App\Model\Article::findAll();

if (isset($_POST['update'])) {

    foreach ($articles as $article) {
        if ($id === $article->id) {
            $article->title = $title;
            $article->content = $content;
            $article->save();
        }
    }

} else if (isset($_POST['delete'])) {
    foreach ($articles as $article) {
        if ($id === $article->id) {
            $article->title = $title;
            $article->content = $content;
            $article->delete();
        }
    }
} else if (isset($_POST['insert'])) {
    $article = new \App\Model\Article();
    $article->title = $title;
    $article->content = $content;
    $article->save();
}

header('Location: /index.php');


