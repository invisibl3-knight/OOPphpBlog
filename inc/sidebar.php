<div class="sidebar clear">
	<div class="samesidebar clear">
		<h2>Categories</h2>
			<ul>
			
			<?php
				$query = "SELECT * FROM tbl_category";
				$category  = $db->select($query);					
				if($category){
					while($read = $category->fetch_assoc()){
			?>
				
				<li><a href="posts.php?category=<?php echo $read['id']; ?>"> <?php echo $read['name']; ?> </a></li>				
				<?php } } else {?>
				
				<li>No Category Created!!</li>
				<?php }?>
			</ul>
	</div>
	
	<div class="samesidebar clear">
		<h2>Latest articles</h2>
		
		<?php
			$query = "SELECT * FROM tbl_post limit 5";
			$post = $db->select($query);
			if($post){
				while($read = $post->fetch_assoc()){
		?>
		
			<div class="popular clear">
				<h3><a href="<?php echo $read['id'];?>"><?php echo $read['title'];?></a></h3>
				<a href="<?php echo $read['id'];?>"><img src="admin/upload/<?php echo $read['image']; ?>" alt="post image"/></a>
				<p><?php echo $fm->textShorten($read['body'], 125); ?></p>	
			</div>
			
		<?php
		} } else{
		header("Location: 404.php");
	}
?>
			


	</div>
	
</div>
