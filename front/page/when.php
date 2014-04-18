<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_When extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Eden';
	protected $_class = 'home';
	protected $_template = '/when.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		print_r($_GET);
		$userIdArray = explode(',',$_GET['users']);
		foreach ($userIdArray as $key => $value) {
			$users[] = front()
						->database()
						->search('user')
						->addFilter('user_id='.$value)
						->getRow();
		}
		foreach ($users as $key => $user) {
			$freetime = front()
						->database()
						->search('freetime')
						->leftJoinOn('booked','freetime_id=booked_freetime')
						->addFilter('freetime_user='.$user['user_id'])
						->addFilter('booked_freetime is null')
						->getRows();
			foreach ($freetime as $value) {
				$users[$key]['freetime'][] = $value;
			}
		}
		print_r($users);
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

		$this->_body['free_times'] = array(
								'Monday'=>array('6am-8am','6pm-8pm'),
								'Tuesday'=>array('8am-10am', '6pm-8pm'),
								'Wednesday'=>array('10am-12am', '6pm-8pm'),
								'Thursday'=>array('12am-2pm','6pm-8pm'),
								'Friday'=>array('2pm-4pm','6pm-8pm'),
								'Saturday'=>array('4pm-8pm'),
								'Sunday'=>array('8pm-12pm')
								);
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
