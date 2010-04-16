<?php
class demo_Category {
    public $categoryId;
    public $name;
    public $blog;
    public $posts = array();
    public function __construct($blog, $name) {
        $this->blog = $blog;
        $this->name = $name;
    }
}
?>