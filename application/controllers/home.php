<?php

class Home_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public function nav($pagename){

	$links=array('home','about','developer','admin','chadmin','rant');
	$props=array('url','name','active');
	$active=false;

	$sidenav=array();

		foreach ($links as $item) {

			$url=strtolower($item);
			$name=ucwords($url);

			if($item == $pagename){
				$active=true;
			}
			else $active=false;


			array_push($sidenav,
				array(
	                'url' => $url,
	                'name' => $name,
	                'active' => $active
	            )
	         );
		}

		return array('sidenav' => $sidenav);
		//var_dump($sidenav);

		
			// $myarray= array();
			
			 // $myarray);


		// $sidenav= array('sidenav' => array(
	 //            array(
	 //                'url' => 'home',
	 //                'name' => 'Home',
	 //                'active' => false
	 //            ),
	 //            array(
	 //                'url' => 'about',
	 //                'name' => 'About',
	 //                'active' => true
	 //            ),
	 //            array(
	 //                'url' => 'admin',
	 //                'name' => 'Admin',
	 //                'active' => false
	 //            )
  //       	)
		// );
	}

	public function action_index()
	{
		return View::make('home.index');
	}

    public function action_about()
	{

// $var_dump($sidenav);
		$sidenav=$this->nav('about');
 	    return View::make('home.about', $sidenav);
	    
	}

	public function action_developer(){
		$sidenav=$this->nav('developer');
		return View::make('home.developer', $sidenav );
	}

	public function action_rant(){
		$sidenav=$this->nav('rant');
		return View::make('home.rant', $sidenav );
	}

}