<?php

namespace App\Model;

use App\Model;

class Article
    extends Model
{

    public static $table = 'news';

    public $title;
    public $content;

}