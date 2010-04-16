<?php
class demo_Blog {
    public $blogId;
    public $name;
    public $categories;
    public $posts;
    public function __construct($name) {
        $this->name = $name;
    }
}
?>