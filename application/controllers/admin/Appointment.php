<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment extends Home_Controller {

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
        $this->all();
    }

    public function all()
    {
        $data = array();
        $data['page'] = 'Appointment';
        $data['page_title'] = 'Appointments';
        $data['appointment'] = FALSE;

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/appointment/all');
        $total_row = $this->admin_model->get_appointments(user()->id, 1 , 0, 0);
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

        $data['appointments'] = $this->admin_model->get_appointments(user()->id, 0 , $config['per_page'], $page * $config['per_page']);
        $data['services'] = $this->admin_model->select_by_user('services');
        $data['staffs'] = $this->admin_model->select_by_user('staffs');
        $data['customers'] = $this->admin_model->select_by_user('customers');
        $data['main_content'] = $this->load->view('admin/user/appointments',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function calendars()
    {
        $data = array();
        $data['page'] = 'Appointment';
        $data['page_title'] = 'Calendars';
        $data['appointments'] = $this->admin_model->get_user_appointments(user()->id, 300);
        $data['main_content'] = $this->load->view('admin/user/calendars',$data,TRUE);
        $this->load->view('admin/index',$data);
    }



    public function edit($id)
    {
        $data = array();
        $data['page'] = 'Appointment';
        $data['page_title'] = 'Edit';
        $data['appointment'] = $this->admin_model->select_option($id, 'appointments');
        $data['services'] = $this->admin_model->select_by_user('services');
        $data['staffs'] = $this->admin_model->select_by_user('staffs');
        $data['customers'] = $this->admin_model->select_by_user('customers');
        $data['main_content'] = $this->load->view('admin/user/appointments',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function add()
    {	
        if($_POST)
        {   
            $id = $this->input->post('id', true);

            //validate inputs
            $this->form_validation->set_rules('customer_id', 'Customer', 'required');
            $this->form_validation->set_rules('service_id', 'Service', 'required');
        	
            if(!empty($this->input->post('staff_id'))){$staff_id = $this->input->post('staff_id', true);}
            else{$staff_id = 0;}

            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('admin/appointment'));
            } else {

                $time = date("H:i", strtotime($this->input->post('start_time'))).'-'.date("H:i", strtotime($this->input->post('end_time')));
                $data = array(
                    'user_id' => user()->id,
                    'business_id' => $this->business->uid,
                    'customer_id' => $this->input->post('customer_id', true),
                    'service_id' => $this->input->post('service_id', true),
                    'staff_id' => $staff_id,
                    'date' => $this->input->post('date', true),
                    'time' => $time,
                    'status' => $this->input->post('status', true),
                    'created_at' => my_date_now()
                );
                
                if (date('Y-m-d') > $this->input->post('date')) {
                    $this->session->set_flashdata('error', trans('select-a-valid-date'));  
                    redirect(base_url('admin/appointment'));
                }

                if ($id != '') {
                    $this->admin_model->edit_option($data, $id, 'appointments');
                    $this->session->set_flashdata('msg', trans('updated-successfully')); 
                } else {

                    $total = get_total_value('appointments');
                    if (ckeck_plan_limit('appointments', $total) == FALSE) {
                        $this->session->set_flashdata('error', trans('reached-maximum-limit'));
                        redirect(base_url('admin/appointments'));
                        exit();
                    }
                    
                    $this->admin_model->insert($data, 'appointments');
                    $this->session->set_flashdata('msg', trans('inserted-successfully')); 

                    if (!empty($this->input->post('notify_customer')) && $this->input->post('notify_customer') == 1) {

                        if (user()->enable_sms_notify == 1) {
                            $this->load->model('sms_model');
                            $company = $this->admin_model->get_business($this->business->uid);
                            $message = 'Appointment '.$company->name.' - '.$service->name.' booking is confirmed at '.$this->input->post('date').' '.$this->input->post('start_time').'-'.$this->input->post('end_time');
                            $response = $this->sms_model->send($customer->phone, $message);
                        }
                        
                        $customer = $this->admin_model->get_by_id($this->input->post('customer_id'), 'customers');
                        $service = $this->admin_model->get_by_id($this->input->post('service_id'), 'services');
                        $subject = 'Appointment Confirmation - '.$this->settings->site_name;
                        $msg = 'Your appointment is booked successfully at '.$this->input->post('date').', Please login to your account for more details <br>'.base_url('login');
                        $this->email_model->send_email($customer->email, $subject, $msg);
                        
                    }
                    
                }

                redirect(base_url('admin/appointment'));

            }

        } 
        
    }


    public function status_update($status, $id) 
    {
        $data = array(
            'status' => $status
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id, 'appointments');
        echo json_encode(array('st' => 1));
    }

    public function notify_customer($id) 
    {
        $appointment = $this->common_model->get_appointment($id);
        //echo "<pre>"; print_r($appointment); exit();
        $this->load->model('sms_model');
        $company = $this->admin_model->get_business($this->business->uid);
        $message = 'Appointment '.$company->name.' - '.$appointment->service_name.' at '.my_date_show($appointment->date).' '.$appointment->time;
        $response = $this->sms_model->send($appointment->customer_phone, $message);
   
        if ($response != 1) {
            echo json_encode(array('st' => 0, 'msg' => $response));
        }else{
            echo json_encode(array('st' => 1));
        }
    }


    public function set()
    {   
        if(user()->role == 'staff'){$user_id = user()->user_id;}else{$user_id = user()->id;}
        $this->admin_model->delete_assaign_days($user_id, 'working_days');
        if($_POST)
        {   
            for ($i=0; $i < 7; $i++) { 
                if(empty($this->input->post("day_".$i))){
                    $day = 0;
                }else{
                    $day = $this->input->post("day_".$i);
                }
                $data = array(
                    'user_id' => $user_id,
                    'day' => $day,
                    'start' => $this->input->post("start_time_".$i),
                    'end' => $this->input->post("end_time_".$i)
                );
                $data = $this->security->xss_clean($data);
                $this->admin_model->insert($data, 'working_days');
            }

            $this->session->set_flashdata('msg', trans('schedule-assigned-successfully')); 
            redirect(base_url('admin/appointment/assign'));
        }      
        
    }

    public function delete_time($id)
    {
        $this->admin_model->delete($id,'working_time'); 
        echo json_encode(array('st' => 1));
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'appointments'); 
        echo json_encode(array('st' => 1));
    }

}
	

