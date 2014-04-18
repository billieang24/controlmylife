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
			header('Location: /when?users='.$_POST['users']);
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

		$users = front()
				->database()
				->search('user')
				->innerJoinOn('freetime','user_id=freetime_user')
				->leftJoinOn('booked','booked_freetime=freetime_id')
				->addFilter('booked_freetime is null')
				->addFilter('(freetime_start between \''.$startOfRange.'\' and \''.$endOfRange.'\')'.
					' and (freetime_end between \''.$startOfRange.'\' and \''.$endOfRange.'\')')
				->setGroup('user_id')
				->getRows();
		foreach ($users as $key => $user) {
			$freetime = front()
						->database()
						->search('freetime')
						->leftJoinOn('booked','booked_freetime=freetime_id')
						->addFilter('freetime_user='.$user['user_id'])
						->addFilter('booked_freetime is null')
						->addFilter(
							'(freetime_start between \''.
								$startOfRange.'\' and \''.$endOfRange.'\')'.
							' and (freetime_end between \''.
								$startOfRange.'\' and \''.$endOfRange.'\')')
						->getRows();
			foreach ($freetime as $value) {
				$users[$key]['freetime'][] = $value;
			}
		}
		$this->_body['dateRange'] = $dateRange;
		$this->_body['users'] = $users;

		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}