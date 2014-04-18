<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_People extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Eden';
	protected $_class = 'home';
	protected $_template = '/people.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		
		if(isset($_POST['users'])){
			// print_r($_POST);
			header('Location: /when?users='.
				$_POST['users'].'&start='.$_POST['start'].
				'&end='.$_POST['end']);
		}
		// front()
		// 	->database()
		// 	->model()
		// 	->setUserName('kevin durant')
		// 	->setUserEmail('kevin@durant.com')
		// 	->setUserActive(1)
		// 	->setUserCreated(date('Y-m-d H:i:s'))
		// 	->save('user');
		$dateRange = 'This Week';
		if(isset($_POST['date-range'])){
			$dateRange = $_POST['date-range'];
		}
		if($dateRange=='This Week'){
			$startOfRange = date('Y-m-d H:i:s');
		}
		else{
			$startOfRange = date('Y-m-d 00:00:00',strtotime('+'.(7-date('w')).' day'));
		}
		$endOfRange = date('Y-m-d 00:00:00',strtotime(
			$startOfRange.'+'.(7-date('w',strtotime($startOfRange))).' day'));

		$users = front()->user()->getList($startOfRange,$endOfRange);
		
		foreach ($users as $key => $user) {
			$freetime = front()->freetime()->getList($user['user_id'],$startOfRange,$endOfRange);
			foreach ($freetime as $value) {
				$users[$key]['freetime'][] = $value;
			}
		}
		$this->_body['dateRange'] = $dateRange;
		$this->_body['start'] = $startOfRange;
		$this->_body['end'] = $endOfRange;
		$this->_body['users'] = $users;

		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}