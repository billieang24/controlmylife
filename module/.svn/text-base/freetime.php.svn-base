<?php //-->

class FreeTime extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($user, $start , $end) {
		$this->_database
			->model()
			->setFreetimeUser($user)
			->setFreetimeStart($start)
			->setFreetimeEnd($end)
			->setFreetimeCreated(date('Y-m-d H:i:s'))
			->save('freetime');
		
		return $this;
	}
	
	public function getList($user, $start, $end) {
		return $this->_database
					->search('freetime')
					->leftJoinOn('booked','booked_freetime=freetime_id')
					->addFilter('freetime_user='.$user)
					->addFilter('booked_freetime is null')
					->addFilter(
						'(freetime_start between \''.
							$start.'\' and \''.$end.'\')'.
						' and (freetime_end between \''.
							$start.'\' and \''.$end.'\')')
					->getRows();
	}
	
	public function getDetail($id) {
		return $this->_database->getRow('freetime', 'freetime_id', $id);
	}
	
	public function update($id, $start, $end) {
		$this->_database
			->model()
			->setFreetimeId($id)
			->setFreetimeStart($start)
			->setFreetimeEnd($end)
			->save('freetime');
		
		return $this;
	}
	
	public function remove($id) {
		$this->_database
			->model()
			->setFreetimeId($id)
			->remove('freetime');
		
		return $this;
	}
}