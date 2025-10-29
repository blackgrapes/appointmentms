
<?php $total = get_front_total_value($user->id, 'appointments'); ?>
<?php if (ckeck_front_plan_limit($user->id, 'appointments', $total) == TRUE): ?>
<section class="bg-lights p-4">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10 col-xl-8">
                <?php if (isset($page_title) && $page_title == 'Booking'): ?>
                    <h4 class="mb-2"><?php echo trans('easy-step-booking-title') ?></h4>
                    <p class="w-100 w-lg-80 mx-auto mb-0"><?php echo trans('easy-step-booking-details') ?>.</p>
                <?php endif ?>

                <?php if (isset($page_title) && $page_title == 'Booking Confirm'): ?>
                    <h4 class="mb-2"><?php echo trans('confirm-booking-details') ?></h4>
                    <p class="w-100 w-lg-80 mx-auto mb-0"><?php echo trans('you-are-almost-done') ?></p>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
<?php endif ?>


<section class="pt-0 mt-4 mb-4 <?php if(settings()->site_info == 3){echo "d-none";} ?>">
    <div class="container minh-600">
        <div class="row justify-content-center">
            <div class="col-lg-8 card shadow-light br-10 <?php if (ckeck_front_plan_limit($user->id, 'appointments', $total) == FALSE){echo 'mt-200';} ?>">

                <!-- booking form area -->
                <?php if (isset($page_title) && $page_title == 'Booking'): ?>
                    <!-- Form -->
                    <form id="booking_form" method="post" action="<?php echo base_url('company/book_appointment/'.$slug); ?>">
                    
                        <?php if (ckeck_front_plan_limit($user->id, 'appointments', $total) == FALSE): ?>
                            <div class="booking_step_1s text-center">
                                <p class="pt-4 lead text-muted"><i class="lni lni-ban"></i> <br> <?php echo trans('booking-is-temporary-unavailable') ?></p>
                            </div>
                        <?php else: ?>

                            <div class="mb-4 mt-4 text-center">
                                <div class="success text-success"></div>
                                <div class="success_extend text-success"></div>
                                <div class="error text-danger"></div>
                                <div class="warning text-warning"></div>
                            </div>

                            <div class="booking_step_1">
                                <div class="row">

                                    <?php if ($company->enable_location == 1): ?>
                                    <div class="col-md-12 mb-2 text-left">
                                        <h5 class="mb-2 h5"><?php echo trans('locations') ?> </h5>
                                    </div>

                                    <div class="col-md-6" data-aos="fade-up" data-aos-duration="100">
                                        <div class="form-group">
                                          <label class="control-label" for="example-input-normal"><?php echo trans('location') ?> <span class="text-danger">*</span></label>
                                          <select class="form-control custom-select location" name="location_id">
                                              <option value=""><?php echo trans('select') ?></option>
                                              <?php foreach ($locations as $location): ?>
                                                  <option value="<?php echo html_escape($location->id); ?>">
                                                    <?php echo html_escape($location->name); ?>
                                                  </option>
                                              <?php endforeach ?>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 sub_area d-hide">
                                        <div class="form-group">
                                          <label class="control-label" for="example-input-normal"><?php echo trans('branches') ?> </label>
                                          <select class="form-control custom-select sub_location" name="sub_location_id" disabled>
                                              
                                          </select>
                                        </div>
                                    </div>
                                    <?php endif; ?>


                                    <div class="col-md-12 mb-2 mt-4 text-left">
                                        <h5 class="mb-2 h5"><?php echo trans('select-service') ?> </h5>
                                    </div>

                                    <?php if ($company->enable_category == 1): ?>
                                        <div class="col-md-12">
                                            <div class="service-wrap">
                                            <?php $c=1; foreach ($categories as $category): ?>
                                                   
                                                <p class="mb-2 lead fs-15 font-weight-bold" data-aos="fade-up" data-aos-duration="<?php echo html_escape($c*100) ?>"><?php echo html_escape($category->name) ?></p>
                                                
                                                <?php $e=1; foreach ($category->services as $service): ?>
                                                    <label class="service-rdo" data-aos="fade-up" data-aos-duration="<?php echo html_escape($e*150) ?>">
                                                        <input type="radio" name="service_id" class="service_input" value="<?php echo html_escape($service->id) ?>"/>
                                                        <div class="d-flex justify-content-between py-2 align-items-center mb-1 m-0">
                                                            <div class="col-auto mb-sm-0">
                                                                <div class="media service_item">
                                                                    <img alt="Service" src="<?php echo base_url($service->image) ?>" class="shadow-sm  mr-4">
                                                                    <div class="media-body">
                                                                        <h5 class="text-dark mb-0 pt-1 h6"><?php echo html_escape($service->name) ?></h5>
                                                                        <small class="d-block text-dark-75"> <?php echo html_escape($service->duration).' '.trans($service->duration_type); ?> 
                                                                            <span class="mr-2"></span> 
                                                                            
                                                                            <!-- <?php if ($service->capacity == -1){echo "Unlimited";}else{echo html_escape($service->capacity);} ?> <?php echo trans('person') ?> --> 
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-auto text-sm-right">
                                                                <span class="service-price badge badge-secondary-soft badge-pill">
                                                                    <?php if ($service->price == 0): ?>
                                                                        <?php echo trans('free') ?>
                                                                    <?php else: ?>
                                                                        <?php if($company->curr_locate == 0){echo get_currency_by_country($company->country)->currency_symbol;} ?> <?php echo number_format($service->price, $company->num_format) ?> <?php if($company->curr_locate == 1){echo get_currency_by_country($company->country)->currency_symbol;} ?>
                                                                    <?php endif ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                <?php $e++; endforeach; ?>
                                                
                                            <?php $c++; endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    

                                    <?php if ($company->enable_category == 0): ?>
                                    <div class="col-md-12">
                                        <?php $e=1; foreach ($services as $service): ?>
                                            <label class="service-rdo" data-aos="fade-up" data-aos-duration="<?php echo html_escape($e*150) ?>">
                                                <input type="radio" name="service_id" class="service_input" value="<?php echo html_escape($service->id) ?>"/>
                                                <div class="d-flex justify-content-between py-2 align-items-center mb-4 m-0">
                                                    <div class="col-auto mb-sm-0">
                                                        <div class="media service_item">
                                                            <img alt="Service" src="<?php echo base_url($service->image) ?>" class="shadow-sm  mr-4">
                                                            <div class="media-body">
                                                                <h5 class="text-dark mb-0 pt-1 h6"><?php echo html_escape($service->name) ?></h5>
                                                                <small class="d-block text-dark-75"> <?php echo html_escape($service->duration).' '.trans($service->duration_type); ?> 
                                                                    <span class="mr-2"></span> 
                                                                    
                                                                    <!-- <?php if ($service->capacity == -1){echo "Unlimited";}else{echo html_escape($service->capacity);} ?> <?php echo trans('person') ?>  -->
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-auto text-sm-right">
                                                        <span class="service-price badge badge-secondary-soft badge-pill">
                                                            <?php if ($service->price == 0): ?>
                                                                <?php echo trans('free') ?>
                                                            <?php else: ?>
                                                                <?php if($company->curr_locate == 0){echo get_currency_by_country($company->country)->currency_symbol;} ?> <?php echo number_format($service->price, $company->num_format) ?> <?php if($company->curr_locate == 1){echo get_currency_by_country($company->country)->currency_symbol;} ?>
                                                            <?php endif ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </label>
                                        <?php $e++; endforeach; ?>
                                    </div>
                                    <?php endif ?>

                                </div>
                            

                                <input type="hidden" class="enable_staff" value="<?php echo html_escape($company->enable_staff); ?>">
                                <div class="row text-center pt-4 <?php if($company->enable_staff == 1){echo "d-show";}else{echo "d-hide";} ?>" id="load_staff_data">
                                    
                                </div>


                                <?php if ($company->enable_group == 1): ?>
                                    <div class="mt-4">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" value="1" name="group_booking" class="group_booking custom-control-input" id="switch-2">
                                            <label class="ccb custom-control-label font-weight-bold" for="switch-2"> <?php echo trans('bringing-anyone-with-you') ?> </label>
                                        </div>
                                        <div class="mt-3 person_area dnone">
                                            <div class="form-group mb-4">
                                              <label class="control-label" for="example-input-normal"><?php echo trans('additional-persons') ?></label>
                                              <select class="form-control custom-select" name="total_person">
                                                  <?php for ($i=1; $i <= $company->total_person; $i++) { ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?> <?php if($i == 1){echo trans('person');}else{echo trans('persons');} ?></option>
                                                  <?php } ?>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>


                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                        <input type="hidden" name="serviceId" class="serviceId" value="">
                                        <button type="button" class="btn btn-secondary btn-block step1_btn" disabled><?php echo trans('continue') ?> <i class="fas fa-long-arrow-alt-right"></i></button>
                                    </div>
                                </div>

                            </div>

                        <?php endif ?>



                        <div class="booking_step_2 dnone">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mb-4 h5"><?php echo trans('select-date-time') ?></h5>

                                    <div id="datepickers"></div>
                                </div>

                                <div class="col-md-6 p-0 text-center">
                                    <div id="load_data"></div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 d-flex justify-content-between">
                                    <input type="hidden" class="booking_date" name="date" value="">
                                    <button type="button" class="btn btn-secondary mr-2 pull-left step2_back_btn"><i class="fas fa-long-arrow-alt-left"></i> <?php echo trans('back') ?> </button>
                                    <button type="button" class="btn btn-primary step2_btn" disabled><?php echo trans('continue') ?> <i class="fas fa-long-arrow-alt-right"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        

                        <div class="booking_step_3 dnone">
                            
                            <ul class="nav nav-pills mb-3 mb-3 mt-4 justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item mr-2 mb-2">
                                    <a class="nav-link active click_new" id="one-tab" data-toggle="pill" href="#one" role="tab" aria-controls="One" aria-selected="true"><i class="fas fa-user-plus"></i> <?php echo trans('new-registration') ?></a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link click_old" id="two-tab" data-toggle="pill" href="#two" role="tab" aria-controls="two" aria-selected="false"><i class="fas fa-user-check"></i> <?php echo trans('already-have-account') ?></a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active mt-6" id="one" role="tabpanel" aria-labelledby="one-tab">
                                    <div class="row p-0">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo trans('name') ?></label>
                                                <input type="text" class="form-control" name="name" placeholder="<?php echo trans('your-full-name') ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1"><?php echo trans('phone') ?> <span class="text-danger">*</span></label>
                                                        <div class="input-phone"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo trans('email') ?></label>
                                                <input type="text" class="form-control" name="email" placeholder="<?php echo trans('your-email-address') ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group mb-5">
                                                <label><?php echo trans('password') ?> <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="new_password" placeholder="<?php echo trans('your-password') ?>">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="tab-pane fade show mt-6" id="two" role="tabpanel" aria-labelledby="two-tab">
                                    <div class="row p-0">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo trans('phone') ?> / <?php echo trans('email') ?></label>
                                                <input type="text" class="form-control" name="user_name" placeholder="<?php echo trans('your-email') ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group mb-5">
                                                <label><?php echo trans('password') ?></label>
                                                <input type="password" class="form-control" name="old_password" placeholder="<?php echo trans('your-password') ?>">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">

                                    <div class="col-12 mb-4">
                                        <a href="javascript:;" class="fs-15 mb-2 badge badge-secondary-soft badge-pill note_btn"><?php echo trans('any-special-notes') ?></a>
                                        <textarea class="form-control mt-2 note_area d-hide" name="note" rows="2" placeholder="<?php echo trans('write-your-notes-here') ?>"></textarea>
                                    </div>
                                
                                    <div class="col-12">
                                        <?php if (settings()->enable_captcha == 1 && settings()->captcha_site_key != ''): ?>
                                            <div class="g-recaptcha pull-left" data-sitekey="<?php echo html_escape(settings()->captcha_site_key); ?>"></div>
                                        <?php endif ?>
                                    </div>

                                    <!-- csrf token -->
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">


                                    <input type="hidden" class="is_customer_exist" name="is_customer_exist" value="0">
                                    <div class="col-12 d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary step3_back_btn"><i class="fas fa-long-arrow-alt-left"></i> <?php echo trans('back') ?> </button>
                                        <button type="submit" class="btn btn-primary step3_btn"><?php echo trans('continue') ?> <i class="fas fa-long-arrow-alt-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <!-- End Form -->
                <?php endif; ?>


                <!-- booking confirm area -->
                <?php if (isset($page_title) && $page_title == 'Booking Confirm'): ?>
                    <div class="booking_confirm">
                        <div class="row" data-aos="fade-up" data-aos-duration="150">
                            <div class="col-md-6">
                                <p class="mb-0"><?php echo trans('booking-number') ?> </p>
                                <h4># <?php echo html_escape($appointment->number) ?></h4>
                            </div>

                            <div class="col-md-6 text-right">
                                <button type="button" class="btn btn-outline-secondary btn-sm mt-3 d-none"><i class="fas fa-print"></i> Print</button>
                            </div>
                        </div>
                    
                        <div class="row mt-4" data-aos="fade-up" data-aos-duration="250">
                            <div class="col-md-12 mb-2 text-left">
                                <h5 class="mb-2 h5 info-title"><?php echo trans('booking-info') ?></h5>
                            </div>
                            
                            <div class="col-md-6 mb-2 text-left">
                                <p class="small mb-0"><i class="fas fa-calendar-alt"></i> <?php echo trans('date') ?></p>
                                <p class="text-dark font-weight-normal"> <?php echo my_date_show($appointment->date) ?></p>
                            </div>
                
                            <div class="col-md-6 mb-2 text-left">
                                <p class="small mb-0"><i class="far fa-clock"></i> <?php echo trans('time') ?></p>
                              
                                <p class="text-dark font-weight-normal"> <?php echo format_time($appointment->time, $company->time_format) ?></p>
                            </div>

                            <div class="col-md-6 mb-2 text-left">
                                <p class="small mb-0"><?php echo trans('service') ?></p>
                                <p class="text-dark font-weight-normal"><?php echo html_escape($appointment->service_name) ?></p>
                            </div>

                            <div class="col-md-6 mb-2 text-left">
                                <?php if (!empty($appointment->staff_name)): ?>
                                    <p class="small mb-0"><?php echo trans('staff') ?></p>
                                    <p class="text-dark font-weight-normal"><?php echo html_escape($appointment->staff_name) ?></p>
                                <?php endif ?>
                            </div>

                            <?php if ($appointment->group_booking != 0): ?>
                                <div class="col-md-6 mb-2 text-left">
                                    <p class="small mb-0"><?php echo trans('group-booking') ?></p>
                                    <p class="text-dark font-weight-normal"><?php echo trans('yes') ?></p>
                                </div>

                                <div class="col-md-6 mb-2 text-left">
                                    <?php if (!empty($appointment->staff_name)): ?>
                                        <p class="small mb-0"><?php echo trans('additional-persons') ?></p>
                                        <p class="text-dark font-weight-normal"><?php echo html_escape($appointment->total_person) ?></p>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="row mt-4" data-aos="fade-up" data-aos-duration="400">
                            <div class="col-md-12 mb-2 text-left">
                                <h5 class="mb-2 h5 info-title"><?php echo trans('customer-info') ?></h5>
                            </div>
                            
                            <div class="col-md-6 mb-2 text-left">
                                <p class="small mb-0"><?php echo trans('name') ?></p>
                                <p class="text-dark font-weight-bold"><?php echo html_escape($appointment->customer_name) ?></p>
                            </div>

                            <div class="col-md-6 mb-2 text-left">
                                <p class="small mb-0"><?php echo trans('email') ?></p>
                                <p class="text-dark font-weight-bold"><?php echo html_escape($appointment->customer_email) ?></p>
                            </div>
                        </div>
                        
                        <div class="row mt-4" data-aos="fade-up" data-aos-duration="550">
                            <div class="col-md-12 mb-2 text-left">
                                <h5 class="mb-2 h5 info-title"><?php echo trans('payment-info') ?></h5>
                            </div>


                            <?php include APPPATH.'views/include/coupon_section.php'; ?>

                            
                            <?php if (check_user_feature_access($company->user_id, 'get-online-payments') == TRUE && $appointment->price != 0 && get_user_info() == TRUE): ?>
                                <div class="col-md-6 mb-2 text-left <?php if($company->enable_payment == 1){echo "d-show";}else{echo "d-hide";} ?>">
                                    <label class="staff-rdo bg-primary-soft">
                                        <input type="radio" name="pay_info" class="pay_info" value="1" />
                                        <div class="bg-lights py-4 rounded-sm text-center payment_option">
                                            <i class="far fa-credit-card fa-2x text-muted"></i>
                                            <h6 class="mb-0 mt-2 text-dark-45 text-muted"><?php echo trans('pay-now') ?></h6>
                                        </div>
                                    </label>
                                </div>
                            <?php endif ?>

                            <div class="col-md-6 mb-2 text-left <?php if($company->enable_onsite == 1){echo "d-show";}else{echo "d-hide";} ?>">
                                <label class="staff-rdo bg-primary-soft">
                                    <input type="radio" name="pay_info" class="pay_info" value="2" />
                                    <div class="bg-lights py-4 rounded-sm text-center payment_option">
                                        <i class="far fa-clock fa-2x text-muted"></i>
                                        <h6 class="mb-0 mt-2 text-dark-45 text-muted"><?php echo trans('pay-on-site') ?></h6>
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-12 mt-4 payments_area dnone">
                                <?php $this->load->view('include/payment_section.php');?>
                            </div>
                    
                            <div class="col-md-12 mt-4 dnone confirm_area">
                                <button type="button" data-id="<?php echo html_escape($appointment->id) ?>" data-val="<?php echo html_escape($slug) ?>" class="btn btn-primary btn-block confirm_pay_info"><i class="fas fa-check-circle"></i> <?php echo trans('confirm-booking') ?> </button>
                            </div>
                            
                        </div>

                    </div>
                <?php endif ?>
     
            </div>
        </div>
    </div>
</section>