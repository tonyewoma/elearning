<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
$connect = mysql_connect("localhost", "root", "");
							if (!$connect){
							    die("Unable to connect ".mysql_error());
							}
							$database = mysql_SELECT_db("dbtest", $connect);
							if (!$database){
							    die("SELECT db ".mysql_error());
							}
 ?>