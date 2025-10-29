
<div class="content-wrapper">
  <div class="content pt-4 mb-4">
    <div class="container-fluid">
      <div class="row box-dash-areas">
        
        <!-- /.col -->
        <div class="col">
          <div class="info-box p-2">
            <span class="info-box-icon info-box-icon-md bg-primary-soft"><i class="far fa-calendar-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-number"><?php echo get_count_appointment_by_status('all') ?></span>
              <span class="info-box-text"><?php echo trans('appointments') ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col">
          <div class="info-box p-2">
            <span class="info-box-icon info-box-icon-md bg-warning-soft"><i class="far fa-clock"></i></span>
            <div class="info-box-content">
              <span class="info-box-number"><?php echo get_count_appointment_by_status('0') ?></span>
              <span class="info-box-text"><?php echo trans('pending') ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
        <div class="col">
          <div class="info-box p-2">
            <span class="info-box-icon info-box-icon-md bg-success-soft"><i class="far fa-calendar-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-number"><?php echo get_count_appointment_by_status('1') ?></span>
              <span class="info-box-text"><?php echo trans('approved') ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <!-- /.col -->
        <div class="col">
          <div class="info-box p-2">
            <span class="info-box-icon info-box-icon-md bg-info-soft"><i class="fas fa-check-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-number"><?php echo get_count_appointment_by_status('3') ?></span>
              <span class="info-box-text"><?php echo trans('completed') ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
        <div class="col">
          <div class="info-box p-2">
            <span class="info-box-icon info-box-icon-md bg-danger-soft"><i class="far fa-calendar-times"></i></span>
            <div class="info-box-content">
              <span class="info-box-number"><?php echo get_count_appointment_by_status('2') ?></span>
              <span class="info-box-text"><?php echo trans('rejected') ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


      </div>
    </div>
  </div>



  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-6">
            <div class="card add_area <?php if(isset($page_title) && $page_title == "Edit"){echo "d-block";}else{echo "hide";} ?>">
              <div class="card-header with-border">
                <?php if (isset($page_title) && $page_title == "Edit"): ?>
                  <h3 class="card-title pt-2"><?php echo trans('edit') ?></h3>
                <?php else: ?>
                  <h3 class="card-title pt-2"><?php echo trans('new-appointment') ?> </h3>
                <?php endif; ?>

                <div class="card-tools pull-right">
                  <?php if (isset($page_title) && $page_title == "Edit"): ?>
                    <a href="<?php echo base_url('admin/appointment') ?>" class="pull-right btn btn-secondary btn-sm"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a>
                  <?php else: ?>
                    <a href="#" class="text-right btn btn-secondary cancel_btn btn-sm"><?php echo trans('appointments') ?></a>
                  <?php endif; ?>
                </div>
              </div>


              <form method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('admin/appointment/add')?>" role="form" novalidate>

                <div class="card-body">
                    <div class="form-group">
                      <label><?php echo trans('services') ?> <span class="text-danger">*</span></label>
                      <select class="form-control select2s" name="service_id" required>
                          <option value=""><?php echo trans('services') ?></option>
                          <?php foreach ($services as $service): ?>
                            <option value="<?php echo html_escape($service->id) ?>" <?php if (isset($appointment[0]['service_id']) && $appointment[0]['service_id'] == $service->id){echo "selected";} ?>><?php echo html_escape($service->name) ?></option>
                          <?php endforeach ?>                 
                      </select>
                    </div>
                  
                    <div class="form-group">
                      <label><?php echo trans('customers') ?> <span class="text-danger">*</span></label>
                      <select class="form-control select2s" name="customer_id" required>
                          <option value=""><?php echo trans('customers') ?></option>
                          <?php foreach ($customers as $customer): ?>
                            <option value="<?php echo html_escape($customer->id) ?>" <?php if (isset($appointment[0]['customer_id']) && $appointment[0]['customer_id'] == $customer->id){echo "selected";} ?>><?php echo html_escape($customer->name) ?></option>
                          <?php endforeach ?>                 
                      </select>
                    </div>
                  
                    <div class="form-group">
                      <label><?php echo trans('staffs') ?> <span class="text-danger"><?php if($this->business->enable_staff == 1){echo "*";} ?></span></label>
                      <select class="form-control select2s" name="staff_id" <?php if($this->business->enable_staff == 1){echo "required";} ?>>
                          <option value=""><?php echo trans('staffs') ?></option>
                          <?php foreach ($staffs as $staff): ?>
                            <option value="<?php echo html_escape($staff->id) ?>" <?php if (isset($appointment[0]['staff_id']) && $appointment[0]['staff_id'] == $staff->id){echo "selected";} ?>><?php echo html_escape($staff->name) ?></option>
                          <?php endforeach ?>                 
                      </select>
                    </div>

                    <div class="form-group">
                      <label><?php echo trans('status') ?> <span class="text-danger">*</span></label>
                      <select name="status" class="form-control" required> 
                        <option value="0" <?php if (isset($appointment[0]['status']) && $appointment[0]['status'] == 0){echo "selected";} ?>> <?php echo trans('pending') ?></option>
                        <option value="1" <?php if (isset($appointment[0]['status']) && $appointment[0]['status'] == 1){echo "selected";} ?>> <?php echo trans('approved') ?></option>
                        <option value="2" <?php if (isset($appointment[0]['status']) && $appointment[0]['status'] == 2){echo "selected";} ?>> <?php echo trans('rejected') ?></option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label><?php echo trans('date') ?> <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <input type="text" name="date" class="form-control datepicker" required placeholder="<?php echo trans('booking-date') ?>" autocomplete="off" value="<?php if (isset($appointment[0]['date'])){echo html_escape($appointment[0]['date']);} ?>" required>
                        <span class="input-group-append">
                          <button type="button" class="btn btn-default"><i class="fas fa-calendar-alt"></i></button>
                        </span>
                      </div>
                    </div>

                    <div class="row mb-4">

                    <?php if(isset($page_title) && $page_title == 'Edit'): ?>
                      <?php list ($start_time, $end_time) = explode('-', trim($appointment[0]['time'])); ?>
                    <?php endif; ?>

                      <div class="col-sm-6">
                          <label><?php echo trans('start-time') ?> <span class="text-danger">*</span></label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                              </div>
                              <input type="text" class="form-control timepicker" name="start_time" value="<?php if (isset($start_time)){echo html_escape($start_time);} ?>" autocomplete="off">
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <label><?php echo trans('end-time') ?> <span class="text-danger">*</span></label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                              </div>
                              <input type="text" class="form-control timepicker" name="end_time" value="<?php if (isset($end_time)){echo html_escape($end_time);} ?>" autocomplete="off">
                          </div>
                      </div>
                    </div>

                    <?php if (isset($page_title) && $page_title != "Edit"): ?>
                      <div class="form-group">
                        <div class="icheck-success d-inline">
                          <input type="checkbox" id="checkboxPrimary2" name="notify_customer" value="1">
                          <label for="checkboxPrimary2"> <span class="small"><?php echo trans('notify-customers') ?></span>
                          </label>
                        </div>
                      </div>
                    <?php endif; ?>

                </div>

                <div class="card-footer">
                    <input type="hidden" name="id" value="<?php if(isset($appointment[0]['id'])){echo html_escape($appointment[0]['id']);} ?>">
                    <!-- csrf token -->
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                    <?php if (isset($page_title) && $page_title == "Edit"): ?>
                      <button type="submit" class="btn btn-primary pull-left"> <?php echo trans('save-changes') ?></button>
                    <?php else: ?>
                      <button type="submit" class="btn btn-primary pull-left"> <?php echo trans('save') ?></button>
                    <?php endif; ?>
                </div>

              </form>

            </div>
        </div>
      </div>


      <?php if (isset($page_title) && $page_title != 'Edit'): ?>
        <div class="list_area">
          
          <div class="row">
            <div class="col-lg-12">
              <div class="card list_area">
                <div class="card-header">
                  <?php if (isset($page_title) && $page_title == "Edit"): ?>
                    <h3 class="card-title pt-2">Edit <a href="<?php echo base_url('admin/pages') ?>" class="pull-right btn btn-secondary btn-sm"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a></h3>
                  <?php else: ?>
                    <h3 class="card-title pt-2"><?php echo trans('appointments') ?></h3>
                  <?php endif; ?>

                  <div class="card-tools pull-right d-flex justify-content-between">
                    <div>
                      <form method="get" class="sort_form" action="<?php echo base_url('admin/appointment') ?>">
                        <select name="range" class="nice_select small xs customs mr-2 sort">
                          <option value="0"> <?php echo trans('all') ?></option>
                          <option value="<?php echo date('Y-m-d') ?>" <?php if (isset($_GET['range']) && $_GET['range'] == date('Y-m-d')){echo "selected";} ?>> <?php echo trans('today') ?></option>
                          <option value="<?php echo date('Y-m-d', strtotime('+1 days')) ?>" <?php if (isset($_GET['range']) && $_GET['range'] == date('Y-m-d', strtotime('+1 days'))){echo "selected";} ?>> <?php echo trans('tomorrow') ?></option>
                          <option value="<?php echo date('Y-m-d', strtotime('+7 days')) ?>" <?php if (isset($_GET['range']) && $_GET['range'] == date('Y-m-d', strtotime('+7 days'))){echo "selected";} ?>> <?php echo trans('next-7-days') ?></option>
                          <option value="<?php echo date('Y-m-d', strtotime('+15 days')) ?>"<?php if (isset($_GET['range']) && $_GET['range'] == date('Y-m-d', strtotime('+15 days'))){echo "selected";} ?>> <?php echo trans('next-15-days') ?></option>
                        </select>
                      </form>
                    </div>

                     <div>
                      <a href="#" class="pull-right btn btn-outline-primary btn-sm add_btn mr-1"><i class="fa fa-plus"></i> <span class="d-none d-md-inline"><?php echo trans('new-appointment') ?></span></a>
                      <a href="#" class="filter-action pull-right btn btn-outline-primary btn-sm"><i class="fas fa-filter"></i></a>
                    </div>

                  </div>
                </div>

                <div class="filter_popup showFilter">
                  <p class="leads mb-3"><?php echo trans('filters') ?></p>
                  <form method="get" class="sort_forms" action="<?php echo base_url('admin/appointment') ?>">

                    <div class="row">
                      <div class="col-md-12 mb-3">     
                        <div class="form-group mb-0">
                          <label class="mb-0"><?php echo trans('services') ?></label>
                          <select class="nice_select small wide" name="service" aria-invalid="false">
                              <option value=""><?php echo trans('all') ?></option>
                              <?php foreach ($services as $service): ?>
                                <option value="<?php echo html_escape($service->id) ?>" <?php if (isset($_GET['service']) && $_GET['service'] == $service->id){echo "selected";} ?>><?php echo html_escape($service->name) ?></option>
                              <?php endforeach ?>                 
                          </select>
                        </div>
                      </div>
                    
                      <div class="col-md-12 mb-3">   
                        <div class="form-group mb-0">
                          <label class="mb-0"><?php echo trans('customers') ?></label>
                          <select class="nice_select small wide mt-2" name="customer" aria-invalid="false">
                              <option value=""><?php echo trans('all') ?></option>
                              <?php foreach ($customers as $customer): ?>
                                <option value="<?php echo html_escape($customer->id) ?>" <?php if (isset($_GET['customer']) && $_GET['customer'] == $customer->id){echo "selected";} ?>><?php echo html_escape($customer->name) ?></option>
                              <?php endforeach ?>                 
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12 mb-3">   
                        <div class="form-group mb-0">
                          <label class="mb-0"><?php echo trans('staffs') ?></label>
                          <select class="nice_select small wide mt-2" name="staff" aria-invalid="false">
                              <option value=""><?php echo trans('all') ?></option>
                              <?php foreach ($staffs as $staff): ?>
                                <option value="<?php echo html_escape($staff->id) ?>" <?php if (isset($_GET['staff']) && $_GET['staff'] == $staff->id){echo "selected";} ?>><?php echo html_escape($staff->name) ?></option>
                              <?php endforeach ?>                 
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12 mb-1">   
                        <div class="form-group mb-0">
                          <label><?php echo trans('status') ?></label>
                          <select class="nice_select small wide mb-2" name="status" aria-invalid="false">
                              <option value=""><?php echo trans('all') ?></option>
                              <option value="0" <?php if (isset($_GET['status']) && $_GET['status'] == 0){echo "selected";} ?>> <?php echo trans('pending') ?></option>
                              <option value="1" <?php if (isset($_GET['status']) && $_GET['status'] == 1){echo "selected";} ?>> <?php echo trans('approved') ?></option>
                              <option value="2" <?php if (isset($_GET['status']) && $_GET['status'] == 2){echo "selected";} ?>> <?php echo trans('rejected') ?></option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12">   
                        <div class="form-group mb-0 mt-2">
                          <input type="text" name="search" class="form-control form-control-sm" placeholder="<?php echo trans('search') ?>">
                          <a href="<?php echo base_url('admin/appointment') ?>" class="btn btn-default btn-xs pull-right mt-1"><i class="fas fa-redo-alt"></i> <?php echo trans('reset') ?></a>
                        </div>
                      </div>
                      
                      <div class="col-md-12">   
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-block btn-sm"><?php echo trans('submit') ?></button>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
                  

                <div class="card-body table-responsive p-0">

                  <?php if (empty($appointments)): ?>
                    <?php $this->load->view('admin/include/not-found') ?>
                  <?php else: ?>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo trans('service') ?></th>
                                <th><?php echo trans('date-time') ?></th>
                                <th><?php echo trans('locations') ?></th>
                                <th><?php echo trans('customer') ?></th>
                                <th><?php echo trans('staff') ?></th>
                                <th><?php echo trans('payment') ?></th>
                                <?php if (check_feature_access('zoom-meeting') == TRUE): ?>
                                  <th><?php echo trans('zoom-meeting') ?></th>
                                <?php endif; ?>

                                <?php if ($this->business->enable_group == 1): ?>
                                  <th><?php echo trans('group-booking') ?></th>
                                <?php endif; ?>

                                <th><?php echo trans('status') ?></th>
                                <th><?php echo trans('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a=1; foreach ($appointments as $appointment): ?>
                                <tr id="row_<?php echo html_escape($appointment->id) ?>">
                                    <th><?php echo html_escape($a) ?></th>
                                    <td>
                                        <?php if (check_apo_rating($appointment->id) != 0): ?>
                                              <?php $rating = check_apo_rating($appointment->id); ?>
                                              <?php for($i = 1; $i <= 5; $i++):?>
                                                <?php 
                                                if($i > $rating->rating){
                                                  $star = 'far fa-star';
                                                }else{
                                                  $star = 'fas fa-star';
                                                }
                                                ?>
                                                <i class="<?php echo $star;?> text-warning fs-12"></i> 
                                              <?php endfor;?>
                                        <?php endif; ?>
                                        <p class="mb-0 font-weight-bold"><?php echo html_escape($appointment->service_name) ?></p>
                                        <p class="mb-0 fs-13 text-muted"><?php echo html_escape($appointment->duration).' '.trans($appointment->duration_type); ?></p>
                                    </td>

                                    <td>
                                        <p class="mb-1"><span class="badge-custom badge-secondary-soft mb-1"><i class="far fa-calendar"></i> <?php echo my_date_show($appointment->date) ?></span></p>
                                        <p class="mb-0"><span class="badge-custom badge-secondary-soft"><i class="far fa-clock"></i> <?php echo format_time($appointment->time, $this->business->time_format) ?></span></p>
                                    </td>

                                    <td>
                                        <?php if ($appointment->location_id != 0): ?>
                                            <p class="mb-1">
                                                <?php echo get_by_id($appointment->location_id, 'locations')->name ?>
                                            </p>
                                        <?php endif ?>
                                        <?php if ($appointment->sub_location_id != 0): ?>
                                            <p class="mb-0"><?php echo get_by_id($appointment->sub_location_id, 'locations')->name ?> (<?php echo get_by_id($appointment->sub_location_id, 'locations')->address ?>)</p>
                                        <?php endif ?>
                                    </td>

                                    <td>
                                      <div class="d-flex">
                                        <div class="mr-3">
                                          <img class="img-circle mt-1" width="40px" src="<?php echo base_url($appointment->customer_thumb) ?>">
                                        </div>
                                        <div>
                                          <p class="mb-0 font-weight-bold"><?php echo html_escape($appointment->customer_name) ?></p>
                                          <p class="mb-0 text-muted"><?php echo html_escape($appointment->customer_phone) ?></p>
                                          <p class="mb-0 text-muted"><?php echo html_escape($appointment->customer_email) ?></p>
                                        </div>
                                      </div>
                                    </td>

                                    <td>
                                      <?php if (!empty($appointment->staff_name)): ?>
                                        <img class="img-circle mr-2" width="40px" src="<?php echo base_url($appointment->staff_thumb) ?>"> <?php echo html_escape($appointment->staff_name) ?>
                                      <?php endif ?>
                                    </td>
                                   
                                    <td>
                                      <p class="mb-1 fs-14">
                                          <?php 
                                              $check_coupon = check_coupon($appointment->id, $appointment->service_id, $appointment->business_id);
                                              if ($check_coupon != FALSE):
                                                  if (!empty($check_coupon)):
                                                      $price =  get_price($appointment->price, $appointment->group_booking, $appointment->total_person);
                                                      $discount = $check_coupon->discount;
                                                      $amount = $price - ($price * ($discount / 100));
                                                      $discount_amount = $price - $totalCost;
                                                  else:
                                                      $price =  get_price($appointment->price, $appointment->group_booking, $appointment->total_person);
                                                      $discount = 0;
                                                      $discount_amount = 0;
                                                      $amount = $price;
                                                  endif;
                                              else:
                                                  $discount = 0;
                                                  $amount =  get_price($appointment->price, $appointment->group_booking, $appointment->total_person);
                                              endif;
                                            ?>

                                          <span class="badge badge-primary-soft">
                                            <?php if ($appointment->price == 0): ?>
                                                Free
                                            <?php else: ?>
                                                <?php if($this->business->curr_locate == 0){echo $this->business->currency_symbol;} ?>
                                                <?php echo number_format($amount, $this->business->num_format) ?>
                                                <?php if($this->business->curr_locate == 1){echo $this->business->currency_symbol;} ?>
                                            <?php endif ?>
                                          </span>

                                          <?php if ($discount != 0): ?>
                                            <span class="badge badge-secondary-soft">
                                                <?php echo html_escape($discount) ?>% <?php echo trans('off') ?>
                                            </span>
                                          <?php endif ?>
                                      </p>

                                      <?php $check_payment = check_appointment_payment($appointment->id) ?>
                                        <?php if ($check_payment == true): ?>
                                          <p class="mb-1"><span class="badge badge-success"><i class="fas fa-check-circle"></i> <?php echo trans('paid') ?></span></p>
                                        <?php else: ?>
                                          <?php if ($appointment->price != 0): ?>
                                            <p class="mb-1"><span class="badge-custom badge-danger-soft"><i class="far fa-clock"></i> <?php echo trans('pending') ?></span></p>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                    </td>

                                    <?php if (check_feature_access('zoom-meeting') == TRUE): ?>
                                    <td>
                                      <?php if (!empty($appointment->zoom_link)): ?>
                                          <span class="badge badge-success-soft"><i class="fas fa-check-circle"></i> <?php echo trans('yes') ?></span>
                                      <?php else: ?>
                                          <span class="badge badge-secondary-soft"><?php echo trans('no') ?></span>
                                      <?php endif ?>
                                    </td>
                                    <?php endif; ?>


                                    <?php if ($this->business->enable_group == 1): ?>
                                    <td>
                                        <?php if ($appointment->group_booking != 0): ?>
                                          <p class="mb-1"><span class="badge badge-primary-soft" title="<?php echo trans('group-booking') ?>"><i class="fas fa-users"></i> <?php echo $appointment->total_person + 1 ?> </span></p>
                                        <?php else: ?>
                                          <p class="mb-1"><span class="badge badge-secondary-soft"><i class="fas fa-times-circle"></i> <?php echo trans('no') ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <?php endif; ?>

                                    <td>
                                        <select data-id="<?php echo html_escape($appointment->id) ?>" name="" class="nice_select small custom active_status <?php if ($appointment->status == 0){echo "br-warning";}elseif($appointment->status == 1){echo "br-success";}elseif($appointment->status == 2){echo "br-danger";}else{echo "br-primary";} ?>">
                                          <option value="0" <?php if ($appointment->status == 0){echo "selected";} ?>> <?php echo trans('pending') ?></option>
                                          <option value="1" <?php if ($appointment->status == 1){echo "selected";} ?>> <?php echo trans('approved') ?></option>
                                          <option value="2" <?php if ($appointment->status == 2){echo "selected";} ?>> <?php echo trans('rejected') ?></option>
                                          <option value="3" <?php if ($appointment->status == 3){echo "selected";} ?>> <?php echo trans('completed') ?></option>
                                        </select>
                                    </td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-tool" data-toggle="dropdown" aria-expanded="false">
                                              <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu" >
                                              <?php if (check_apo_rating($appointment->id) != 0): ?>
                                                <a data-toggle="modal" href="#ratingModal_<?php echo $a ?>" class="dropdown-item"><i class="far fa-star mr-1"></i> <?php echo trans('review') ?></a>
                                              <?php endif; ?>

                                              <?php if ($check_payment == false): ?>
                                                <a href="#paymentModal_<?= $a; ?>" data-toggle="modal" class="dropdown-item"><i class="lni lni-coin mr-1"></i> <?php echo trans('record-payment') ?></a>
                                              

                                                <?php if ($appointment->customer_phone != '' && user()->twillo_account_sid != ''): ?>
                                                  <a data-id="<?php echo html_escape($appointment->id); ?>" href="<?php echo base_url('admin/appointment/notify_customer/'.$appointment->id) ?>" class="dropdown-item notify_customer"><i class="far fa-paper-plane mr-1"></i> <?php echo trans('send-sms-reminder') ?></a>
                                                <?php endif; ?>
                                              <?php endif; ?>
                                              
                                              <a href="<?php echo base_url('admin/appointment/edit/'.html_escape($appointment->id));?>" class="dropdown-item"><i class="lni lni-pencil mr-1"></i> <?php echo trans('edit') ?></a>

                                              <a data-val="Category" data-id="<?php echo html_escape($appointment->id); ?>" href="<?php echo base_url('admin/appointment/delete/'.html_escape($appointment->id));?>" class="dropdown-item delete_item"><i class="lni lni-trash-can mr-1"></i> <?php echo trans('delete') ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php $a++; endforeach ?>
                        </tbody>
                    </table>
                  <?php endif ?>
                </div>

              </div>

              <div class="mt-4">
                <?php echo $this->pagination->create_links(); ?>
              </div>
              
            </div>
          </div>
        </div>
      <?php endif ?>

    </div>
  </div>
</div>





<!-- Modal -->

<?php $j=1; foreach ($appointments as $appointment): ?>

<div class="modal fade d-hide" id="ratingModal_<?= $j; ?>" aria-hidden="true">
  <div class="modal-dialog">
  
    <form method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('customer/add_rating')?>" role="form" novalidate>
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">
            <?php echo trans('customer-feedback') ?>
        </h4>
          <div class="mclose" data-dismiss="modal"><i class="lnib lni-close"></i></div>
        </div>

        <div class="modal-body">
            
          <?php $rating = check_apo_rating($appointment->id); ?>
          <?php for ($i=0; $i < $rating->rating; $i++) { ?>
              <i class="fas fa-star text-warning"></i>
          <?php } ?>
          <p class="mt-2 lead"><?php echo $rating->feedback ?></p>
       
        </div>

        <?php if (check_apo_rating($appointment->id) == 0): ?>
        <div class="modal-footer justify-content-between">
          <input type="hidden" name="appointment_id" value="<?php echo $appointment->id ?>">
          <!-- csrf token -->
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
          <button type="submit" class="btn btn-primary"><?php echo trans('save') ?></button>
        </div>
        <?php endif; ?>

      </div>
    </form>

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php $j++; endforeach; ?>


<?php $i=1; foreach ($appointments as $appointment): ?>

<div class="modal fade d-hide" id="paymentModal_<?= $i; ?>" aria-hidden="true">
  <div class="modal-dialog">
  
    <form method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('admin/payment/record_payment/'.$appointment->id)?>" role="form" novalidate>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?php echo trans('record-payment') ?> - <?php echo html_escape($appointment->service_name); ?></h4>
          <div class="mclose" data-dismiss="modal"><i class="lnib lni-close"></i></div>
        </div>

        <?php 
          $check_coupon = check_coupon($appointment->id, $appointment->service_id, $appointment->business_id);
          if ($check_coupon != FALSE):
              if (!empty($check_coupon)):
                  $price =  get_price($appointment->price, $appointment->group_booking, $appointment->total_person);
                  $discount = $check_coupon->discount;
                  $amount = $price - ($price * ($discount / 100));
                  $discount_amount = $price - $totalCost;
              else:
                  $price =  get_price($appointment->price, $appointment->group_booking, $appointment->total_person);
                  $discount = 0;
                  $discount_amount = 0;
                  $amount = $price;
              endif;
          else:
              $amount =  get_price($appointment->price, $appointment->group_booking, $appointment->total_person);
          endif;
         ?>
        <div class="modal-body">
          <div class="form-group">
            <label><?php echo trans('price') ?> <span class="text-danger">*</span></label>
            <input type="text" class="form-control" required name="price" value="<?php echo number_format($amount, $this->business->num_format) ?>" disabled>
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <!-- csrf token -->
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
          <button type="submit" class="btn btn-primary"><?php echo trans('save') ?></button>
        </div>
      </div>
    </form>

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php $i++; endforeach; ?>
<!-- End Modal -->
