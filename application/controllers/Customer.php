<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function appointments()
    {   
        $data = array();
        $data['page'] = 'Customers';
        $data['page_title'] = 'Appointments';
        $data['page_lang'] = 'appointments';
        $data['menu'] = FALSE;
        $data['appointments'] = $this->common_model->get_customer_appointments();
        $data['customer'] = $this->common_model->get_by_id(customer()->id, 'customers');
        $data['company'] = $this->common_model->get_by_uid($data['customer']->business_id, 'business');
        $data['main_content'] = $this->load->view('customers/appointments', $data, TRUE);
        $this->load->view('index', $data);
    }


    public function payment($id)
    {   
        $data = array();
        $data['page'] = 'Customers';
        $data['page_title'] = 'Payment';
        $data['page_lang'] = 'payment';
        $data['menu'] = FALSE;
        $data['appointment'] = $this->common_model->get_appointment($id);
        $data['company'] = $this->common_model->get_by_uid($data['appointment']->business_id, 'business');
        $data['appointment_id'] = $data['appointment']->user_id;
        $data['user'] = $this->common_model->get_by_id($data['appointment']->user_id, 'users');
        $data['main_content'] = $this->load->view('customers/payment', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function payment_msg($type, $id){
        $data = array();
        $data['menu'] = FALSE;
        $data['type'] = ucfirst($type);
        $data['id'] = $id;
        $data['main_content'] = $this->load->view('customers/payment_msg',$data,TRUE);
        $this->load->view('index',$data);
    }


    public function account()
    {   
        $data = array();
        $data['page'] = 'Customers';
        $data['page_title'] = 'Account';
        $data['page_lang'] = 'account';
        $data['menu'] = FALSE;
        $data['customer'] = $this->common_model->get_by_id(customer()->id, 'customers');
        $data['main_content'] = $this->load->view('customers/account', $data, TRUE);
        $this->load->view('index', $data);
    }


    //update user profile
    public function update(){
        
        check_status();

        if ($_POST) {

            $id = $this->input->post('id', true);
            $data = array(
                'name' => $this->input->post('name', true),
                'phone' => $this->input->post('phone', true),
                'email' => $this->input->post('email', true)
            );

            // insert photos
            if($_FILES['photo']['name'] != ''){
                $up_load = $this->admin_model->upload_image('800');
                $data_img = array(
                    'image' => $up_load['images'],
                    'thumb' => $up_load['thumb']
                );
                $this->admin_model->edit_option($data_img, $id, 'customers');   
            }

            $data = $this->security->xss_clean($data);
            $this->admin_model->edit_option($data, $id, 'customers');
            $this->session->set_flashdata('msg', 'Updated Successfully'); 
            redirect(base_url('customer/account'));
        }
    }


    //cancel appointment
    public function cancel_appointment($status, $id){
        $data = array(
            'status' => $status
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->edit_option($data, $id, 'appointments');
        $this->session->set_flashdata('msg', 'Updated Successfully'); 
        redirect(base_url('customer/appointments'));
    }


    public function cancel($id)
    {
        $data = array(
            'status' => 2
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->edit_option($data, $id, 'appointments');
        echo json_encode(array('st' => 1));
    }



    public function change_password()
    {
        $data = array();
        $data['page'] = 'Customers';
        $data['menu'] = FALSE;
        $data['page_title'] = 'Change Password';
        $data['page_lang'] = 'change-password';
        $data['customer'] = $this->common_model->get_by_id($this->session->userdata('id'), 'customers');
        $data['main_content'] = $this->load->view('customers/account', $data, TRUE);
        $this->load->view('index', $data);
    }


    public function add_rating() 
    {
        if ($_POST) {
            
            $id = $this->input->post('appointment_id');
            $appointment = $this->common_model->get_by_id($id, 'appointments');
          
            $data = array(
                'user_id' => $appointment->user_id,
                'business_id' => $appointment->business_id,
                'service_id' => $appointment->service_id,
                'appointment_id' => $id,
                'customer_id' => $appointment->customer_id,
                'rating' => $this->input->post('rating'),
                'feedback' => $this->input->post('feedback'),
                'created_at' => my_date_now()
            );
            $data = $this->security->xss_clean($data);
            $this->admin_model->insert($data, 'ratings');
            $this->session->set_flashdata('msg', trans('inserted-successfully')); 
            redirect(base_url('customer/appointments'));
        }
    }
    

    //change password
    public function change()
    {   
        check_status();

        if($_POST){
            
            $id = $this->session->userdata('id');
            $user = $this->admin_model->get_by_id($id, 'customers');

            if(password_verify($this->input->post('old_pass', true), $user->password)){
                if ($this->input->post('new_pass', true) == $this->input->post('confirm_pass', true)) {
                    $data=array(
                        'password' => hash_password($this->input->post('new_pass', true))
                    );
                    $data = $this->security->xss_clean($data);
                    $this->admin_model->edit_option($data, $id, 'staffs');
                    echo json_encode(array('st'=>1));
                } else {
                    echo json_encode(array('st'=>2));
                }
            } else {
                echo json_encode(array('st'=>0));
            }
        }
    }



}