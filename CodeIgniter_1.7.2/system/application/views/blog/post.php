<html>
<head><title><?php echo $blog->name; ?> &raquo; Post &raquo; <?php echo $post->title; ?></title>
</head>
<body>
<ul>
<li><a href="<?php echo site_url('blog/blog_posts/' . $blog->blogId); ?>">&laquo; <?php echo $blog->name ?> blog</a></li>
</ul>
<hr />
<h1><?php echo $post->title; ?></h1>
<div>
<?php echo $post->body; ?>
</div>

<form method="post" action="<?php echo site_url('blog/post_delete/' . $blog->blogId . '/' . $post->postId); ?>">
<input type="submit" value="Delete" />
</form>

<h2>Other posts in this blog</h2>
<ul>
<?php foreach ( $blog->posts as $post ) { ?>
<li><a href="<?php echo site_url('blog/blog_post/' . $blog->blogId . "/" . $post->postId); ?>"><?php echo $post->title ?></a></li>
<?php } ?>
</ul>

</body>
</html>