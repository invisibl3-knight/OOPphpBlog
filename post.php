<?php
include 'inc/header.php';
?>

<?php
	
	if(!isset($_GET['id']) || $_GET['id'] == NULL ){
		header("Location: 404.php");
	} else {
		$id = $_GET['id'];
	}
?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php
			$query = "SELECT * FROM tbl_post WHERE id=$id";
			$post = $db->select($query);
			if($post){
				while($read = $post->fetch_assoc()){
					

		?>
		
		
			<div class="about">
				<h2> <?php echo $read['title'];?> </h2>
				<h4> <?php echo $fm->formatDate($read['date']); ?> by <a href="#"> <?php echo $read['author']; ?> </a></h4>
				<img src="admin/upload/<?php echo $read['image']; ?>" alt="MyImage"/>
				 <?php echo $read['body']; ?> 
				
		
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
			<?php
				$catid = $read['cat'];
				$queryrelated = "SELECT * FROM tbl_post WHERE cat='$catid' ORDER BY rand() limit 6";
				$relatedpost = $db->select($queryrelated);
				if($relatedpost){
					while($rread = $relatedpost->fetch_assoc()){
			?>
					<a href="post.php?id= <?php echo $rread['id']; ?> "><img src="admin/upload/<?php echo $rread['image']; ?>" alt="post image"/></a>
				<?php } } else {
					echo "No Related Post Available !!";
				}?>
			</div>
				
		<?php
			}   // end of 1st while loop.
				}else{
					header("Location: 404.php");
				}
		?>
		</div>

	</div>
<?php
include 'inc/sidebar.php';
include 'inc/footer.php';
?>