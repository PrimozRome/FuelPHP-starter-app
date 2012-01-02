<?php
/**
 * Users controller - basic user controller for handling authorization
 *
 * @package    FuelPHP - starter package
 * @version    1.0
 * @author     Primoz Rome
 * @copyright  Primoz Rome
 * @license    MIT License
 */

class Controller_Users extends Controller_Base 
{

	public function before()
	{
		parent::before();
		
		if ( !Auth::check() and Request::active()->action == 'index')
		{
			Response::redirect('users/login');
		}
	}

	/**
	 * The index action.
	 * 
	 * @access  public
	 * @return  void
	 */
	public function action_index()
	{		
		$this->template->title = 'User profile';
		$this->template->content = View::forge('home/home');
	}

	
	public function action_login()
	{
		// Already logged in
		if( Auth::check() and Auth::member(100) )
			Response::redirect('admin');
		elseif( Auth::check() and Auth::member(1) )
			Response::redirect('users');

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			    ->add_rule('required');
			$val->add('password', 'Password')
			    ->add_rule('required');

			if ($val->run())
			{
				$auth = Auth::instance();
				
				if (Auth::check() or $auth->login(Input::post('email'), Input::post('password')))
				{
					Session::set_flash('notice', 'Welcome, '.$current_user->username);
					
					if( Auth::member(100) )
						Response::redirect('admin');
					else
						Response::redirect(Input::referrer());
				}
				else
				{
					$this->template->set_global('login_error', 'Fail');
				}
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('users/login', array('val' => $val));
	}
	
	/**
	 * The logout action.
	 * 
	 * @access  public
	 * @return  void
	 */
	public function action_logout()
	{		
		Auth::logout();
		Response::redirect('users');
	}

}
