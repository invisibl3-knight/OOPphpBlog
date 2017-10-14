<?php
include 'inc/header.php';
?>

<?php
	
	if(!isset($_GET['search']) || $_GET['search'] == NULL ){
		header("Location: 404.php");
	} else {
		$search = $_GET['search'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		
<?php
	$query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
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
?>
	<p>Your Search Query Not Found !!.</p>
<?php
		}
?>
	
		</div>
<?php
include 'inc/sidebar.php';
include 'inc/footer.php';
?>