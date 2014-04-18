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
	
	public function getList($start = 0, $range = 10) {
		return $this->_database
			->search('user')
			->setStart($start)
			->setRange($range)
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