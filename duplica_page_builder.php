<?php

include('wp-config.php');

mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
mysql_select_db(DB_NAME);
if(isset($_GET['id']) && !empty($_GET['id']))
	$id = $_GET['id'];
else
	$id = 3377;

if(isset($_GET['id_new']) && !empty($_GET['id_new']))
	$id_new = $_GET['id_new'];
else
	$id_new = 3498;

mysql_query("DELETE FROM `wp_postmeta` WHERE post_id = $id_new");

$query = "SELECT *  FROM `wp_postmeta` WHERE post_id = $id";
$q = mysql_query($query);

while($r = mysql_fetch_assoc($q))
{
	mysql_query("INSERT INTO `wp_postmeta` (post_id, meta_key, meta_value) VALUES ($id_new,'".$r['meta_key']."','".$r['meta_value']."')");
}


?>