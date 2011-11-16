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

class Controller_Website extends Controller_Template {

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

}
