<?php

class Blog extends Controller {

    function Blog()
    {

        parent::Controller();
        
        // This could be handled by autoload!
        $this->load->library('Repose');
        
    }
    
    function index() {
        $session = $this->repose->session();
        $data = array(
            'posts' => $session->find('demo_Post')->all(),
        );
        $this->load->view('blog/index', $data);
    }
    
    function post_create() {
        $session = $this->repose->session();
        $this->repose->loadClass('demo_Post');
        $post = new demo_Post(
            $this->input->post('title'),
            $this->input->post('body')
        );        
        $post = $session->add($post);
        $session->flush();
        redirect('blog/post/' . $post->postId);
    }
    
    function post($postId) {
        $session = $this->repose->session();
        $data = array(
            'post' => $session->find('demo_Post')->filterBy('postId', $postId)->one(),
        );
        $this->load->view('blog/post', $data);
    }

    function post_delete($postId) {
        $session = $this->repose->session();
        $post = $session->find('demo_Post')->filterBy('postId', $postId)->one();
        $session->delete($post);
        $session->flush();
        redirect('blog');
    }

    function comment_create($postId) {
        $session = $this->repose->session();
        $this->repose->loadClass('demo_Comment');
        $post = $session->find('demo_Post')->filterBy('postId', $postId)->one();
        $comment = new demo_Comment(
            $post,
            $this->input->post('name'),
            $this->input->post('body')
        );
        $session->add($comment);
        $session->flush();
        redirect('blog/post/' . $post->postId);
    }

    function comment_delete($postId, $commentId) {
        $session = $this->repose->session();
        $comment = $session->find('demo_Comment')->filterBy('commentId', $commentId)->one();
        $session->delete($comment);
        $session->flush();
        redirect('blog/post/' . $postId);
    }

    
}

/* End of file blog.php */
/* Location: ./system/application/controllers/blog.php */