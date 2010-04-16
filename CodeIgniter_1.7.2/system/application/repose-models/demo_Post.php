<?php
class demo_Post {
    public $postId;
    public $title;
    public $body;
    public $blog;
    public $category;
    public function __construct($blog, $title, $body, $category = null) {
        $this->blog = $blog;
        $this->title = $title;
        $this->body = $body;
        $this->category = $category;
    }
}
?>