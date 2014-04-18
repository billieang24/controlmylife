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
		foreach ($userIdArray as $value) {
			$users[] = front()->user()->getDetail($value);
		}
		foreach ($users as $key => $user) {
			$freetime = front()->freetime()->getList($user['user_id'],$_GET['start'],$_GET['end']);
			foreach ($freetime as $value) {
				// $this->_body['free_times'][] = $value;
				$users[$key]['freetime'][] = $value;
			}
		}
		$this->_body['users'] = $users;

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
