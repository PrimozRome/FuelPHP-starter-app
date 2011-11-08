<?php

class Controller_Website extends Controller_Template 
{
	public $template = 'templates/template';

	public function before()
	{
		parent::before();
		
		$this->template->header = View::factory('home/header');
		$this->template->footer = View::factory('home/footer');
	}
	
}

/* End of file common.php */