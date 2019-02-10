<?php

class StaffController extends AppController
{
	public function index()
    {
        $this->loadModel('Staff.StaffListing');

        $staffs = $this->StaffListing->get();
        $i = 0;
        if (!empty($staffs)) foreach ($staffs as $v) {
            $staffs[$i]['Staff'] = $v['StaffListing'];
            $i++;
        }
		$this->set(compact('staffs'));
	}
	
	public function admin_index()
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
			
			$this->loadModel('Staff.StaffListing');
			
			$staffs = $this->StaffListing->get();
			
			$this->set(compact('staffs'));
		} else {
			$this->redirect('/');
		}
	}
	
	public function admin_add()
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
			
			if ($this->request->is('ajax')) {
				$this->autoRender = false;
				
				$this->loadModel('Staff.StaffListing');
				
				$this->StaffListing->add(
					$this->request->data['order'],
					$this->request->data['username'],
					$this->request->data['rank'],
					$this->request->data['color'],
					
					$this->request->data['facebook_url'],
					$this->request->data['reddit_url'],
					$this->request->data['twitter_url'],
					$this->request->data['googleplus_url'],
					$this->request->data['youtube_url'],
					$this->request->data['weibo_url'],
					$this->request->data['github_url'],
					$this->request->data['instagram_url']
				);
				$this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('STAFF__ADD_SUCCESS'))));
			}
		} else {
			$this->redirect('/');
		}
	}
	
	public function admin_edit($id)
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
			
			$this->loadModel('Staff.StaffListing');
			
			if (!$this->StaffListing->exist($id)) $this->redirect('/admin/staff');
			
			if ($this->request->is('ajax')) {
				$this->autoRender = false;
				
				$this->StaffListing->edit(
					$id,
					$this->request->data['order'],
					$this->request->data['username'],
					$this->request->data['rank'],
					$this->request->data['color'],
					
					$this->request->data['facebook_url'],
					$this->request->data['reddit_url'],
					$this->request->data['twitter_url'],
					$this->request->data['googleplus_url'],
					$this->request->data['youtube_url'],
					$this->request->data['weibo_url'],
					$this->request->data['github_url'],
					$this->request->data['instagram_url']
				);
				$this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('STAFF__ADD_SUCCESS'))));
			}
			
			$staff = $this->StaffListing->get($id);

			$this->set(compact('staff', 'id'));
		} else {
			$this->redirect('/');
		}
	}
	
	public function admin_delete($id)
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			
			$this->loadModel('Staff.StaffListing');
			
			if (!$this->StaffListing->exist($id)) $this->redirect('/admin/staff');
			
			$this->StaffListing->_delete($id);
			$this->redirect('/admin/staff');
		} else {
			$this->redirect('/');
		}
	}
}