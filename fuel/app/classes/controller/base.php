<?php
/**
 * Website controller
 *
 * @package    FuelPHP - starter package
 * @version    1.0
 * @author     Primoz Rome
 * @copyright  Primoz Rome
 * @license    MIT License
 */

class Controller_Base extends Controller_Template {

	public $template = 'templates/template';

	/**
	 * Runs before every request to this controller.  It sets some template
	 * variables which are used throughout the application.
	 *
	 * @return  void
	 */
	public function before()
	{
		parent::before();
		
		/**
		 * 1. check if user logged in
		 * 2. if not check if remembered cookie is set and login if possible
		 * 3. user not logged in
		 */
		if(Auth::check())
		{
			$this->current_user = Model_User::find_by_username(Auth::get_screen_name());
			$this->logged_in = true;
		}
		elseif($user = static::is_remembered())
		{
			if (Auth::check())
			{
				$this->current_user = $user;
				$this->logged_in = true;
			}
		}
		else
		{
			$this->current_user = null;
			$this->logged_in = Auth::check() ? true : false;
		}
		
		View::set_global('current_user', $this->current_user);
		View::set_global('logged_in', $this->current_user);
		
		$this->template->header = View::forge('home/header');
		$this->template->footer = View::forge('home/footer');
	}

	/**
	 * General Error
	 *
	 * @return  void
	 */
	public function action_error()
	{
		$this->template->title = '';
		$this->template->content = Response::forge(ViewModel::forge('home/404'), 500);
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		$this->template->title = 'Oops';
		$this->template->content = Response::forge(ViewModel::forge('home/404'), 404);
	}
	
	/**
	 * Check if remember me is set and valid
	 */
	protected static function is_remembered()
	{
		\Config::load('simpleauth', true);
		
		$encoded_val = Cookie::get(Config::get('simpleauth.remember_me.cookie_name'));
		
		if ($encoded_val)
		{
			$val = base64_decode($encoded_val);
			list($saltedpasswordhash, $cookie_pass, $login_hash) = explode(':', $val);
			$user = Model_User::find_by_remember_me($cookie_pass);
			$dbpasshash = sha1(sha1($user->password).sha1(Config::get('simpleauth.salt')));
									
			if ($user)
			{
				// set auth session variables
				\Session::set('username', $user->username);
				\Session::set('login_hash', $login_hash);
				\Session::instance()->rotate();			

				$user->last_login = time();
				$user->save();
				return $user;
			}
			else
			{
				return false;
			}
		}

		return false;
	}

}
