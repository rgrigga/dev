<?php
class Login_Controller extends Base_Controller
{   
    
    public function __construct() {
    	$this->filter('before', 'auth');
	}


/*
This will call the auth filter on all actions in this controller. If we wanted to target some specific actions, we can refer to the only method, like so:
	
public function __construct() {
    $this->filter('before', 'filter_name')->only(array('action', 'actionagain'));
}
*/

    public function action_index()
    {
        //do our login mechanisms here
         echo 'test'; //echo test so we can test this controller out
    }
}