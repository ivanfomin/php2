<?php

require_once __DIR__ . '/autoload.php';

$articles = \App\Model\Article::findAll();

include __DIR__ . '/templates/admin.php';