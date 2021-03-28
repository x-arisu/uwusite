<?php 

  include($_SERVER['DOCUMENT_ROOT'].parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)."post_info.php");
?>
<?php 
/* RSS STUFF */
if (array_key_exists('rss', $_GET)){
  header('Content-Type: text/xml');
  include $_SERVER['DOCUMENT_ROOT'].'/config/rss.php';
  echo '<?xml version="1.0" encoding="UTF-8"?>';
  echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
  echo '<channel>';
  echo "<title>$pageTitle</title>";
  echo "<description>$description</description>";
  echo "<link>$domain</link>";
  echo "<generator>UwUSite RSS Generator</generator>";
  echo "<atom:link href=\"$domain".$_SERVER['REQUEST_URI']."\" rel=\"self\" type=\"application/rss+xml\" />";
  $articlesPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)."articles/";
  $dirlist = scandir($_SERVER['DOCUMENT_ROOT'].$articlesPath, 1);
  foreach ($dirlist as $post){
    if (!strcmp($post, ".") || !strcmp($post, "..")){}
    else {
      $postPath = $articlesPath.$post.'/';
      include($_SERVER['DOCUMENT_ROOT'].$postPath."/post_info.php");
      echo "<item>";
      echo "<title>".htmlentities($title)."</title>";
      echo "<link>$domain$postPath</link>";
      echo "<pubDate>$timestamp</pubDate>";
      echo "<description>".htmlentities($description)."</description>";
      echo "</item>";
    }
  }
  echo "</channel></rss>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="twitter:card" content="summary" />
    <meta property="og:title" content="<?php echo $pageTitle;?>" />
    <meta property="og:description" content="<?php echo $description;?>" />
    <meta property="og:image" content="<?php echo $img;?>" />
    <title>
    <?php echo $pageTitle;?>
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
      $dir = new DirectoryIterator($_SERVER['DOCUMENT_ROOT'].parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
      foreach ($dir as $fileinfo) {
      if (!$fileinfo->isDot()) {
        if(1 === preg_match('~[0-9]~', $fileinfo->getFilename()) && str_split($fileinfo->getFilename())[3] === '_'){
          include($fileinfo->getFilename());
        }
      }
      }
    ?>
    <?php
      $articlesPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)."articles/";
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
