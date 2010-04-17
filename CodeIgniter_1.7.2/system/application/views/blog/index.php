<html>
<head><title>Posts</title>
</head>
<body>
<?php if ( $posts ) { ?>
<h1>Posts</h1>
<ul>
<?php foreach ( $posts as $post ) { ?>
<li><a href="<?php echo site_url('blog/post/' . $post->postId); ?>"><?php echo $post->title; ?></a></li>
<?php } ?>
</ul>
<hr />
<?php } ?>

<form method="post" action="<?php echo site_url('blog/post_create'); ?>">
<fieldset>
<legend>Create a new post?</legend>
<ol>
<li>
<label for="name">Title</label><input type="text" name="title" />
</li>
<li>
<label for="body">Body</label><textarea name="body"></textarea>
</li>
<li class="buttons">
<input type="submit" value="Create" />
</li>
</ol>
</fieldset>
</form>

</body>
</html>