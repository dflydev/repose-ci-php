<?php

class Blog extends Controller {

    function Blog()
    {

        parent::Controller();
        
        // This could be handled by autoload!
        $this->load->library('Repose');
        
    }
    
    function index()
    {

        $session = $this->repose->session();
        
        $data = array();
        
        // Find all blogs.
        $data['blogs'] = $session->find('demo_Blog')->all();
        
        $this->load->view('blog/index', $data);
        
    }
    
    function blog_create() {
        
        // Ask Repose to ensure that the Blog class is available.
        $this->repose->loadClass('demo_Blog');

        $session = $this->repose->session();

        $blog = new demo_Blog($this->input->post('name'));
        
        $session->add($blog);
        $session->flush();
        
        redirect('blog');
        
    }
    
    function blog_posts($blogId) {

        $session = $this->repose->session();
        
        $data = array();
        
        // Find the blog.
        $data['blog'] = $session->find('demo_Blog')->filterBy('blogId', $blogId)->one();
        
        $this->load->view('blog/posts', $data);
        
        
    }
    
    function blog_post($blogId, $postId) {

        $session = $this->repose->session();
        
        $data = array();
        
        $post = $session->find('demo_Post')->filterBy('postId', $postId)->one();
        
        $data['post'] = $post;
        $data['blog'] = $post->blog;
        
        $this->load->view('blog/post', $data);
        
        
    }
    
    function post_create($blogId) {
        
        // Ask Repose to ensure that the Post class is available.
        $this->repose->loadClass('demo_Post');

        $session = $this->repose->session();
        
        // Find our blog object.
        $blog = $session->find('demo_Blog')->filterBy('blogId', $blogId)->one();

        // Create our post object.
        $post = new demo_Post(
            $blog,
            $this->input->post('title'),
            $this->input->post('body')
        );
        
        $session->add($post);
        $session->flush();
        
        redirect('blog/blog_posts/' . $blogId);
        
    }
    
    function post_delete($blogId, $postId) {
        $session = $this->repose->session();
        $post = $session->find('demo_Post')->filterBy('postId', $postId)->one();
        $session->delete($post);
        $session->flush();
        redirect('blog/blog_posts/' . $blogId);
    }

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */