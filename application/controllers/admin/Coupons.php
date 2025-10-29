<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupons extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_staff() && !is_user()) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Coupons';      
        $data['page'] = 'Coupons';   
        $data['coupon'] = FALSE;
        $data['coupons'] = $this->admin_model->select_by_user('coupons');
        $data['services'] = $this->admin_model->select_by_user('services');
        $data['main_content'] = $this->load->view('admin/user/coupons',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    public function add()
    {	
        if($_POST)
        {   
            $id = $this->input->post('id', true);

            //validate inputs
            $this->form_validation->set_rules('code', trans('code'), 'required|max_length[100]');
            $this->form_validation->set_rules('discount', trans('discount'), 'required');

            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('admin/coupons'));
            } else {
                if (empty($this->input->post('once_per_customer'))) {
                    $once_per_customer = 0;
                }else {
                    $once_per_customer = $this->input->post('once_per_customer');
                }
                $data=array(
                    'user_id' => user()->id,
                    'business_id' => $this->business->uid,
                    'service_id' => $this->input->post('service_id', true),
                    'code' => $this->input->post('code', true),
                    'discount' => $this->input->post('discount', true),
                    'start_date' => $this->input->post('start_date', true),
                    'end_date' => $this->input->post('end_date', true),
                    'usages_limit' => $this->input->post('usages_limit', true),
                    'once_per_customer' => $once_per_customer,
                    'status' => $this->input->post('status'),
                    'created_at' => my_date_now()
                );
                $data = $this->security->xss_clean($data);

                if (!empty($id)) {
                    $this->admin_model->edit_option($data, $id, 'coupons');
                    $this->session->set_flashdata('msg', trans('updated-successfully')); 
                } else {
                    $this->admin_model->insert($data, 'coupons');
                    $this->session->set_flashdata('msg', trans('inserted-successfully')); 
                }

                redirect(base_url('admin/coupons'));

            }
        }      
        
    }

    public function edit($id)
    {  
        $data = array();
        $data['page_title'] = 'Edit';   
        $data['coupon'] = $this->admin_model->select_option($id, 'coupons');
        $data['services'] = $this->admin_model->select_by_user('services');
        $data['main_content'] = $this->load->view('admin/user/coupons',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    
    public function update_status($status, $id) 
    {
        $data = array(
            'status' => $status
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'coupons');
        $this->session->set_flashdata('msg', trans('activate-successfully')); 
        redirect(base_url('admin/staff'));
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'coupons'); 
        echo json_encode(array('st' => 1));
    }

}
	

