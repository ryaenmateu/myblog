<?php session_start();?>
<?php
require("connect.php");

function  dd($value) //to be deleted
{
  echo"<pre>".print_r($value,true)."</pre>";
  die();
}
 function executeQuery($sql,$data){
    global $conn;
    $stmnt=$conn->prepare($sql);
    $values=array_values($data);
    $types=str_repeat('s',count($values));
    $stmnt->bind_param($types,...$values);
    $stmnt->execute();
    return $stmnt;
  
  
    
 }


function selectAll($table ,$condition=[])
{
  global $conn;
  $sql="SELECT * FROM $table";
  if(empty($condition))
  {

$stmnt=$conn->prepare($sql);
$stmnt->execute();
$records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
  }
  else{
    //return records from the matching conditions
   // $sql="SELECT* FROM $table WHERE username='ryaen mateu' AND admin= 1 ORDER BY created_at DESC"";
    $one=0;
     foreach( $condition as $key=>$value)
     {
       if($one==0){
       $sql=$sql." WHERE $key= ?";
       }
       else{
        $sql=$sql." AND $key= ?";
       }
       $one++;
     }
    
     $stmnt= executeQuery($sql,$condition);
     $records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
     return $records;
  }

}
function selectOne($table ,$condition)
{
  global $conn;
  $sql="SELECT * FROM $table";
      $one=0;
     foreach( $condition as $key=>$value)
     {
       if($one==0){
       $sql=$sql." WHERE $key= ?";
       }
       else{
        $sql=$sql." AND $key= ?";
       }
       $one++;
     }
     $sql=$sql." LIMIT 1";
     $stmnt= executeQuery($sql,$condition);
     $records = $stmnt->get_result()->fetch_assoc();
     return $records;
  }
  //pagination query
  function selectPostsWithLimit($table)
  {
    if(isset($_GET['page_no']) && $_GET['page_no']!="")
     {
       $page_no=$_GET['page_no'];
     }
  else
    {
     $page_no=1;
    }
    $total_records_per_page=3;
    $offset=($page_no-1)*$total_records_per_page;

    global $conn;
    $sql="SELECT * from $table LIMIT $offset,$total_records_per_page";
    $stmnt=$conn->prepare($sql);
    $stmnt->execute();
    $records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
      return $records;
    }

  function create($table ,$data)
{
  global $conn;
  //$sql ="INSERT INTO $table SET username=?,admin=?,email=?,password=?";
  $sql="INSERT INTO $table SET ";
      $one=0;
     foreach( $data as $key=>$value)
     {
       if($one==0){
       $sql=$sql." $key= ?";
       }
       else{
        $sql=$sql." ,$key=?";
       }
       $one++;
     }
 
     $stmnt= executeQuery($sql,$data);
    $id = $stmnt->insert_id;
     return $id;
  }
 
  function update($table,$id,$data)
{
  global $conn;
  //$sql ="UPDATE $table SET username=?,admin=?,email=?,password=? WHERE id=?"
  $sql="UPDATE $table SET "; 
      $one=0;
     foreach( $data as $key=>$value)
     {
       if($one==0){
       $sql=$sql." $key= ?";
       }
       else{
        $sql=$sql." ,$key=?";
       }
       $one++;
     }
     $sql=$sql." WHERE id=?";
    $data['id']=$id;
     $stmnt= executeQuery($sql,$data);
    $id = $stmnt->insert_id;
     return $stmnt->affected_rows;
  }

  function delete($table,$id)
  {
    global $conn;
    $sql ="DELETE FROM $table WHERE id=?";

    
      $data['id']=$id;
       $stmnt= executeQuery($sql,['id'=>$id]);
      $id = $stmnt->insert_id;
       return $stmnt->affected_rows;
    }
  
  function getPublishedPosts()
  {
    global $conn;
    //SELECT*FROM posts where....
    $sql="SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? ORDER BY created_at DESC  ";
    $stmnt= executeQuery($sql,['published'=>1]);
    $records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }
  /* function getAllPosts()
  {
    global $conn;
    //SELECT*FROM posts where....
    $sql="SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? ORDER BY created_at DESC  ";
    $stmnt= executeQuery($sql,['published'=>1]);
    $records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }*/

  function getPostsByTopicId($topic_id)
  {
    global $conn;
    //SELECT*FROM posts where....
    $sql="SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=? ORDER BY created_at DESC";
    $stmnt= executeQuery($sql,['published'=>1,'topic_id'=>$topic_id]);
    $records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }
  
  function SearchPosts($term)
  {
    $match='%'.$term.'%';
    global $conn;
    //SELECT*FROM posts where....
    $sql="SELECT
       p.*, u.username 
       FROM posts AS p 
       JOIN users AS u 
       ON p.user_id=u.id 
       WHERE p.published=?
       AND P.title LIKE? OR p.body LIKE? ";
    $stmnt= executeQuery($sql,['published'=>1,'title'=>$match,'body'=>$match]);
    $records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }
 function SearchAllPosts($term)
  {
    $match='%'.$term.'%';
    global $conn;
    //SELECT*FROM posts where....
    $sql="SELECT
       p.*, u.username 
       FROM posts AS p 
       JOIN users AS u 
       ON p.user_id=u.id 
       WHERE P.title LIKE? OR p.body LIKE? ";
    $stmnt= executeQuery($sql,['title'=>$match,'body'=>$match]);
    $records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }

  function SearchUserName($term)
  {
    $match='%'.$term.'%';
    global $conn;
    //SELECT*FROM posts where....
    $sql="SELECT*
       FROM users
       WHERE username LIKE? AND email LIKE? ";
    $stmnt= executeQuery($sql,['username'=>$match,'email'=>$match]);
    $records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }
