<?php

require_once 'helpers.php';

$config = require 'config.php';

$connect = dbConnect($config['db']);

$getContentTypeId = $_GET['id'] ?? '';

$posts = getPosts($connect, (int) $getContentTypeId);

$contentType = getContentType($connect);

$is_auth = rand(0, 1);

$user_name = 'Dima'; // укажите здесь ваше имя

$title = 'readme';

$mainContent = include_template('main.php', ['posts' => $posts, 'contentType' => $contentType, 'getId' =>$getContentTypeId]);

$layoutContent = include_template('layout.php', ['mainContent' => $mainContent, 'title' => $title, 'is_auth' => $is_auth, 'user_name' => $user_name]);

print $layoutContent;
