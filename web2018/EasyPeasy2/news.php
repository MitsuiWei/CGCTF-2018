html style="box-shadow:inset 0 0 5rem rgba(0,0,0,.5)">
<head>
<title>Ease Peasy SQL challenge2</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<meta charset="utf-8">
</head>

<body style="background-color:#333">
<br>
<div class="container">
<div class="jumbotron">
<?php

$dbuser = 'root';
$dbpass = '';
$host = 'localhost';

$conn = mysql_connect($host, $dbuser, $dbpass) or die('connection failed');
mysql_query("SET NAMES utf-8");
mysql_select_db("news");

$agent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($agent, 'sqlmap') !== FALSE || strpos($agent, 'havij') !== FALSE)  {
        echo "<h1 class=\"display-3\"> Don't use SQLMAP or any tool! </h1>";
} else {
        $id = $_GET['id'];

        $result = mysql_query("SELECT * FROM info WHERE id=".$id) or die("<div class=\"alert alert-danger\" role=\"alert\">Query failed! QAQ</div>");
        $res = mysql_fetch_array($result);
        if($res === false) {
                echo "<p>The id doesn't exist.</p>";
        } else {
                echo "<p>exist</p>";
        }
}
?>
<br/>
<br/>
<img src="./cat.jpg" style="border-radius:5px">
</div>
        <p style="color: #c7c7c7">©kaibro.tw 2017</p>
</div>
</body>
</html>
