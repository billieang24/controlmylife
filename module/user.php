<?php //-->

class User extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($name, $email) {
		$this->_database
			->model()
			->setUserName($name)
			->setUserEmail($email)
			->setUserActive(1)
			->setUserCreated(date('Y-m-d H:i:s'))
			->save('user');
		
		return $this;
	}
	
	public function getList($start, $end) {
		return $this->_database
			->search('user')
			->innerJoinOn('freetime','user_id=freetime_user')
			->leftJoinOn('booked','booked_freetime=freetime_id')
			->addFilter('booked_freetime is null')
			->addFilter('(freetime_start between \''.$start.'\' and \''.$end.'\')'.
				' and (freetime_end between \''.$start.'\' and \''.$end.'\')')
			->setGroup('user_id')
			->getRows();
	}
	
	public function getDetail($id) {
		return $this->_database->getRow('user', 'user_id', $id);
	}
	
	public function update($id, $name, $email) {
		$this->_database
			->model()
			->setUserId($id)
			->setUserName($name)
			->setUserEmail($email)
			->save('user');
		
		return $this;
	}
	
	public function remove($id) {
		$this->_database
			->model()
			->setUserId($id)
			->remove('user');
		
		return $this;
	}
}