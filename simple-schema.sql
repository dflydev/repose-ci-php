CREATE TABLE post (
  postId bigint(20) unsigned NOT NULL auto_increment,
  title varchar(255),
  body text,
  primary key (postId)
);