// trying to output comments by post id
  function getcommentsByPostsId($post_id)
  {
    global $conn;
    //SELECT*FROM posts where....
    $sql="SELECT c.*, u.username FROM comments AS c JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND posts_id=?";
    $stmnt= executeQuery($sql,['published'=>1,'posts_id'=>$post_id]);
    $records = $stmnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }
  

 



  function selectingPages($table)
  {
    global$conn;
    $sql="SELECT * from '$table' LIMIT $offset,$total_records_per_page";
     $stmnt= executeQuery($sql,$condition);
     $records = $stmnt->get_result()->fetch_assoc();
     return $records;

  }


  function total_views($conn, $page_id = null)
{
	if($page_id === null)
	{
		// count total website views
		$query = "SELECT sum(total_views) as total_views FROM pages";
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result) > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if($row['total_views'] === null)
				{
					return 0;
				}
				else
				{
					return $row['total_views'];
				}
			}
		}
		else
		{
			return "No records found!";
		}
	}
	else
	{
		// count specific page views
		$query = "SELECT total_views FROM pages WHERE posts_id='$page_id'";
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result) > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if($row['total_views'] === null)
				{
					return 0;
				}
				else
				{
					return $row['total_views'];
				}
			}
		}
		else
		{
			return "No records found!";
		}
	}
}



function is_unique_view($conn, $visitor_ip, $page_id)
{
	$query = "SELECT * FROM page_views WHERE visitor_ip='$visitor_ip' AND page_id='$page_id'";
	$result = mysqli_query($conn, $query);
	
	if(mysqli_num_rows($result) > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}



function add_view($conn, $visitor_ip, $page_id)
{
	if(is_unique_view($conn, $visitor_ip, $page_id) === true)
	{
		// insert unique visitor record for checking whether the visit is unique or not in future.
		$query = "INSERT INTO page_views (visitor_ip, page_id) VALUES ('$visitor_ip', '$page_id')";
		
		if(mysqli_query($conn, $query))
		{
			// At this point unique visitor record is created successfully. Now update total_views of specific page.
			$query = "UPDATE pages SET total_views = total_views + 1 WHERE posts_id='$page_id'";
			
			if(!mysqli_query($conn, $query))
			{
				echo "Error updating record: " . mysqli_error($conn);
			}
		}
		else
		{
			echo "Error inserting record: " . mysqli_error($conn);
		}
	}
}
/*$data =[
  'username'=>"David",
  'admin'=>1,
  'email'=>"ryaenmateu.com",
  'password'=>"qazxsw"
];*/
 
//$id= delete('users',4); dump what what
//dd($id);
?>