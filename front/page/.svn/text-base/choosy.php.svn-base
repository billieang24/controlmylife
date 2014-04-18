<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Choosy extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Eden';
	protected $_class = 'home';
	protected $_template = '/choosy.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		$this->_body['notices'][] = array(
			'type' => 'info',
			'value' => "<strong>No Plans on Thursday?</strong> Hang out with your friends. They don't have plans! :)"
		);
		//Set "My schedule" button's values seen on the upper right portion of the header.
		$this->_head['header_button'] = array(
			'link' => 'my-schedule',
			'title' => 'My Schedule',
		);
		// Stub data
		$this->_body['users'] = array(
			array(
				'name' => 'John Doe',
				'time' => 'Tomorrow 6pm-10pm',
				'img' => '/images/batman.jpg',
				),
			array(
				'name' => 'John Doe',
				'time' => 'Tomorrow 6pm-10pm',
				'img' => '/images/batman.jpg',
				),
			array(
				'name' => 'John Doe',
				'time' => 'Tomorrow 6pm-10pm',
				'img' => '/images/batman.jpg',
				),
			array(
				'name' => 'John Doe',
				'time' => 'Tomorrow 6pm-10pm',
				'img' => '/images/batman.jpg',
				),
			array(
				'name' => 'John Doe',
				'time' => 'Tomorrow 6pm-10pm',
				'img' => '/images/batman.jpg',
				),
		);
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
