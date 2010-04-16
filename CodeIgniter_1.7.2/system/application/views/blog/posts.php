<html>
<head><title><?php echo $blog->name; ?> &raquo; Posts</title>
</head>
<body>
<ul>
<li><a href="<?php echo site_url('blog'); ?>">&laquo; All blogs</a></li>
</ul>
<h1><?php echo $blog->name; ?> blog</h1>
<ul>
<?php foreach ( $blog->posts as $post ) { ?>
<li><a href="<?php echo site_url('blog/blog_post/' . $blog->blogId . "/" . $post->postId); ?>"><?php echo $post->title ?></a></li>
<?php } ?>
</ul>
<hr />
<form method="post" action="<?php echo site_url('blog/post_create/' . $blog->blogId); ?>">
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