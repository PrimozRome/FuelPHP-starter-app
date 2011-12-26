<?php

/**
 * The Home Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Home extends Controller_Website
{

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
	
// Create an instance
$email = Email::forge();

// Set the from address
$email->from('no-reply@turne.si', 'Turne Avanture');

// Set the to address
$email->to('primozr@gmail.com', 'Primoz Rome');

// Set a subject
$email->subject('This is the subject');

// And set the body.
$email->body('This is my message');	

try
{
    $email->send();
    echo 'sent';
}
catch(\EmailValidationFailedException $e)
{
    // The validation failed
    echo 'validation failed';
}
catch(\EmailSendingFailedException $e)
{
    // The driver could not send the email
    echo 'sending failed';
}
	
		$this->template->content = 'Test';
	}

}
