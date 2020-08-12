

<?php


$page_no="";
if(isset($_GET['page_no']) && $_GET['page_no']!="")
{
  $page_no=$_GET['page_no'];
}else{
  $page_no=1;
}
//calculateoffset value
$total_records_per_page=3;
$offset=($page_no-1)*$total_records_per_page;
$previous_page=$page_no - 1;
$next_page=$page_no + 1;
$adjascents='2';
//getting total pages
/*$result_count="SELECT COUNT(*) As total_records from 'posts'";
$result_query=mysqli_query($conn,$result_count);
$total_records=mysqli_fetch_array($result_query);*/
$posts=selectAll('posts');
$total_records=count($posts);
//$total_records=$total_records['total_records'];
$total_no_of_pages=ceil($total_records/$total_records_per_page);
$second_last=$total_no_of_pages-1;
/*fetching limited number of records using our offset*/












?>


