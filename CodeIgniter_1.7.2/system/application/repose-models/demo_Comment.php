<?php
class demo_Comment {
    public $commentId;
    public $post;
    public $name;
    public $body;
    public function __construct(demo_Post $post, $name, $body) {
        $this->post = $post;
        $this->name = $name;
        $this->body = $body;
    }
}
?>