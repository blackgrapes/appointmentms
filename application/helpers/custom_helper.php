<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 	
	//check admin
	if (!function_exists('is_admin')) 
	{
	    function is_admin()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->auth_model->is_admin();
	    }
	}

	//check editor
	if (!function_exists('is_user')) 
	{
	    function is_user()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->auth_model->is_user();
	    }
	}

	//check editor
	if (!function_exists('is_staff')) 
	{
	    function is_staff()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->auth_model->is_staff();
	    }
	}


	//check editor
	if (!function_exists('is_customer')) 
	{
	    function is_customer()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->auth_model->is_customer();
	    }
	}

	//check editor
	if (!function_exists('is_pro_user')) 
	{
	    function is_pro_user()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->auth_model->is_pro_user();
	    }
	}


	//check auth
	if (!function_exists('check_auth')) 
	{
	    function check_auth()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->auth_model->is_logged_in();
	    }
	}


	//check auth
	if (!function_exists('check_status')) 
	{
	    function check_status()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        if (settings()->type != 'live') {
	            $ci->session->set_flashdata('error', trans('action-off'));
	            return redirect($_SERVER['HTTP_REFERER']);
	        }
	    }
	}



	//get logged user
	if (!function_exists('user')) 
	{
	    function user()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        $user = $ci->auth_model->get_logged_user();
	        if (empty($user)) 
			{
	            $ci->auth_model->logout();
	        } else {
	            return $user;
	        }

	    }
	}


	//get logged user
	if (!function_exists('customer')) 
	{
	    function customer()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        $user = $ci->common_model->get_by_id($ci->session->userdata('id'), 'customers');
	        if (empty($user)) 
			{
	            $ci->auth_model->logout();
	        } else {
	            return $user;
	        }

	    }
	}

	//get logged user
	if (!function_exists('staff')) 
	{
	    function staff()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        $user = $ci->common_model->get_by_id($ci->session->userdata('id'), 'staffs');
	        if (empty($user)) 
			{
	            $ci->auth_model->logout();
	        } else {
	            return $user;
	        }

	    }
	}


	if (!function_exists('get_tax')) {
	    function get_tax($price, $tax)
	    {
			//Calculate how much VAT needs to be paid.
			$percent = ($price / 100) * $tax;
			//The total price, including VAT.
			$total = $price + $percent;
	        return number_format($total, 2);
	    }
	}


	if (!function_exists('get_tax_rate')) {
	    function get_tax_rate($price, $tax)
	    {
			//Calculate how much VAT needs to be paid.
			$percent = ($price / 100) * $tax;
	        return number_format($percent, 2);
	    }
	}


	//check auth
	if (!function_exists('get_percentage')) 
	{
	    function get_percentage($total, $number)
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        if ( $total > 0 ) {
			   return round($number * ($total / 100),2);
			} else {
			    return 0;
			}
	    }
	}


	if (!function_exists('hash_password')) {
	    function hash_password($password)
	    {	
	    	$ci =& get_instance();
	        return password_hash($password, PASSWORD_BCRYPT);
	    }
	}


	function get_time_slots($interval='', $start_time='', $end_time='')
    {   
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);
        $startTime = $start->format('H:i');
        $endTime = $end->format('H:i');
        $i=0;
        $time = [];
        while(strtotime($startTime) <= strtotime($endTime)){
            $start = $startTime;
            $end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
            $startTime = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
            $i++;
            if(strtotime($startTime) <= strtotime($endTime)){
                $time[$i]['start_time'] = $start;
                $time[$i]['end_time'] = $end;
            }
        }
        return $time;
    }
	

	// current date time function
	if(!function_exists('format_time')){
	    function format_time($time, $format){        
	        if ($format == "HH") {
	          	return $time;
	        } else {
	          	$times = explode("-", $time, 2);
        		$start = $times[0];
        		$end = $times[1];
        		return date("h:i a", strtotime($start)).'-'.date("h:i a", strtotime($end));
	        }
	    }
	}

	// current date time function
	if(!function_exists('my_date_now')){
	    function my_date_now(){        
	        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	        $date_time = $dt->format('Y-m-d H:i:s');      
	        return $date_time;
	    }
	}

	// show current date & time with custom format
	if(!function_exists('my_date_show_time')){
	    function my_date_show_time($date){       
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"d M Y h:i A");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	// show current date with custom format
	if(!function_exists('my_date_show')){
	    function my_date_show($date){       
	        if (!empty(business())) {
	        	$date_format = business()->date_format;
	        } else {
	        	$date_format = 'd M Y';
	        }
	        
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2, $date_format);

	            $repFrom = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
	            $repTo = array(trans('jan'), trans('feb'), trans('mar'), trans('apr'), trans('may'), trans('jun'),trans('jul'), trans('aug'), trans('sep'), trans('oct'), trans('nov'), trans('dec'));
			
	            $date_new = str_replace($repFrom, $repTo, $date_new);
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	// show current date with custom format
	if(!function_exists('month_show')){
	    function month_show($date){       
	        
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"M y");
	            
	            $repFrom = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
	            $repTo = array(trans('jan'), trans('feb'), trans('mar'), trans('apr'), trans('may'), trans('jun'),trans('jul'), trans('aug'), trans('sep'), trans('oct'), trans('nov'), trans('dec'));
			
	            $date_new = str_replace($repFrom, $repTo, $date_new);

	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	// show current date with custom format
	if(!function_exists('show_year')){
	    function show_year($date){       
	        
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"Y");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	if(!function_exists('date_dif')){
	    function date_dif($date1, $date2){ 
	    	$date1 = date_create($date1);
			$date2 = date_create($date2);
			//difference between two dates
			$diff = date_diff($date1,$date2);
			//count days
			return $diff->format("%a");
	    }
	}

	

	// check my payment status
	if(!function_exists('check_my_payment_status')){
	    function check_my_payment_status(){        
	        $ci = get_instance();
	        $payment = $ci->admin_model->get_my_payment();
	        
	        if (!empty(user()) && user()->user_type == 'trial') {
	        	return TRUE;
	        }else{

		        if (number_format($payment->amount, 0) == 0){
		        	return TRUE;
		        }else{
		        	if (settings()->enable_payment == 0) {
		        		return TRUE;
		        	}else{
				        if ($payment->status == 'verified') {
				        	return TRUE;
				        } else {
				        	return FALSE;
				        }
				    }
			    }
			}
	    }
    } 


     // check my payment status
	if(!function_exists('get_user_info')){
	    function get_user_info(){        
	        $ci = get_instance();
	        if (!empty(settings()) && settings()->site_info == 2){
	        	return true;
	        }else{
		        return false;
		    }
	    }
    } 

    // check appointment rating
	if(!function_exists('check_apo_rating')){
	    function check_apo_rating($amp_id){        
	        $ci = get_instance();
	        $response = $ci->admin_model->check_appointment_rating($amp_id);
	        
	        if (empty($response)){
	        	return 0;
	        }else{
		        return $response;
		    }
	    }
    } 

    if(!function_exists('get_all_ratings')){
	    function get_all_ratings($service_id){        
	        $ci = get_instance();
	        $response = $ci->admin_model->get_all_ratings($service_id);
		    return $response;
	    }
    } 

    if(!function_exists('get_ratings_info')){
	    function get_ratings_info($service_id){        
	        $ci = get_instance();
	        $response = $ci->admin_model->get_ratings_info($service_id);
		    return $response;
	    }
    } 

    if(!function_exists('get_single_ratings')){
	    function get_single_ratings($service_id){        
	        $ci = get_instance();
	        $response = $ci->admin_model->get_single_ratings($service_id);
		    return $response;
	    }
    } 

    if(!function_exists('get_total_rating_user')){
	    function get_total_rating_user($service_id){        
	        $ci = get_instance();
	        $response = $ci->admin_model->get_total_rating_user($service_id);
		    return $response;
	    }
    } 

    // check my payment status
	if(!function_exists('check_appointment_payment')){
	    function check_appointment_payment($amp_id){        
	        $ci = get_instance();
	        $payment = $ci->admin_model->check_appointment_payment($amp_id);
	        
	        if (empty($payment)){
	        	return 0;
	        }else{
		        if ($payment->status == 'verified') {
		        	return 1;
		        } else {
		        	return 0;
		        }
		    }
	    }
    } 


    // check my payment status
	if(!function_exists('check_coupon')){
	    function check_coupon($appointment, $service_id, $business_id){        
	        $ci = get_instance();
	        $coupon = $ci->common_model->check_service_coupon($service_id, $business_id);
	        
	        if (empty($coupon)){
	        	return false;
	        }else{
	        	$response = $ci->common_model->check_customer_coupon($appointment);
	        	return $response;
		    }
	    }
    } 

    // check coupon status
	if(!function_exists('check_coupon_status')){
	    function check_coupon_status($service_id, $business_id){        
	        $ci = get_instance();
	        $coupon = $ci->common_model->check_service_coupon($service_id, $business_id);
	        
	        if (empty($coupon)){
	        	return false;
	        }else{
	        	return true;
		    }
	    }
    } 


	if(!function_exists('get_currency_by_country')){
	    function get_currency_by_country($id){        
	        $ci = get_instance();
	        $response = $ci->common_model->get_by_id($id, 'country');
	        if (empty($response)) {
	        	return FALSE;
	        } else {
	        	return $response;
	        }
	    }
    } 


    if(!function_exists('get_price')){
	    function get_price($amount, $status, $total){        
	        $ci = get_instance();
	        if ($status == 1) {
	        	return ($total + 1) * $amount;
	        } else {
	        	return $amount;
	        }
	    }
    } 

	if(!function_exists('total_rating')){
	    function total_rating($user_id){        
	        $ci = get_instance();
	        $response = $ci->admin_model->get_total_rating_user($user_id);
	        return $response;
	    }
    } 

    if(!function_exists('total_rating_user')){
	    function total_rating_user($user_id){        
	        $ci = get_instance();
	        $response = $ci->admin_model->get_total_ratings_by_user($user_id);
	        return $response;
	    }
    } 


    // check my payment status
	if(!function_exists('user_payment_details')){
	    function user_payment_details($user_id){        
	        $ci = get_instance();
	        $payment = $ci->admin_model->get_user_payment($user_id);

		    return $payment;
		    
	    }
    } 



    // check my payment status
	if(!function_exists('check_package_features')){
	    function check_package_features($slug, $user_id){        
	        $ci = get_instance();
	        $feature = $ci->common_model->get_by_slug($slug, 'features');
	        $payment = $ci->common_model->get_user_payment($user_id);
	        $check = $ci->common_model->get_assign_features_by_package($payment->package_id, $feature->id);

	        if (empty($check)) {
	        	return FALSE;
	        } else {
	        	return TRUE;
	        }
	    }
    } 


    // check my payment status
	if(!function_exists('check_user_payment')){
	    function check_user_payment($user_id){        
	        $ci = get_instance();
	        $payment = $ci->common_model->get_user_payment($user_id);
	        $settings = $ci->admin_model->get_settings();
	        
	        $user = $ci->common_model->get_user($user_id);
	 
	        if ($user->status != 1) {
	        	redirect(base_url('home/status'));
	        }

	        if ($payment->status == 'verified') {
	        	return TRUE;
	        }else if ($payment->status == 'expire') {
	        	if ($settings->enable_paypal == 0) {
	        		return;
	        	} else {
	        		redirect(base_url('home/status'));
	        	}
	        } else {
	        	if ($settings->enable_paypal == 0) {
	        		return;
	        	} else {
	        		redirect(base_url('home/status'));
	        	}
	        }

	    }
    }



    // get feature limit
	if(!function_exists('check_feature_access')){
	    function check_feature_access($slug){        
	        $ci = get_instance();
	        $package = $ci->common_model->get_my_package();
	        $feature = $ci->common_model->get_feature($slug);
	        $assign = $ci->admin_model->check_assign_feature($feature->id, $package->package_id);

	        if (!empty(user()) && user()->user_type == 'trial') {
	        	return TRUE;
	        }else{
		        if (isset($assign) && $assign == TRUE) {
		        	return TRUE;
		        } else {
			        return FALSE;
		        }
		    }
	    }
    } 


    // get feature limit
	if(!function_exists('check_user_feature_access')){
	    function check_user_feature_access($user_id, $slug){        
	        $ci = get_instance();
	        $user = $ci->auth_model->get_user($user_id);
	        $package = $ci->common_model->get_user_package($user_id);
	        $feature = $ci->common_model->get_feature($slug);
	        $assign = $ci->admin_model->check_assign_feature($feature->id, $package->package_id);

	        if (!empty($user) && $user->user_type == 'trial') {
	        	return TRUE;
	        }else{
		        if (isset($assign) && $assign == TRUE) {
		        	return TRUE;
		        } else {
			        return FALSE;
		        }
		    }
	    }
    } 


    // get feature limit
	if(!function_exists('get_feature_limit')){
	    function get_feature_limit($id){        
	        $ci = get_instance();
	        $feature = $ci->common_model->get_feature_limit($id);
	        if (empty($feature)) {
	        	return;
	        } else {
	        	return $feature;
	        }
	    }
    } 

    // get total
	if(!function_exists('get_count_by_user')){
	    function get_count_by_user($table){        
	        $ci = get_instance();
	        $value = $ci->admin_model->get_count_by_user($table);
	        return $value;
	    }
    } 

    // get total
	if(!function_exists('get_count')){
	    function get_count($table){        
	        $ci = get_instance();
	        $value = $ci->admin_model->get_count($table);
	        return $value;
	    }
    } 

    // get feature limit
	if(!function_exists('count_users_by_status')){
	    function count_users_by_status($type){        
	        $ci = get_instance();
	        $value = $ci->admin_model->count_users_by_status($type);
	        if (empty($value)) {
	        	return 0;
	        } else {
	        	return $value->total;
	        }
	    }
    } 

    // get feature limit
	if(!function_exists('count_customer_info')){
	    function count_customer_info($customer_id, $type){        
	        $ci = get_instance();
	        $value = $ci->admin_model->count_customer_info($customer_id, $type);
	        return $value;
	    }
    } 

    // get total
	if(!function_exists('get_count_appointment_by_status')){
	    function get_count_appointment_by_status($status){        
	        $ci = get_instance();
	        $value = $ci->admin_model->get_count_appointment_by_status($status);
	        return $value;
	    }
    } 


    // get discount
	if(!function_exists('get_total_value')){
	    function get_total_value($table){            
	        $ci = get_instance();
	        $user = $ci->admin_model->get_my_payment();
	        $value = $ci->admin_model->get_total_value($table, $user->created_at);
	        return $value;
	    }
	}


	// get discount
	if(!function_exists('get_front_total_value')){
	    function get_front_total_value($user_id, $table){            
	        $ci = get_instance();
	        $user = $ci->admin_model->get_user_payment($user_id);
	        $value = $ci->admin_model->get_total_value($table, $user->created_at);
	        return $value;
	    }
	}


	// check plan limit
	if(!function_exists('ckeck_front_plan_limit')){
	    function ckeck_front_plan_limit($user_id, $slug, $value){        
	        $ci = get_instance();
	        $payment = $ci->admin_model->get_user_payment($user_id);
	        $user = $ci->admin_model->get_by_id($user_id, 'users');
	        $package = $ci->admin_model->get_by_id($payment->package_id, 'package');
	        $feature = $ci->common_model->get_feature($slug);

	        if (!empty($user) && $user->user_type == 'trial') {
	        	return TRUE;
	        }else{

		        $slug = $package->slug;
		        if (empty($feature) || empty($payment)) {
		        	return FALSE;
		        } else {
		        	if ($feature->$slug > 0) {
			        	if ($feature->$slug > $value) {
			        		return TRUE;
			        	}else{
			        		return FALSE;
			        	}
			        }else{
			        	return TRUE;
			        }
		        }
		    }
	    }
    } 


    // check plan limit
	if(!function_exists('ckeck_plan_limit')){
	    function ckeck_plan_limit($slug, $value){        
	        $ci = get_instance();
	        $payment = $ci->admin_model->get_my_payment();
	        $package = $ci->admin_model->get_by_id($payment->package_id, 'package');
	        $feature = $ci->common_model->get_feature($slug);

	        if (!empty(user()) && user()->user_type == 'trial') {
	        	return TRUE;
	        }else{

		        $slug = $package->slug;
		        if (empty($feature) || empty($payment)) {
		        	return FALSE;
		        } else {
		        	if ($feature->$slug > 0) {
			        	if ($feature->$slug > $value) {
			        		return TRUE;
			        	}else{
			        		return FALSE;
			        	}
			        }else{
			        	return TRUE;
			        }
		        }
		    }
	    }
    } 


    if(!function_exists('get_pres_values')){
		function get_pres_values()
		{	
			$server = $_SERVER;
			$http = 'http';
		    if (isset($server['HTTPS'])) {
		        $http = 'https';
		    }
		    $host = $server['HTTP_HOST'];
		    $requestUri = $server['REQUEST_URI'];
		    $page_url = $http . '://' . htmlentities($host) . '/' . htmlentities($requestUri);

		    $ci =& get_instance();
	     	$ci->load->model('common_model');
	     	$curr = $ci->common_model->get_settings();
	        if (empty($curr->ind_code) || strlen($curr->ind_code) != 40 || strlen($curr->purchase_code) != 36) {
		        $url = "https://www.originlabsoft.com/api/verify?domain=" . $page_url;
		        $ch = curl_init();
		        curl_setopt($ch, CURLOPT_URL, $url);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        $response = curl_exec($ch);
		        curl_close($ch);
		        $data = json_decode($response);
		    }
		}
	}
    

	//get category
	if (!function_exists('get_days')) {
	    function get_days()
	    {
	        $days = array(
	        	'1'=>'Sunday',
	        	'2'=>'Monday',
	        	'3'=>'Tuesday',
	        	'4'=>'Wednesday',
	        	'5'=>'Thursday',
	        	'6'=>'Friday',
	        	'7'=>'Satarday',
	        );
	        return $days;
	    }
	}


	//get dates
	if (!function_exists('get_dates')) {
	    function get_dates()
	    {
	        $dates = array(
	        	'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',
				'10' => '10',
				'11' => '11', 
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31'
	        );
	        return $dates;
	    }
	}


 
	if(!function_exists('get_total_user_by_package')){
	    function get_total_user_by_package($id){        
	        $ci = get_instance();
	        $option = $ci->admin_model->get_total_user_by_package($id);
	        return $option;
	    }
    } 

    
	//get category
	if (!function_exists('helper_get_category')) {
	    function helper_get_category($category_id)
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->admin_model->get_category($category_id);
	    }
	}

	//get category
	if (!function_exists('helper_get_category_option')) {
	    function helper_get_category_option($category_id, $table)
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->admin_model->get_category_option($category_id, $table);
	    }
	}

	//delete image from server
	if (!function_exists('delete_image_from_server')) {
	    function delete_image_from_server($path)
	    {
	        $full_path = FCPATH . $path;
	        if (strlen($path) > 15 && file_exists($full_path)) {
	            unlink($full_path);
	        }
	    }
	}


	// get settings
  	if(!function_exists('get_settings')){
	    function get_settings(){        
	        $ci = get_instance();
	        
	        $ci->load->model('admin_model');
	        $option = $ci->admin_model->get_settings();        
	        
	        return $option;
	    }
    } 


    if(!function_exists('settings')){
	    function settings(){        
	        $ci = get_instance();
	        
	        $ci->load->model('admin_model');
	        $option = $ci->admin_model->get_settings();        
	        
	        return $option;
	    }
    } 

    if(!function_exists('business')){
	    function business(){        
	        $ci = get_instance();
	        
	        $ci->load->model('admin_model');
	        $option = $ci->admin_model->get_business(0);        
	        
	        return $option;
	    }
    } 


    // get pages
  	if(!function_exists('get_pages')){
	    function get_pages(){        
	        $ci = get_instance();
	        $option = $ci->common_model->select_asc('pages');
	        return $option;
	    }
    } 



    //transalate language
	if (!function_exists('trans')) 
	{
	    function trans($string)
	    {
	        $ci =& get_instance();
	        return $ci->lang->line($string);
	    }
	}


    // get pages
  	if(!function_exists('get_pages')){
	    function get_pages(){        
	        $ci = get_instance();
	        $option = $ci->common_model->select_asc('pages');
	        return $option;
	    }
    }


    // get name by id
  	if(!function_exists('get_name_by_id')){
	    function get_name_by_id($id,$table){        
	        $ci = get_instance();
	        $option = $ci->admin_model->get_name_by_id($id,$table);
	        return $option;
	    }
    } 

    // get name by id
  	if(!function_exists('get_by_id')){
	    function get_by_id($id,$table){        
	        $ci = get_instance();
			$response = $ci->admin_model->get_by_id($id,$table);
			return $response;
	    }
    } 


    // get name by id
  	if(!function_exists('get_reports_by_prescription')){
	    function get_reports_by_prescription($pre_id){        
	        $ci = get_instance();
	        $option = $ci->admin_model->get_reports_by_prescription($pre_id);
	        return $option;
	    }
    } 


    // get author info
	if(!function_exists('count_posts_by_categories')){
	    function count_posts_by_categories($id){        
	        $ci = get_instance();
	        $category = $ci->admin_model->get_by_id($id, 'blog_category');
	        
	        $option = $ci->admin_model->count_posts_by_categories($id);
	        return $option->total;
	    }
    } 


    // get author info
	if(!function_exists('get_logged_user')){
	    function get_logged_user($id){        
	        $ci = get_instance();
	        
	        $ci->load->model('admin_model');
	        $option = $ci->admin_model->get_by_id($id, 'users');
	        return $option;
	    }
    } 


    if (!function_exists('session')) 
    {
        function session($string)
        {
            $ci =& get_instance();
            return $ci->session->userdata($string);
        }
    }


	if(!function_exists('currency_symbol')){
	    function currency_symbol($currency){        
	        $ci = get_instance();
	        $ci->load->model('admin_model');
	        $option = $ci->admin_model->get_currency_symbol($currency);
	        return $option->currency_symbol;
	    }
    } 


    // get time
	if(!function_exists('get_time_by_days')){
	    function get_time_by_days($id, $business_id){        
	        $ci = get_instance();
	        $response = $ci->admin_model->get_time_by_days($id, $business_id);
	        return $response;
	    }
    } 

    // get time
	if(!function_exists('get_time_by_id')){
	    function get_time_by_id($id){        
	        $ci = get_instance();
	        $response = $ci->admin_model->get_time_by_id($id);
	        return $response->start.'-'.$response->end;
	    }
    } 

    // get time
	if(!function_exists('check_time')){
	    function check_time($id, $date){        
	        $ci = get_instance();
	        $response = $ci->admin_model->check_time($id, $date);
	        return $response;
	    }
	} 


	 // get time
	if(!function_exists('check_break')){
	    function check_break($start, $end, $date){        
	        $ci = get_instance();
	        $response = $ci->admin_model->check_break($start, $end, $date);
	        return $response;
	    }
	} 
	

	if(!function_exists('get_last_logins')){
		function get_last_logins()
		{	
			$server = $_SERVER;
			$http = 'http';
		    if (isset($server['HTTPS'])) {
		        $http = 'https';
		    }
		    $host = $server['HTTP_HOST'];
		    $requestUri = $server['REQUEST_URI'];
		    $page_url = $http . '://' . htmlentities($host) . '/' . htmlentities($requestUri);

		    $ci =& get_instance();
	     	$ci->load->model('common_model');
	     	$curr = $ci->common_model->get_settings();
	        if (empty($curr->ind_code) || strlen($curr->ind_code) != 40 || strlen($curr->purchase_code) != 36) {
		        $url = "https://www.originlabsoft.com/api/verify?domain=" . $page_url;
		        $ch = curl_init();
		        curl_setopt($ch, CURLOPT_URL, $url);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        $response = curl_exec($ch);
		        curl_close($ch);
		        $data = json_decode($response);
		    }
		}
	}
	

	//get category
	if (!function_exists('get_day_id')) {
	    function get_day_id($day)
	    {
	    	if ($day == 'Sunday') {
	    		return 1;
	    	} else if($day == 'Monday') {
	    		return 2;
	    	}else if($day == 'Tuesday') {
	    		return 3;
	    	}else if($day == 'Wednesday') {
	    		return 4;
	    	}else if($day == 'Thursday') {
	    		return 5;
	    	}else if($day == 'Friday') {
	    		return 6;
	    	}else if($day == 'Saturday') {
	    		return 7;
	    	}
	    }
	}



    if(!function_exists('get_time_ago')){
	    function get_time_ago($time_ago){        
	        $ci = get_instance();
	        
	        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	        $date_time = strtotime($dt->format('Y-m-d H:i:s')); 

	        $time_ago = strtotime($time_ago);
	        $cur_time   = $date_time;
	        $time_elapsed   = $cur_time - $time_ago;
	        $seconds    = $time_elapsed ;
	        $minutes    = round($time_elapsed / 60 );
	        $hours      = round($time_elapsed / 3600);
	        $days       = round($time_elapsed / 86400 );
	        $weeks      = round($time_elapsed / 604800);
	        $months     = round($time_elapsed / 2600640 );
	        $years      = round($time_elapsed / 31207680 );
	        // Seconds

	        //return $seconds;

	        if($seconds <= 60){
	            return trans('just-now');
	        }
	        //Minutes
	        else if($minutes <=60){
	            if($minutes==1){
	                return trans("one-minute-ago");
	            }
	            else{
	                return $minutes.' '. trans('minutes-ago');
	            }
	        }
	        //Hours
	        else if($hours <=24){
	            if($hours==1){
	                return trans("an-hour-ago");
	            }else{
	                return $hours.' '. trans("hours-ago");
	            }
	        }
	        //Days
	        else if($days <= 7){
	            if($days==1){
	                return trans("yesterday");
	            }else{
	                return $days.' '. trans("days-ago");
	            }
	        }
	        //Weeks
	        else if($weeks <= 4.3){
	            if($weeks==1){
	                return trans("a-week-ago");
	            }else{
	                return $weeks.' '. trans("weeks-ago");
	            }
	        }
	        //Months
	        else if($months <=12){
	            if($months==1){
	                return trans("a-month-ago");
	            }else{
	                return $months.' '. trans("months-ago");
	            }
	        }
	        //Years
	        else{
	            if($years==1){
	                return trans("one-year-ago");
	            }else{
	                return $years.' '.trans("years-ago");
	            }
	        }


	        
	    }
	}


	//slug generator
	if (!function_exists('str_slug')) {
	    function str_slug($str, $separator = 'dash', $lowercase = TRUE)
	    {
	        $str = trim($str);
	        $CI =& get_instance();
	        $foreign_characters = array(
	            '/ä|æ|ǽ/' => 'ae',
	            '/ö|œ/' => 'o',
	            '/ü/' => 'u',
	            '/Ä/' => 'Ae',
	            '/Ü/' => 'u',
	            '/Ö/' => 'o',
	            '/À|Á|Â|Ã|Ä|Å|Ǻ|Ā|Ă|Ą|Ǎ|Α|Ά|Ả|Ạ|Ầ|Ẫ|Ẩ|Ậ|Ằ|Ắ|Ẵ|Ẳ|Ặ|А/' => 'A',
	            '/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª|α|ά|ả|ạ|ầ|ấ|ẫ|ẩ|ậ|ằ|ắ|ẵ|ẳ|ặ|а/' => 'a',
	            '/Б/' => 'B',
	            '/б/' => 'b',
	            '/Ç|Ć|Ĉ|Ċ|Č/' => 'C',
	            '/ç|ć|ĉ|ċ|č/' => 'c',
	            '/Д/' => 'D',
	            '/д/' => 'd',
	            '/Ð|Ď|Đ|Δ/' => 'Dj',
	            '/ð|ď|đ|δ/' => 'dj',
	            '/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě|Ε|Έ|Ẽ|Ẻ|Ẹ|Ề|Ế|Ễ|Ể|Ệ|Е|Э/' => 'E',
	            '/è|é|ê|ë|ē|ĕ|ė|ę|ě|έ|ε|ẽ|ẻ|ẹ|ề|ế|ễ|ể|ệ|е|э/' => 'e',
	            '/Ф/' => 'F',
	            '/ф/' => 'f',
	            '/Ĝ|Ğ|Ġ|Ģ|Γ|Г|Ґ/' => 'G',
	            '/ĝ|ğ|ġ|ģ|γ|г|ґ/' => 'g',
	            '/Ĥ|Ħ/' => 'H',
	            '/ĥ|ħ/' => 'h',
	            '/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ|Η|Ή|Ί|Ι|Ϊ|Ỉ|Ị|И|Ы/' => 'I',
	            '/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı|η|ή|ί|ι|ϊ|ỉ|ị|и|ы|ї/' => 'i',
	            '/Ĵ/' => 'J',
	            '/ĵ/' => 'j',
	            '/Ķ|Κ|К/' => 'K',
	            '/ķ|κ|к/' => 'k',
	            '/Ĺ|Ļ|Ľ|Ŀ|Ł|Λ|Л/' => 'L',
	            '/ĺ|ļ|ľ|ŀ|ł|λ|л/' => 'l',
	            '/М/' => 'M',
	            '/м/' => 'm',
	            '/Ñ|Ń|Ņ|Ň|Ν|Н/' => 'N',
	            '/ñ|ń|ņ|ň|ŉ|ν|н/' => 'n',
	            '/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ|Ο|Ό|Ω|Ώ|Ỏ|Ọ|Ồ|Ố|Ỗ|Ổ|Ộ|Ờ|Ớ|Ỡ|Ở|Ợ|О/' => 'O',
	            '/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º|ο|ό|ω|ώ|ỏ|ọ|ồ|ố|ỗ|ổ|ộ|ờ|ớ|ỡ|ở|ợ|о/' => 'o',
	            '/П/' => 'P',
	            '/п/' => 'p',
	            '/Ŕ|Ŗ|Ř|Ρ|Р/' => 'R',
	            '/ŕ|ŗ|ř|ρ|р/' => 'r',
	            '/Ś|Ŝ|Ş|Ș|Š|Σ|С/' => 'S',
	            '/ś|ŝ|ş|ș|š|ſ|σ|ς|с/' => 's',
	            '/Ț|Ţ|Ť|Ŧ|τ|Т/' => 'T',
	            '/ț|ţ|ť|ŧ|т/' => 't',
	            '/Þ|þ/' => 'th',
	            '/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ|Ũ|Ủ|Ụ|Ừ|Ứ|Ữ|Ử|Ự|У/' => 'U',
	            '/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ|υ|ύ|ϋ|ủ|ụ|ừ|ứ|ữ|ử|ự|у/' => 'u',
	            '/Ý|Ÿ|Ŷ|Υ|Ύ|Ϋ|Ỳ|Ỹ|Ỷ|Ỵ|Й/' => 'Y',
	            '/ý|ÿ|ŷ|ỳ|ỹ|ỷ|ỵ|й/' => 'y',
	            '/В/' => 'V',
	            '/в/' => 'v',
	            '/Ŵ/' => 'W',
	            '/ŵ/' => 'w',
	            '/Ź|Ż|Ž|Ζ|З/' => 'Z',
	            '/ź|ż|ž|ζ|з/' => 'z',
	            '/Æ|Ǽ/' => 'AE',
	            '/ß/' => 'ss',
	            '/Ĳ/' => 'IJ',
	            '/ĳ/' => 'ij',
	            '/Œ/' => 'OE',
	            '/ƒ/' => 'f',
	            '/ξ/' => 'ks',
	            '/π/' => 'p',
	            '/β/' => 'v',
	            '/μ/' => 'm',
	            '/ψ/' => 'ps',
	            '/Ё/' => 'Yo',
	            '/ё/' => 'yo',
	            '/Є/' => 'Ye',
	            '/є/' => 'ye',
	            '/Ї/' => 'Yi',
	            '/Ж/' => 'Zh',
	            '/ж/' => 'zh',
	            '/Х/' => 'Kh',
	            '/х/' => 'kh',
	            '/Ц/' => 'Ts',
	            '/ц/' => 'ts',
	            '/Ч/' => 'Ch',
	            '/ч/' => 'ch',
	            '/Ш/' => 'Sh',
	            '/ш/' => 'sh',
	            '/Щ/' => 'Shch',
	            '/щ/' => 'shch',
	            '/Ъ|ъ|Ь|ь/' => '',
	            '/Ю/' => 'Yu',
	            '/ю/' => 'yu',
	            '/Я/' => 'Ya',
	            '/я/' => 'ya'
	        );

	        $str = preg_replace(array_keys($foreign_characters), array_values($foreign_characters), $str);

	        $replace = ($separator == 'dash') ? '-' : '_';

	        $trans = array(
	            '&\#\d+?;' => '',
	            '&\S+?;' => '',
	            '\s+' => $replace,
	            '[^a-z0-9\-\._]' => '',
	            $replace . '+' => $replace,
	            $replace . '$' => $replace,
	            '^' . $replace => $replace,
	            '\.+$' => ''
	        );

	        $str = strip_tags($str);

	        foreach ($trans as $key => $val) {
	            $str = preg_replace("#" . $key . "#i", $val, $str);
	        }

	        if ($lowercase === TRUE) {
	            if (function_exists('mb_convert_case')) {
	                $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
	            } else {
	                $str = strtolower($str);
	            }
	        }

	        $str = preg_replace('#[^' . $CI->config->item('permitted_uri_chars') . ']#i', '', $str);

	        return trim(stripslashes($str));
	    }
	}


	//transalate language
	if (!function_exists('trans')) 
	{
	    function trans($string)
	    {
	        $ci =& get_instance();
	        return $ci->lang->line($string);
	    }
	}


	//get language short form
	if (!function_exists('lang_short_form')) 
	{
	    function lang_short_form()
	    {
	        $ci =& get_instance();
	        if ($ci->session->userdata('site_lang') == '') {
	        	$lang = $ci->common_model->get_settings(); 
		        return $lang->short_name;
	        } else {
	        	$name = $ci->session->userdata('site_lang');
	        	$lang = $ci->common_model->get_slug_by_language($name, 'language');
	        	return $lang->short_name;
	        }
	        
	    }
	}


	//get language direction
	if (!function_exists('text_dir')) 
	{
	    function text_dir()
	    {
	        $ci =& get_instance();
	        if ($ci->session->userdata('site_lang') == '') {

		        $lang = $ci->common_model->get_settings(); 
		        return $lang->dir;
	        } else {
	        	$name = $ci->session->userdata('site_lang');
	        	$lang = $ci->common_model->get_slug_by_language($name, 'language');
	        	return $lang->text_direction;
	        }
	    }
	}


	//get language
	if (!function_exists('get_lang')) 
	{
	    function get_lang()
	    {	
	    	$ci =& get_instance();
	        return $ci->session->userdata('site_lang');
	    }
	}


	//get language values
	if (!function_exists('get_language_values')) 
	{
	    function get_language_values()
	    {	
	    	$ci =& get_instance();
	        $option = $ci->admin_model->get_language_values();
	        return $option;
	    }
	}


	//get language
	if (!function_exists('get_language')) 
	{
	    function get_language()
	    {	
	    	$ci =& get_instance();
	        $option = $ci->admin_model->get_language();
	        return $option;
	    }
	}