<!DOCTYPE html>
<html>
<head>
<title>
  <?=$title?>
</title>
<meta name="author" content="Author Name Goes Here" />
<meta name="design" content="Sadhana Ganapathiraju" />
<meta name="copyright" content="Copyright Goes Here" />
<meta name="description" content="Description Goes Here" />
<meta name="keywords" content="And, Finally, Keywords Go Here." />
<link rel="stylesheet" type="text/css" media="screen" href="screen.css" />
<!--[if lt ie 7]><link rel="stylesheet" type="text/css" media="screen" href="ie-win.css" /><![endif]-->
</head>
<body id="babout">
<div id="header">
  <h1>
    <?=$title?>
  </h1>
</div>
<div id="navigation">
  <ul>
    <?php
      foreach($navbar as $name => $url) {
        echo "<li id=\"l$name\"><a href=\"$url\">$name</a></li>";
      }
    ?>
  </ul>
</div>
<div id="wrapper">