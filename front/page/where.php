<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Where extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Eden';
	protected $_class = 'home';
	protected $_template = '/where.phtml';

	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {

		$this->_body['users'] = array(
								array('user_name'=>'billie','user_id'=>1,'user_image'=>'batman.jpg','user_free_time'=>'tomorrow 6pm-8pm'),
								array('user_name'=>'batman','user_id'=>2,'user_image'=>'batman.jpg','user_free_time'=>'tomorrow 6pm-8pm'),
								array('user_name'=>'catwoman','user_id'=>3,'user_image'=>'batman.jpg','user_free_time'=>'tomorrow 6pm-8pm'),
								array('user_name'=>'joker','user_id'=>4,'user_image'=>'batman.jpg','user_free_time'=>'tomorrow 6pm-8pm'),
								array('user_name'=>'penguin','user_id'=>5,'user_image'=>'batman.jpg','user_free_time'=>'tomorrow 6pm-8pm'),
								array('user_name'=>'robin','user_id'=>6,'user_image'=>'batman.jpg','user_free_time'=>'tomorrow 6pm-8pm'),
								array('user_name'=>'joker','user_id'=>7,'user_image'=>'batman.jpg','user_free_time'=>'tomorrow 6pm-8pm'),
								array('user_name'=>'penguin','user_id'=>8,'user_image'=>'batman.jpg','user_free_time'=>'tomorrow 6pm-8pm'),
								array('user_name'=>'robin','user_id'=>9,'user_image'=>'batman.jpg','user_free_time'=>'tomorrow 6pm-8pm')
								);

		return $this->_page();
	}
	
	

	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
