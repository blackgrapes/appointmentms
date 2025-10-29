<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
    }


    public function home($slug)
    {   
        $data = array();
        $data['page'] = 'Company';
        $data['page_title'] = 'Company Home';
        $data['slug'] = $slug;
        $data['menu'] = FALSE;
        $data['company'] = $this->common_model->get_by_slug($slug, 'business');
        if(empty($data['company'])){
            redirect(base_url('404_override'));
        }
        $data['services'] = $this->common_model->get_company_services($data['company']->uid, 3);
        $data['my_days'] =$this->admin_model->get_my_days($data['company']->uid);
        $data['main_content'] = $this->load->view('templates/style_1/home', $data, TRUE);
        $this->load->view('index', $data);
    }


    public function services($slug)
    {   
        $data = array();
        $data['page'] = 'Company';
        $data['page_title'] = 'Services';
        $data['slug'] = $slug;
        $data['menu'] = FALSE;
        $data['company'] = $this->common_model->get_by_slug($slug, 'business');
        $data['services'] = $this->common_model->get_company_services($data['company']->uid, 0);
        $data['staffs'] = $this->common_model->get_by_status($data['company']->uid, 'staffs');
        $data['main_content'] = $this->load->view('templates/style_1/services', $data, TRUE);
        $this->load->view('index', $data);
    }


    public function service($service_slug, $slug)
    {   
        $data = array();
        $data['page'] = 'Company';
        $data['page_title'] = 'Service';
        $data['slug'] = $slug;
        $data['menu'] = FALSE;
        $data['company'] = $this->common_model->get_by_slug($slug, 'business');
        $data['service'] = $this->common_model->get_id_by_company($service_slug, 'services', $data['company']->uid);
        $data['main_content'] = $this->load->view('templates/style_1/service_details', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function gallery($slug)
    {   
        $data = array();
        $data['page'] = 'Company';
        $data['page_title'] = 'Gallery';
        $data['slug'] = $slug;
        $data['menu'] = FALSE;
        $data['company'] = $this->common_model->get_by_slug($slug, 'business');
        $data['galleries'] = $this->common_model->get_by_status($data['company']->uid, 'gallery');
        $data['main_content'] = $this->load->view('templates/style_1/gallery', $data, TRUE);
        $this->load->view('index', $data);
    }


    // not found page
    public function get_time($date, $business_id)
    {
        $service_id = $this->session->userdata('service_id');
        $day = date('l', strtotime($date));
        $day_id = get_day_id($day);
        $value = array();
        $value['company'] = $this->admin_model->get_business_uid($business_id);

        if ($value['company']->interval_settings == 2) {
            if ($value['company']->interval_type == 'minute') {
                $interval = $value['company']->time_interval;
            }else if($value['company']->interval_type == 'hour'){
                $interval = $value['company']->time_interval * 60;
            }
        }else{
            $service = $this->admin_model->get_by_id($service_id, 'services');

            if ($service->duration_type == 'minute') {
                $interval = $service->duration;
            }else if($service->duration_type == 'hour'){
                $interval = $service->duration * 60;
            }
        }

        $slot = $this->admin_model->get_timeslot_by_day($day_id, $business_id);
        $value['times'] = get_time_slots($interval, $slot->start, $slot->end);
        $value['breaks'] = get_time_by_days($day_id, $business_id);

        $value['day_id'] = $day_id;
        $value['date'] = $date;
        $data = array();
        $data['result'] = $this->load->view('include/time_loop', $value, TRUE);
        if (empty($value['times'])) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        die(json_encode($data));
    }

    public function booking($slug)
    {   
        $data = array();
        $data['slug'] = $slug;
        $data['menu'] = FALSE;
        $data['company'] = $this->common_model->get_by_slug($slug, 'business');
        $data['user'] = $this->common_model->get_by_id($data['company']->user_id, 'users');
        $my_days = $this->admin_model->get_my_days($data['company']->uid);
        
        foreach ($my_days as $day) {
            if ($day['day'] != 0) {
                $myday[] = $day['day'];
            }
        }

        $days = "1,2,3,4,5,6,7";         
        $days = explode(',', $days);
        $assign_days = $myday;

        $match = array();
        $nomatch = array();

        foreach($days as $v){     
            if(in_array($v, $assign_days))
                $match[]=$v;
            else
                $nomatch[]=$v;
        }
        $data['not_available'] = $nomatch;
        $data['my_days'] = $my_days;


        $data['page'] = 'Company';
        $data['page_title'] = 'Booking';
        $data['company_id'] = $data['company']->uid;
        if ($data['company']->enable_category == 1) {
            $data['categories'] = $this->common_model->get_category_services($data['company']->uid);
        }else{
            $data['services'] = $this->common_model->get_by_company($data['company']->uid, 'services');
        }

        $data['locations'] = $this->common_model->get_locations(0, $data['company']->uid);
        $data['sub_locations'] = $this->common_model->get_locations(1, $data['company']->uid);

        $data['dialing_codes'] = $this->common_model->select_asc('dialing_codes');
        $data['main_content'] = $this->load->view('templates/style_1/booking', $data, TRUE);
        $this->load->view('index', $data);
    }


    // load currency by ajax
    public function load_sub_location($location_id)
    {
        $sub_locations = $this->common_model->get_sub_locations($location_id);
        if (empty($sub_locations)) {
            echo '<option value="0">'.trans('no-data-found').'</option>';
        }else{
            foreach ($sub_locations as $location) { 
                echo '<option value="'.$location->id.'">'.$location->name.' ('.$location->address.')'. '</option>';
            }
        }
    }
 

    public function load_staff($id)
    {
        $data = array();
        $data['service'] = $this->common_model->get_service_staffs($id);
        $this->session->set_userdata('service_id', $id);

        if (!empty($data['service'])) {
            $loaded = $this->load->view('include/staff_item', $data, true);
            echo json_encode(array('st' => 1, 'loaded' => $loaded));
        }else{
            $loaded = $this->load->view('include/staff_item', $data, true);
            echo json_encode(array('st' => 0, 'loaded' => $loaded));
        }
    }


    public function confirm_booking($slug, $appointment_id)
    {
        $data = array();
        $data['page'] = 'Company';
        $data['page_title'] = 'Booking Confirm';
        $data['menu'] = FALSE;
        $data['slug'] = $slug;
        $data['company'] = $this->common_model->get_by_slug($slug, 'business');
        $data['appointment'] = $this->common_model->get_appointment($appointment_id);
        $data['appointment_id'] = $data['appointment']->user_id;
        $data['user'] = $this->common_model->get_by_id($data['appointment']->user_id, 'users');
        $data['main_content'] = $this->load->view('templates/style_1/booking', $data, TRUE);
        $this->load->view('index', $data);
    }


    public function check_coupon($code, $appointment_id)
    {

        $appointment = $this->common_model->get_by_id($appointment_id, 'appointments');
        $service = $this->common_model->get_by_id($appointment->service_id, 'services');
        $coupon = $this->common_model->get_coupon($code, $appointment->service_id, $appointment->business_id);
        //echo "<pre>"; print_r($coupon); exit();

        if (empty($coupon)) {
            echo json_encode(array('st' => 0, 'msg' => '<i class="fas fa-times-circle"></i> '.trans('invalid-code')));
        } else {
            if (date('Y-m-d') >= $coupon->start_date && date('Y-m-d') <= $coupon->end_date) {
                
                //check coupon limit
                if ($coupon->usages_limit == 0) {
                    echo json_encode(array('st' => 0, 'msg' => '<i class="fas fa-times-circle"></i> '.trans('invalid-code'))); exit();
                }

                if ($coupon->once_per_customer == 1) {
                    $check = $this->common_model->check_coupon_apply($code, $appointment->service_id, $service->business_id, $appointment->customer_id);
                    if (isset($check)) {
                        echo json_encode(array('st' => 0, 'msg' => '<i class="fas fa-times-circle"></i> '.trans('already-applied-code'))); exit();
                    }
                }

                if ($appointment->group_booking != 0) {
                    $price = ($appointment->total_person + 1) * $service->price;
                }else{
                    $price = $service->price;
                }

                //insert apply coupon data
                $data = array(
                    'code' => $code,
                    'discount' => $coupon->discount,
                    'appointment_id' => $appointment->id,
                    'business_id' => $service->business_id,
                    'service_id' => $appointment->service_id,
                    'customer_id' => $appointment->customer_id,
                    'created_at' => my_date_now()
                );
                $this->admin_model->insert($data, 'coupons_apply');

                //update coupon
                $coupon_data = array(
                    'usages_limit' => $coupon->usages_limit - 1,
                    'used' => $coupon->used + 1
                );
                $this->admin_model->edit_option($coupon_data, $coupon->id, 'coupons');
                echo json_encode(array('st' => 1, 'discount' => $coupon->discount, 'total_price' => $price, 'msg' => '<i class="fas fa-check-circle"></i> '.trans('coupon-applied-successfully')));

            }else{
                echo json_encode(array('st' => 0, 'msg' => '<i class="fas fa-times-circle"></i> '.trans('invalid-code')));
            }
        }exit();
        
    }


    public function confirm_pay_info($slug, $id)
    {
        if ($_POST) {
            $data = array(
                'pay_info' => 2,
            );
            $this->admin_model->edit_option($data, $id, 'appointments');
            echo json_encode(array('st' => 1));
        }
    }

    //send comment
    public function book_appointment($slug)
    {   
        $company = $this->common_model->get_by_slug($slug, 'business');
        $id = $company->user_id;
        $is_customer_exist = $this->input->post('is_customer_exist');
        $user = $this->common_model->get_by_id($id, 'users');
        $date = $this->input->post('date');
        $date = date("Y-m-d", strtotime($date));

        if ($_POST) {

            //check reCAPTCHA
            if (!$this->recaptcha_verify_request()) {
                $msg = trans('recaptcha-is-required');
                echo json_encode(array('st'=> 4, 'msg' => $msg)); exit();
            } else {

                if (date('Y-m-d') > $date) {  
                    $msg = trans('please-enter-a-valid-date');
                    echo json_encode(array('st'=>2, 'msg' => $msg)); exit();
                }
            
                if ($is_customer_exist == FALSE) {
                    $this->form_validation->set_rules('phone', trans('phone'), 'required');
                    $this->form_validation->set_rules('new_password', trans('password'), 'required');

                    if ($this->form_validation->run() === false) {
                        $error = strip_tags(validation_errors());
                        echo json_encode(array('st'=>3,'error'=> $error));
                        exit();
                    }
                    
                    $password = hash_password($this->input->post('new_password'));

                } else {
                    $customer = $this->common_model->check_customer($this->input->post('user_name'));
                   
                    if (empty($customer)) {
                        $msg = trans('incorrect-username-or-password');
                        echo json_encode(array('st'=>0, 'msg' => $msg)); exit();
                    }

                    $password = $customer->password;
                    $customer_id = $customer->id;
                }

   
                $mail =  strtolower(trim($this->input->post('email', true)));
                $phone = '+'.$this->input->post('carrierCode', true).''.$this->input->post('phone', true);
                
                $newuser_data=array(
                    'user_id' => $company->user_id,
                    'business_id' => $company->uid,
                    'name' => $this->input->post('name', true),
                    'email' => $this->input->post('email', true),
                    'phone' => $phone,
                    'status' => 1,
                    'image' => 'assets/images/no-photo.png',
                    'thumb' => 'assets/images/no-photo-sm.png',
                    'password' => $password,
                    'created_at' => my_date_now(),
                );

                $newuser_data = $this->security->xss_clean($newuser_data);
                if ($is_customer_exist == FALSE) {

                    $check_phone = $this->auth_model->check_customer_phone($phone);
                    $check_email = $this->auth_model->check_duplicate_email($mail);

                    if ($check_phone){
                        $msg = trans('phone-exist');
                        echo json_encode(array('st'=>6, 'msg' => $msg));
                        exit();
                    } 

                    if ($check_email){
                        $msg = trans('email-exist');
                        echo json_encode(array('st'=>6, 'msg' => $msg));
                        exit();
                    } 

                
                    $customer_id = $this->admin_model->insert($newuser_data, 'customers');
                }


                if ($this->input->post('staff_id') == 0) {
                    $random_staff = $this->common_model->get_random_staffs($company->uid, $this->input->post('service_id'), 'services');
                    $staff_id = $random_staff->id;
                } else {
                    $staff_id = $this->input->post('staff_id');
                }

                if (empty($this->input->post('location_id'))) {
                    $location_id = 0;
                }else{
                   $location_id = $this->input->post('location_id'); 
                }

                if (empty($this->input->post('sub_location_id'))) {
                    $sub_location_id = 0;
                }else{
                    $sub_location_id = $this->input->post('sub_location_id'); 
                }

                if (empty($this->input->post('group_booking'))) {
                    $group_booking = 0;
                    $total_person = 0;
                }else{
                    $group_booking = $this->input->post('group_booking'); 
                    $total_person = $this->input->post('total_person'); 
                }
                

                $booking_data = array(
                    'number' => random_string('numeric',5),
                    'user_id' => $company->user_id,
                    'business_id' => $company->uid,
                    'customer_id' => $customer_id,
                    'service_id' => $this->input->post('service_id', true),
                    'note' => $this->input->post('note'),
                    'location_id' => $location_id,
                    'sub_location_id' => $sub_location_id,
                    'group_booking' => $group_booking,
                    'total_person' => $total_person,
                    'staff_id' => $staff_id,
                    'date' => $this->input->post('date', true),
                    'time' => $this->input->post('time', true),
                    'status' => 0,
                    'pay_info' => $this->input->post('pay_info', true),
                    'created_at' => my_date_now()
                );
                $appointment_id = $this->admin_model->insert($booking_data, 'appointments');


                if ($user->enable_sms_notify == 1) {
                    //send sms
                    $this->load->model('sms_model');
                    $customer = $this->admin_model->get_by_id($customer_id, 'customers');
                    $service = $this->admin_model->get_by_id($this->input->post('service_id'), 'services');
                    $message = 'Appointment '.$company->name.' - '.$service->name.' is booked successfully at '.$this->input->post('date').' '.$this->input->post('time');
                    $response = $this->sms_model->send_user($customer->phone, $message, $user->id);
                }


                if ($is_customer_exist == TRUE) {
                    $exist_customer = $this->auth_model->validate_customer();
                    if(password_verify($this->input->post('old_password'), $exist_customer->password)){
                        $data = array(
                            'id' => $exist_customer->id,
                            'name' => $exist_customer->name,
                            'thumb' => $exist_customer->thumb,
                            'email' =>$exist_customer->email,
                            'role' => 'customer',
                            'parent' => 0,
                            'logged_in' => TRUE
                        );
                        $data = $this->security->xss_clean($data);
                        $this->session->set_userdata($data);
                    
                
                        $url = base_url('company/confirm_booking/'.$slug.'/'.$appointment_id);
                        $msg = trans('appointment-booked-successfully');

                        echo json_encode(array('st'=>1,'url'=> $url, 'msg' => $msg));
                    }else{ 
                        $msg = trans('incorrect-username-or-password');
                        echo json_encode(array('st'=>0, 'msg' => $msg));
                    }
                }else {

                    $register = $this->common_model->get_by_id($customer_id, 'customers');
                    $data = array(
                        'id' => $register->id,
                        'name' => $register->name,
                        'thumb' => $register->thumb,
                        'email' =>$register->email,
                        'role' =>$register->role,
                        'parent' => 0,
                        'logged_in' => TRUE
                    );
                    $data = $this->security->xss_clean($data);
                    $this->session->set_userdata($data);

                    $url = base_url('company/confirm_booking/'.$slug.'/'.$appointment_id);
                    echo json_encode(array('st'=>1,'url'=> $url));
                }
                

            }
        }
    }

}