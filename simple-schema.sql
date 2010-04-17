CREATE TABLE post (
  postId bigint(20) unsigned NOT NULL auto_increment,
  title varchar(255),
  body text,
  primary key (postId)
);

CREATE TABLE comment (
  commentId bigint(20) unsigned NOT NULL auto_increment,
  postId bigint(20) unsigned NOT NULL,
  name varchar(255),
  body text,
  primary key (commentId)
);