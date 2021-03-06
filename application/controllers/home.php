<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function index() {
		echo "Hello this is the index";
	}
	
	function crud() {
		
		$this->load->model('user_model');
		
		$users = $this->user_model->get_users();
		
		$data['users'] = $users;
		
		$this->load->view('crud', $data);
	}
	
	function add_user() {
		
		$this->load->database();
		
		$this->load->helper('security');
		
		$data = array(
			"first_name" => strtolower($this->input->post('first_name')),
			"last_name" => strtolower($this->input->post('last_name')),
			"middle_name" => strtolower($this->input->post('middle_name')),
			"gender" => strtolower($this->input->post('gender')),
			"email" => $this->input->post('email'),
			"role" => strtolower($this->input->post('role')),
			"username" => strtolower($this->input->post('username')),
			"password" => do_hash($this->input->post('password')),
			"date_registered" => date("Y-m-d H:i:s")
		);
		
		$this->load->library('form_validation');
		$this->form_validation->set_message('is_unique', '%s already exists');
		$this->form_validation->set_rules('email', 'Email Address', 'is_unique[users.email]');
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');

		if ($this->form_validation->run() == FALSE) {
			$data['status'] = false;
			$data['error'] = validation_errors();
		} else {
			$this->load->model('user_model');
		
			$add_user = $this->user_model->add_user($data);
			
			if($add_user) {
				$data['status'] = true;
			}
		}
		
		echo json_encode($data);
	}
	
	function delete_user() {
		
		$id = $this->input->post('id');
		
		if($id != NULL) {
			$this->load->model('user_model');
		
			$delete = $this->user_model->delete_user($id);
			
			$data['status'] = true;
			
		} else {
			$data['status'] = false;
		}
		
		echo json_encode($data);
	}
	
	function search_user() {
		
		$this->load->helper('url');
		
		$user = $this->input->post('user_search');
		
		$this->load->model('user_model');
		
		if($user == NULL) {
			$users = $this->user_model->get_users();
			
			if($users != NULL) {
				$data['content'] = "
					<tr>
						<th><input type='checkbox' name='head_check' class='head_check'  /></th>
						<th>Email Address</th>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Middle Name</th>
						<th>Gender</th> 
						<th>Role</th>
						<th>Date Registered</th>
					</tr>
				";
				
				foreach($users as $row) {
	
					$base = base_url();
					
					$data['content'] .= "
						<tr>
							<td><input type='checkbox' name='id[]' class='sub_check' value='{$row->id}' /></td>
							<td><a href='{$base}index.php/home/select_update_user?id={$row->id}' class='update_link'>{$row->email}</a></td>
							<td>{$row->username}</td>
							<td>{$row->first_name}</td>
							<td>{$row->last_name}</td>
							<td>{$row->middle_name}</td>
							<td>{$row->gender}</td>
							<td>{$row->role}</td>
							<td>{$row->date_registered}</td>
						</tr>
					";
				}
			} else {
				$data['content'] = "
					<tr>
						<th><input type='checkbox' name='head_check' class='head_check'  /></th>
						<th>Email Address</th>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Middle Name</th>
						<th>Gender</th> 
						<th>Role</th>
						<th>Date Registered</th>
					</tr>
					<tr>
						<td colspan='9' class='empty'>No user exists</td>
					</tr>
				";
			}
			
		} else {
			$users = $this->user_model->search_user($user);
	
			if($users != NULL) {
				$data['content'] = "
					<tr>
						<th><input type='checkbox' name='head_check' class='head_check'  /></th>
						<th>Email Address</th>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Middle Name</th>
						<th>Gender</th> 
						<th>Role</th>
						<th>Date Registered</th>
					</tr>
				";
				
				foreach($users as $row) {
					
					$base = base_url();
					
					$data['content'] .= "
						<tr>
							<td><input type='checkbox' name='id[]' class='sub_check' value='{$row->id}' /></td>
							<td><a href='{$base}index.php/home/select_update_user?id={$row->id}' class='update_link'>{$row->email}</a></td>
							<td>{$row->username}</td>
							<td>{$row->first_name}</td>
							<td>{$row->last_name}</td>
							<td>{$row->middle_name}</td>
							<td>{$row->gender}</td>
							<td>{$row->role}</td>
							<td>{$row->date_registered}</td>
						</tr>
					";
				}
				
			} else {
				$data['content'] = "
					<tr>
						<th><input type='checkbox' name='head_check' class='head_check'  /></th>
						<th>Email Address</th>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Middle Name</th>
						<th>Gender</th> 
						<th>Role</th>
						<th>Date Registered</th>
					</tr>
					<tr>
						<td colspan='9' class='empty'>No user exists</td>
					</tr>
				";
			}
			
		}
		
		echo json_encode($data);
	}
	
	
	function select_update_user() {
	
		$id = $this->input->get('id');
		
		$this->load->model('user_model');
		
		$user = $this->user_model->get_user_by_id($id);
		
		if($user != NULL) {
			
			foreach($user as $row) {
				
				$data = array(
					'id' => $row->id,
					'first_name' => $row->first_name,
					'last_name' => $row->last_name,
					'middle_name' => $row->middle_name,
					'gender' => $row->gender,
					'email' => $row->email,
					'role' => $row->role,
					'username' => $row->username,
					'password' => $row->password
					
				);

			}
		
		}
		
		echo json_encode($data);
		
	}
	
	private function exist_self_email($id, $email) {
		$this->load->model('user_model');
		$check_email = $this->user_model->check_email_by_id($id, $email);
		
		if($check_email != NULL) {
			return true;
		} else {
			return false;
		}
	}
	
	private function exist_self_username($id, $username) {
		$this->load->model('user_model');
		$check_username = $this->user_model->check_username_by_id($id, $username);
		
		if($check_username != NULL) {
			return true;
		} else {
			return false;
		}
	}
	
	function update_user() {
		
		$this->load->helper('security');
		
		$password = $this->input->post('password');
		
		if($password != NULL) {
			
			$data = array(
				"first_name" => $this->input->post('first_name'),
				"last_name" => $this->input->post('last_name'),
				"middle_name" => $this->input->post('middle_name'),
				"gender" => $this->input->post('gender'),
				"email" => $this->input->post('email'),
				"role" => $this->input->post('role'),
				"username" => $this->input->post('username'),
				"password" => do_hash($this->input->post('password'))
			);
			
		} else {
		
			$data = array(
				"first_name" => $this->input->post('first_name'),
				"last_name" => $this->input->post('last_name'),
				"middle_name" => $this->input->post('middle_name'),
				"gender" => $this->input->post('gender'),
				"email" => $this->input->post('email'),
				"role" => $this->input->post('role'),
				"username" => $this->input->post('username'),
			);
			
		}
		
		$id = $this->input->post('id');
		
		$email = $this->input->post('email');
		
		$username = $this->input->post('username');
		
		$this->load->database();
		
		if($this->exist_self_email($id, $email) && $this->exist_self_username($id, $username)) {
			
			$this->load->model('user_model');
			$update_user = $this->user_model->update_user($id, $data);
			
			if($update_user) {
				$data['status'] = true;
			}
		
		} else if($this->exist_self_email($id, $email) && !$this->exist_self_username($id, $username)) {
			$this->load->library('form_validation');
			$this->form_validation->set_message('is_unique', '%s already exists');
			$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');

			if($this->form_validation->run() == FALSE) {
				$data['status'] = false;
				$data['error'] = validation_errors();
			} else {
				$this->load->model('user_model');
				$update_user = $this->user_model->update_user($id, $data);
				
				if($update_user) {
					$data['status'] = true;
				}
			}
			
		} else if(!$this->exist_self_email($id, $email) && $this->exist_self_username($id, $username)) {
			
			$this->load->library('form_validation');
			$this->form_validation->set_message('is_unique', '%s already exists');
			$this->form_validation->set_rules('email', 'Email Address', 'is_unique[users.email]');
			
			if($this->form_validation->run() == FALSE) {
				$data['status'] = false;
				$data['error'] = validation_errors();
			} else {
				$this->load->model('user_model');
				$update_user = $this->user_model->update_user($id, $data);
				
				if($update_user) {
					$data['status'] = true;
				}
			}
	
		} else {
		
			$this->load->library('form_validation');
			$this->form_validation->set_message('is_unique', '%s already exists');
			$this->form_validation->set_rules('email', 'Email Address', 'is_unique[users.email]');
			$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
			
			if($this->form_validation->run() == FALSE) {
				$data['status'] = false;
				$data['error'] = validation_errors();
			} else {
				$this->load->model('user_model');
				$update_user = $this->user_model->update_user($id, $data);
				
				if($update_user) {
					$data['status'] = true;
				}
			}
		}
	
		echo json_encode($data);

	}
	
}



