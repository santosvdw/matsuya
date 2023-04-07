<?php
// echo $_SERVER['DOCUMENT_ROOT'] . 'storage';
// echo $_SERVER;
$targetFolder = str_replace("/public_html", "", $_SERVER['DOCUMENT_ROOT']) . 'matsuya/storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'] . 'storage';
// echo $targetFolder;
symlink($targetFolder, $linkFolder);
