<?php //-->
class Event_Post {
	public function __construct() {
		front()->listen('new-post', $this, 'create');
	}
	
	public function create($control, $event, $post) {
		front()->post()->create(
			$post['post_title'],
			$post['post_detail'],
			$post['post_user']);
	}
}