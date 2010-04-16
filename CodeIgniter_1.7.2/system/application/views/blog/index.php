<html>
<head><title>Blogs</title>
</head>
<body>
<?php if ( $blogs ) { ?>
<h1>Blogs</h1>
<ul>
<?php foreach ( $blogs as $blog ) { ?>
<li><a href="<?php echo site_url('blog/blog_posts/' . $blog->blogId); ?>"><?php echo $blog->name ?></a></li>
<?php } ?>
</ul>
<hr />
<?php } ?>
<form method="post" action="<?php echo site_url('blog/blog_create'); ?>">
<fieldset>
<legend>Create a new blog?</legend>
<ol>
<li>
<label for="name">Name</label><input type="text" name="name" />
</li>
<li class="buttons">
<input type="submit" value="Create" />
</li>
</ol>
</fieldset>
</form>
</body>
</html>