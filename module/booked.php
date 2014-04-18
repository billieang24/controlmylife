<?php //-->

class Booked extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($user, $start , $end) {
		$this->_database
			->model()
			->setBookedUser($user)
			->setBookedFreetime($start)
			->setBookedCreated(date('Y-m-d H:i:s'))
			->save('booked');
		
		return $this;
	}
	
	public function getList($start = 0, $range = 10) {
		return $this->_database
			->search('booked')
			->setStart($start)
			->setRange($range)
			->getRows();
	}
	
	public function getDetail($id) {
		return $this->_database->getRow('booked', 'booked_id', $id);
	}
	
	public function update($id, $freetime) {
		$this->_database
			->model()
			->setBookedId($id)
			->setBookedFreetime($freetime)
			->save('booked');
		
		return $this;
	}
	
	public function remove($id) {
		$this->_database
			->model()
			->setBookedId($id)
			->remove('booked');
		
		return $this;
	}
}