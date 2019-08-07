<ul>
<?php
$ignore = [".","..","index.php"];

$scandir = scandir(dirname(__FILE__));
//print_r($scandir);

foreach ($scandir as $file) {
  if(!in_array($file, $ignore)) {
    printf("<li><a href='%s'>%s</a></li>".PHP_EOL,$file,$file);
  }
}

?>
</ul>
