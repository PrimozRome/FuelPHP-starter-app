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
		$view = View::forge('users/login', array('val' => $val));

		if (Input::method() == 'POST')
		{
    		$val->add_field('email', 'Your email', 'required|min_length[3]|max_length[50]');
		    $val->add_field('password', 'Your password', 'required|min_length[3]|max_length[50]');
    
			if ($val->run())
			{
				$auth = Auth::instance();
				
				if (Auth::check() or $auth->login($val->validated('email'), $val->validated('password')))
				{
					$current_user = Model_User::find_by_username(Auth::get_screen_name());
					View::set_global('current_user', $current_user);
					View::set_global('logged_in', $current_user);
					Session::set_flash('notice', 'Logged in');
														
					if( Auth::member(100) )
						Response::redirect('admin');
					else
						Response::redirect(Input::referrer());
				}
				else
				{
					$view->login_error = 'Fail';
				}
			}
		}

		$this->template->title = 'Login';
		$this->template->content = $view;
	}
	
	/**
	 * The logout action.
	 * 
	 * @access  public
	 * @return  void
	 */
	public function action_logout()
	{
		//Cookie::delete(Config::get('simpleauth.remember_me.cookie_name'));
		Auth::logout();
		Response::redirect('users');
	}

	/**
	 * The signup action.
	 * 
	 * @access  public
	 * @return  void
	 */
	public function action_signup()
	{
	    if ( Auth::check() )
	    {
	        Response::redirect('/');
	    }
	    
	    $val = Validation::forge();
	    $val->add_field('firstname', 'Your name', 'required|min_length[3]|max_length[50]');
	    $val->add_field('lastname', 'Your last name', 'required|min_length[3]|max_length[50]');
	    $val->add_field('email', 'Your email', 'required|valid_email|max_length[255]');
	    $val->add_field('password', 'Your password', 'required|min_length[3]|max_length[255]');
	    $val->add_field('password_confirm', 'Confirm password', 'required|match_field[password]|min_length[3]|max_length[255]');
	    
		$view = View::forge('users/signup', array('val' => $val));   
	    
	    if ( $val->run() )
	    {
	        $create_user = Auth::instance()->create_user(
	                $val->validated('email'),
	                $val->validated('password'),
	                $val->validated('email'),
	                1,
	                array('firstname'=>$val->validated('firstname'), 'lastname'=>$val->validated('lastname'))
	        );
	        if( $create_user )
	        {
	            Session::set_flash('notice', 'User created.');           
				$auth = Auth::instance();
				if (Auth::check() or $auth->login($val->validated('email'), $val->validated('password')))
				{
					$current_user = Model_User::find_by_username(Auth::get_screen_name());
					View::set_global('current_user', $current_user);
					View::set_global('logged_in', $current_user);
					Session::set_flash('notice', 'Welcome, '.$current_user->username);
					$view = View::forge('users/welcome', array('val' => $val));
				}	          	            
	        }
	        else
	        {
	            throw new Exception('An unexpected error occurred. Please try again.');
	        }
	    }
	    else
	    {
	        if( $_POST )
	        {
	           	$view->login_error = 'All fields are required.';
	        }
	    }
	    
	    $this->template->title = 'Sign Up';
	    $this->template->content = $view;
	}
}
