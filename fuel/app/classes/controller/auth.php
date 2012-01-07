<?php

/**
 * The NinjAuth controller Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Auth extends \NinjAuth\Controller 
{
	public $provider;

	/**
	 * The index action.
	 * 
	 * @access  public
	 * @return  void
	 */
	public function action_index()
	{		
		Response::redirect('users/login');
	}

	public function action_facebook()
	{	
		$this->provider = 'facebook';
		NinjAuth\Strategy::forge($this->provider)->authenticate();
	}	

	public function action_twitter()
	{	
		$this->provider = 'twitter';
		NinjAuth\Strategy::forge($this->provider)->authenticate();
	}	
}