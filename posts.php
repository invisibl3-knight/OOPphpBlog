<?php
include 'inc/header.php';
?>

<?php
	
	if(!isset($_GET['category']) || $_GET['category'] == NULL ){
		header("Location: 404.php");
	} else {
		$id = $_GET['category'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		
<?php
	$query = "SELECT * FROM tbl_post WHERE cat=$id ";
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
		} } else{
		header("Location: 404.php");
	}
?>
	
		</div>
<?php
include 'inc/sidebar.php';
include 'inc/footer.php';
?>