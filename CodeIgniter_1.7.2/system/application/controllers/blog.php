<?php

class Blog extends Controller {

    function Blog()
    {

        parent::Controller();
        
        // This could be handled by autoload!
        $this->load->library('Repose');
        
    }
    
    function reposeSession() {
        return $this->repose->session();
    }

}

/* End of file blog.php */
/* Location: ./system/application/controllers/blog.php */