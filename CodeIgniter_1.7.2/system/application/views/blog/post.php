<html>
<head><title>Post &raquo; <?php echo $post->title; ?></title>
</head>
<body>
<ul>
<li><a href="<?php echo site_url('blog'); ?>">&laquo; blog posts</a></li>
</ul>
<hr />
<h1><?php echo $post->title; ?></h1>
<div>
<?php echo $post->body; ?>
</div>

<form method="post" action="<?php echo site_url('blog/post_delete/' . $post->postId); ?>">
<input type="submit" value="Delete" />
</form>



<h2>Comments</h2>
<?php if ( count($post->comments) ) { ?>
<ul>
<?php foreach ( $post->comments as $comment ) { ?>
<li>
<form method="post" action="<?php echo site_url('blog/comment_delete/' . $post->postId . '/' . $comment->commentId); ?>">
<input type="submit" value="Delete" />
</form>
    <ul>
    <li><?php echo $comment->name; ?></li>
    <li><div><?php echo $comment->body; ?></div></li>
    </ul>
</li>
<?php } ?>
</ul>
<?php } ?>

<form method="post" action="<?php echo site_url('blog/comment_create/' . $post->postId); ?>">
<fieldset>
<legend>Comment?</legend>
<ol>
<li> 
<label for="name">Your name</label><input type="text" name="name" />
</li>
<li>
<label for="body">Your comment</label><textarea name="body"></textarea>
</li>
<li class="buttons">
<input type="submit" value="Create" />
</li>
</ol>
</fieldset>
</form>


</body>
</html>