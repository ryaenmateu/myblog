<?php 
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername=$url["localhost"];
$username=$url["root"];
$dbname=substr($url["blog_project"],1);
$password=$url[""];?>