<!DOCTYPE html>
<body>
	<div class="mt text-center">
		<a class="btn btn-light" href="Articles.php">Back to articles</a>
	</div>
	<?php 
	// we get the selected article by using $data to collect the result of the function GetArticles
	while ($data=$req->fetch()){
		?>
		<div class="container text-center article">
			<img  id="pic-article" class="f-w" src="pics/<?= htmlspecialchars($data['pic'])?>">
			<h2 id="article-title"><?= htmlspecialchars($data['title'])?></h2>
			<p id="content-article"><?= htmlspecialchars($data['content'])?></p>
			<hr>
			<p id="commentary_one">Sent on: <?= htmlspecialchars($data['creation_date'])?></p>
		</div>
		<?php
	}
	$req->closeCursor();
	?>
	<div class="comments-section">
		<h3 id="commentaries-title" class="text-center">Comments</h3>
		<?php
		//We get all the comments associated to this comment thanks to the function GetArticle ($req2 is the return of the function and we fetch on it to get ur datas)
		while ($data2=$req2->fetch()){
			?>	
			<div class="container commentary border-classic">
				<div>
					<p class="pt"><?= htmlspecialchars($data2['comment'])?></p>
				</div>
				<div class="row">
					<p class="blockquote-footer"><?= htmlspecialchars($data2['author'])?></p>
					<p class="pl"><?= htmlspecialchars($data2['comment_date'])?></p>
				</div>
			</div>
			<?php
		}
		$req2->closeCursor();
		?>
		<div class ="container">
			<!--Getting the new comment from the textarea comment and getting the id for the associated article for the $_GET['id'] -->
			<form action='Commentaries.php?id=<?= $_GET['id'] ?>' method="post">
				<div class="form-group text-center">
					<textarea class="mt form-control" rows="4" name="comment"  placeholder="Enter your comment" required></textarea>
					<input type="submit" id="send-com" class="btn btn-dark"value="Send"/>
				</div>
			</form>
		</div>
		<a id="anchor-link" href="#top"><img  id="anchor-comment" src="pics/arrow_bg.png"></a>
	</div>
</body>
</html>