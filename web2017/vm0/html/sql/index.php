<img src="https://azure.microsoft.com/svghandler/sql-database/?width=600&height=315">
<br>
<?php

if (!isset($_GET["sql"]))
    die(highlight_file(__FILE__, true));


/* What I did to create a database
$ sqlite3 /sql
Enter ".help" for usage hints.
sqlite> create table a_table (name text);  
sqlite> insert into a_table values ('bob'); 
sqlite> update a_table set name = '????????' where name = 'bob';
sqlite> .exit
*/

$db = new SQLite3("/sql");
$sql = $_GET["sql"];
$result = $db->querySingle($sql, true);

var_dump($result);