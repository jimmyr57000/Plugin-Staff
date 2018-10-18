<?php
class StaffAppSchema extends CakeSchema
{
	public $file = 'schema.php';

	public function before($event = [])
	{
		return true;
	}

	public function after($event = [])
	{
	}
	
	public $staff__staffs = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
		'order' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false],
		'username' => ['type' => 'text', 'null' => false, 'default' => null, 'length' => 100, 'unsigned' => false],
		'rank' => ['type' => 'text', 'null' => false, 'default' => null, 'length' => 100, 'unsigned' => false],
		'color' => ['type' => 'text', 'null' => true, 'default' => null, 'length' => 6, 'unsigned' => false],
		
		'facebook_url' => ['type' => 'text', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
		'reddit_url' => ['type' => 'text', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
		'twitter_url' => ['type' => 'text', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
		'googleplus_url' => ['type' => 'text', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
		'youtube_url' => ['type' => 'text', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
		'weibo_url' => ['type' => 'text', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
		'github_url' => ['type' => 'text', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
		'instagram_url' => ['type' => 'text', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false]
	];
}
