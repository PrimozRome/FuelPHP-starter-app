<?php
/**
 * Admin controller
 *
 * @package    FuelPHP - starter package
 * @version    1.0
 * @author     Primoz Rome
 * @copyright  Primoz Rome
 * @license    MIT License
 */

class Controller_Admin extends Controller_Base {

	public $template = 'admin/template';

	public function before()
	{
		parent::before();

		if ( ! Auth::member(100) and Request::active()->action != 'login')
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
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('admin/dashboard');
	}

}

/* End of file admin.php */