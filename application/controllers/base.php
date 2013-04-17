<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	
	public function __construct()
	{
	    //Assets
	    Asset::add('jquery', 'js/jquery-1.7.2.min.js');
	    Asset::add('bootstrap-js', 'js/bootstrap.min.js');
	    Asset::add('bootstrap-css', 'css/bootstrap.min.css');
	    Asset::add('bootstrap-css-responsive', 'css/bootstrap-responsive.min.css', 'bootstrap-css');
	    Asset::add('style', 'css/style.css');
	    parent::__construct();
	}
//http://net.tutsplus.com/tutorials/php/building-web-applications-from-scratch-with-laravel/
//
//By doing this, we make it easier to add, remove or update 
//any assets that we need. We put it inside the Base controller's
// __construct() method to add the assets to all our controllers. 
// To take advantage of this within a view, we simply call Assets::styles() 
// for CSS files, and Assets::scripts() for the JS files in any view file. 
// Laravel automatically determines what the asset type is, based on the file 
// extension, and loads it with the appropriate asset group.



	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

    public function logRequest()
    {
        $route = Request::route();
        Log::log('request', "Controller: {$route->controller} / Action: {$route->controller_action} called at ". date('Y-m-d H:i:s'));
    }
}

