<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>
    UwU Site - Example Blog
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
    <?php
      $articlesPath = "/templates/blog/articles/";
      $dirlist = scandir($_SERVER['DOCUMENT_ROOT'].$articlesPath, 1);
      foreach ($dirlist as $post){
        if (!strcmp($post, ".") || !strcmp($post, "..")){}
        else {
          $postPath = $articlesPath.$post.'/';
          include($_SERVER['DOCUMENT_ROOT'].$postPath."/post_info.php");
          print "    <div id=\"post\">";
          print "      <div id=\"titleContainer\">";
          print "        <a href=\"".$postPath."\">";
          print "        <div class=\"title\">".$title."</div>";
          print "        </a>";
          print "      <div class=\"timestamp\">".$timestamp."</div>";
          print "      </div>";
          print "    </div>";
        }
      }
    ?>
    </div>
    </div>
  </body>
</html>
