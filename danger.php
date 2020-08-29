<?php 
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername=$url["localhost"];
$username=$url["root"];
$dbname=$url["blog_project"];
$password=$url[""];?>