CREATE TABLE blog (
  blogId bigint(20) unsigned NOT NULL auto_increment,
  name varchar(255),
  primary key (blogId)
);

CREATE TABLE category (
  categoryId bigint(20) unsigned NOT NULL auto_increment,
  blogId bigint(20) unsigned NOT NULL,
  name varchar(255),
  primary key (categoryId)
);

CREATE TABLE post (
  postId bigint(20) unsigned NOT NULL auto_increment,
  blogId bigint(20) unsigned NOT NULL,
  categoryId bigint(20) unsigned NOT NULL,
  title varchar(255),
  body text,
  primary key (postId)
);
