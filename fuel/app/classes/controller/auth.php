<?php

/**
 * The NinjAuth controller Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Auth extends \NinjAuth\Controller 
{

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
	
}