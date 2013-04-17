<?php

class Register_Controller extends Base_Controller
{
    public $restful = true;
     
    public function get_index()
    {
        return View::make('register.index');
    }
     
    public function post_index()
    {


    	$rules = array(
		    'email' => 'required|email|unique:users',
		    'password' => 'confirmed'
		);
		 
		$messages = array(
		    'email_required' => 'Please provide an email address',
		    'email_email' => 'Please provide a valid email address',
		    'email_unique' => 'The email address you provided is already being used',
		    'password_confirmed' => 'Your password confirmation did not match your password.'
		);
		$validation = Validator::make(Input::get(), $rules, $messages);


/*
        $rules = array(
            'email' => 'required|email|unique:users',
            'password' => 'confirmed'
        );
         
        $validation = Validator::make(Input::get(), $rules);
         */
        if( $validation->fails() ) {
            //Send the $validation object to the redirected page
            return Redirect::to('register')->with_errors($validation);
        }
    }
}