<?php //-->

class Post extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($title, $detail, $user) {
		$this->_database
			->model()
			->setPostTitle($title)
			->setPostDetail($detail)
			->setPostUser($user)
			->setPostActive(1)
			->setPostCreated(date('Y-m-d H:i:s'))
			->save('post');
		
		return $this;
	}
	
	public function getList($start = 0, $range = 10) {
		return $this->_database
			->search('post')
			->innerJoinOn('user', 'user_id=post_user')
			->setStart($start)
			->setRange($range)
			->getRows();
	}
	
	public function getTotal() {
		return $this->_database
			->search('post')
			->getTotal();
	}
	
	public function getDetail($id) {
		return $this->_database->getRow('post', 'post_id', $id);
	}
	
	public function update($id, $title, $detail, $user) {
		$this->_database
			->model()
			->setPostId($id)
			->setPostTitle($title)
			->setPostDetail($detail)
			->setPostUser($user)
			->save('post');
		
		return $this;
	}
	
	public function remove($id) {
		$this->_database
			->model()
			->setPostId($id)
			->remove('post');
		
		return $this;
	}
}