<?php include("post_info.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>
    <?php echo $title; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="/files/style.css">
    <link rel="icon" type="image/png" href="/files/favicon.png"> 
  </head>
  <body>
    <div id="container">
    <?php include $_SERVER['DOCUMENT_ROOT'].'/config/banner.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
    <div id="content">
    <?php
      $dir = new DirectoryIterator(dirname(__FILE__));
      foreach ($dir as $fileinfo) {
      if (!$fileinfo->isDot()) {
        if(1 === preg_match('~[0-9]~', $fileinfo->getFilename()) && str_split($fileinfo->getFilename())[3] === '_'){
          include($fileinfo->getFilename());
        }
      }
      }
    ?>
    </div>
    </div>
  </body>
</html>
