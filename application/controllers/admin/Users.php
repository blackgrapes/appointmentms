<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Home_Controller {

	public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_admin()) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $this->all_users('all');
    }

    //all users list
    public function all_users($type)
    {

        $data = array();
        //initialize pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/users/all_users/'.$type);
        $total_row = $this->admin_model->get_all_users(1 , 0, 0, $type);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 15;
        $this->pagination->initialize($config);
        
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }
        if ($page != 0) {
            $page = $page - 1;
        }

        $data['page_title'] = 'Users';
        $data['packages'] = $this->admin_model->select('package');
        $data['users'] = $this->admin_model->get_all_users(0 , $config['per_page'], $page * $config['per_page'], $type);
        $data['main_content'] = $this->load->view('admin/users', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    //active or deactive post
    public function status_action($type, $id) 
    {
        $data = array(
            'status' => $type
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'users');

        if($type ==1):
            $this->session->set_flashdata('msg', trans('activate-successfully')); 
        else:
            $this->session->set_flashdata('msg', trans('deactivate-successfully')); 
        endif;
        redirect(base_url('admin/users'));
    }

    //change user role
    public function change_account($id) 
    {
        $data = array(
            'account_type' => $this->input->post('type', false)
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->edit_option($data, $id, 'users');
        $this->session->set_flashdata('msg', trans('updated-successfully')); 
        redirect(base_url('admin/users'));
    }


    public function delete($user_id)
    {
        check_status();

        $this->admin_model->delete_by_user($user_id,'payment');
        $this->admin_model->delete_by_user($user_id,'appointments');
        $this->admin_model->delete_by_user($user_id,'business');
        $this->admin_model->delete_by_user($user_id,'services');
        $this->admin_model->delete_by_user($user_id,'staffs');
        $this->admin_model->delete_by_user($user_id,'customers');
        $this->admin_model->delete($user_id,'users'); 
        echo json_encode(array('st' => 1));
        
    }


}