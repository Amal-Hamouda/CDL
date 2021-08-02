<?php
    
class Stripe extends CI_Controller {
     
 
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('stripe');
    }

}