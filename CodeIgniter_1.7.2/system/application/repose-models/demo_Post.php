<?php
class demo_Post {
    public $postId;
    public $title;
    public $body;
    public $comments;
    public function __construct($title, $body) {
        $this->title = $title;
        $this->body = $body;
    }
}
?>