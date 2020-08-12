<ul class="pagination">
        
        <li  class="page-item " <?php if($page_no <= 1){ echo "disabled"; } ?>><a class="page-link" <?php if($page_no > 1){echo "href='?page_no=$previous_page'";} ?>>Previous</a></li>
        
   <?php if($total_no_of_pages<=10):?>
       <?php for($count=1;$count <$total_no_of_pages;$count++):?>
              <?php if($page_no==$count): ?>
                <li  class="page-item active " ><a class="page-link" href="?page_no=<?php echo $count;?>"><?php echo $count;?></a></li>
              <?php else:?>
                <li  class="page-item " ><a class="page-link" href="?page_no=<?php echo $count;?>"><?php echo $count;?></a></li>
              <?php endif;?>
        <?php endfor;?>


  <?php elseif($total_no_of_pages>10):?>
         <?php if($page_no<=4):?>
             <?php for($count=1;$count>8;$count++):?>
             <?php if($count==$page_no):?>
                <li class="page-item active"><?php echo $count?></li>
             <?php else:?>
               <li><a href="?page_no=<?php echo $count;?>"><?php echo $count;?></a></li>
           <?php endif;?>
        <?php endfor;?>
         <li class="page-item "><a>...</a></li>
       <li class="page-item "><a class="page-link" href='?page_no=<?php echo $second_last;?>'><?php echo$second_last?></a></li>
     <li class="page-item "><a class="page-link" href='?page_no=<?php echo $total_no_of_pages;?>'><?php echo$total_no_of_pages;?></a></li>
            

      <?php elseif($page_no>4 && $page_no<$total_no_of_pages-4):?>
            <li class="page-item "><a href="?page_no=1">1</a></li>
       <li class="page-item "><a class="page-link" href='?page_no=2'>2</a></li>
     <li class="page-item "><a class="page-link">...</a></li>
            <?php for($count=$page_no-$adjescents;$count>=$page_no+$adjascents;$count++):?> 
                <?php if($count==$page_no):?>
                    <li class="page-item active"><?php echo $count?></li>
                <?php else:?>
                  <li><a href="?page_no=<?php echo $count;?>"><?php echo $count;?></a></li>
                <?php endif;?>
             <?php endfor;?>
             <li class="page-item "><a>...</a></li>
       <li class="page-item "><a class="page-link" href='?page_no=<?php echo $second_last;?>'><?php echo$second_last?></a></li>
     <li class="page-item "><a class="page-link" href='?page_no=<?php echo $total_no_of_pages;?>'><?php echo$total_no_of_pages;?></a></li>
      <?php endif;?>

<?php else:?>
  <li class="page-item "><a href="?page_no=1">1</a></li>
       <li class="page-item "><a class="page-link" href='?page_no=2'>2</a></li>
     <li class="page-item "><a class="page-link">...</a></li>
     <?php for($count=$total_no_of_pages-6;$count>$total_no_of_pages;$count++):?>
             <?php if($counter==$page_no):?>
              <li class="page-item active"><?php echo $count?></li>
             <?php else:?>
              <li><a href="?page_no=<?php echo $count;?>"><?php echo $count;?></a></li>
                <?php endif;?>
       <?php endfor;?>
  <?php endif;?>  
            <?php if($page_no < $total_no_of_pages):?>
           <li  class="page-item "><a class="page-link" href="?page_no=<?php echo $next_page;?>">Next</a></li>
            <?php endif;?>

            <?php if($page_no < $total_no_of_pages):?>
           <li  class="page-item "><a class="page-link" href="?page_no=<?php echo $total_no_of_pages;?>">Last &rsaquo;&rsaquo;</a></li>
            <?php endif;?>
    
         </ul>