<?php
include 'inc/header.php';
include 'inc/slider.php';
?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		
<!-- 	Pagination 	-->
<?php 
$per_page = 3;

if(isset($_GET["page"])){
	$page = $_GET["page"];
}else{
	$page = 1;
}

$start_from = ($page-1)*$per_page;

?>	
		
<!-- 	Pagination 	-->
		
<?php
	$query = "SELECT * FROM tbl_post limit $start_from,$per_page ";
	$post  = $db->select($query);
			
	if($post){
		while($read = $post->fetch_assoc()){
?>
		
		
<div class="samepost clear">
	<h2><a href="post.php?id= <?php echo $read['id']; ?> "> <?php echo $read['title'];?>  </a></h2>
	<h4> <?php echo $fm->formatDate($read['date']); ?> <a href="#"> <?php echo $read['author']; ?> </a></h4>
	<a href="#"><img src="admin/upload/<?php echo $read['image']; ?>" alt="post image"/></a>
	
	<p> <?php echo $fm->textShorten($read['body']); ?> </p>
	
	<div class="readmore clear">
		<a href="post.php?id= <?php echo $read['id']; ?> ">Read More</a>
	</div>
</div>

			
<?php
		}    //end of while loop.
?>

<!-- 	Pagination starts 	-->
<?php 
$query = "SELECT * FROM tbl_post";
$result = $db->select($query);
$total_rows = mysqli_num_rows($result);
$total_pages = ceil($total_rows/$per_page);

echo "<span class = 'pagination'><a href = 'index.php?page=1'>".'First Page'."</a>"; 

for($i=1;$i<=$total_pages;$i++){
	echo "<a href = 'index.php?page=".$i."'>".$i."</a> ";
}

echo "<a href = 'index.php?page=$total_pages'>".'Last Page'."</a></span>"; 
?>

<!-- 	Pagination ends 	-->

<?php
	}else{
		header("Location: 404.php");
	}
?>	
			
		</div>
	
	
	
<?php
include 'inc/sidebar.php';
include 'inc/footer.php';
?>