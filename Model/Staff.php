<?php
class Staff extends StaffAppModel
{

    public function get($id = false)
    {
        if ($id) return $this->find('all', ['conditions' => ['id' => $id]])[0];
	
		return $this->find('all', ['order' => ['order' => 'ASC']]);
    }
	
	public function exist($id)
	{
		if($this->hasAny(['id' => $id])) return true;
		return false;
	}
    
    public function add(
		$order,
		$username,
		$rank,
		$color,
		$facebook,
		$reddit,
		$twitter,
		$googleplus,
		$youtube,
		$weibo,
		$github,
		$instagram
	){
		$this->create();
		$this->set([
			'order' => $order,
			'username' => $username,
			'rank' => $rank,
			'color' => $color,
			'facebook_url' => $facebook,
			'reddit_url' => $reddit,
			'twitter_url' => $twitter,
			'googleplus_url' => $googleplus,
			'youtube_url' => $youtube,
			'weibo_url' => $weibo,
			'github_url' => $github,
			'instagram' => $instagram
		]);
		return $this->save();
	}
	
	public function edit(
		$id,
		$order,
		$username,
		$rank,
		$color,
		$facebook,
		$reddit,
		$twitter,
		$googleplus,
		$youtube,
		$weibo,
		$github,
		$instagram
	){
		$username = $this->getDataSource()->value($username, 'string');
		$rank = $this->getDataSource()->value($rank, 'string');
		$color = $this->getDataSource()->value($color, 'string');
		$facebook = $this->getDataSource()->value($facebook, 'string');
		$reddit = $this->getDataSource()->value($reddit, 'string');
		$twitter = $this->getDataSource()->value($twitter, 'string');
		$googleplus = $this->getDataSource()->value($googleplus, 'string');
		$youtube = $this->getDataSource()->value($youtube, 'string');
		$weibo = $this->getDataSource()->value($weibo, 'string');
		$github = $this->getDataSource()->value($github, 'string');
		$instagram = $this->getDataSource()->value($instagram, 'string');
		
		return $this->updateAll([
			'order' => $order,
			'username' => $username,
			'rank' => $rank,
			'color' => $color,
			'facebook_url' => $facebook,
			'reddit_url' => $reddit,
			'twitter_url' => $twitter,
			'googleplus_url' => $googleplus,
			'youtube_url' => $youtube,
			'weibo_url' => $weibo,
			'github_url' => $github,
			'instagram' => $instagram
		], ['id' => $id]);
	}
	
	public function _delete($id)
	{
		return $this->delete($id);
	}
}