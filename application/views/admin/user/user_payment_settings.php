
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <?php $this->load->view('admin/include/breadcrumb'); ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
          <?php $this->load->view('admin/user/include/settings_menu.php'); ?>
          
          <div class="col-lg-9 pl-3">
              <form method="post" action="<?php echo base_url('admin/payment/user_update') ?>" role="form" class="form-horizontal pr-20">
              
                <div class="card">
                  <div class="card-body">
                      <h5 class="mb-4"><?php echo trans('paypal') ?></h5>

                      <div class="form-group">
                          <div class="custom-control custom-switch">
                              <input type="checkbox" value="1" name="paypal_payment" class="custom-control-input" id="switch-1" <?php if(user()->paypal_payment == 1){echo "checked";} ?>>
                              <label class="custom-control-label font-weight-bold" for="switch-1">  <?php echo trans('paypal') ?></label>
                          </div>
                      </div>

                      <div class="form-group">
                          <label><?php echo trans('paypal-mode') ?> </label>
                          <select class="form-control" name="paypal_mode">
                                <option value=""><?php echo trans('select') ?></option>
                                <option value="sandbox" <?php echo (user()->paypal_mode == 'sandbox') ? 'selected' : ''; ?>><?php echo trans('sandbox') ?></option>
                                <option value="live" <?php echo (user()->paypal_mode == 'live') ? 'selected' : ''; ?>><?php echo trans('live') ?></option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label><?php echo trans('paypal-account') ?></label>
                          <input type="text" name="paypal_email" value="<?php echo html_escape(user()->paypal_email); ?>" class="form-control" >
                      </div>
                  </div>
                </div>

                <div class="card">
                    <div class="card-body">

                          <h5 class="mb-4"><?php echo trans('stripe') ?></h5>

                          <div class="form-group">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" value="1" name="stripe_payment" class="custom-control-input" id="switch-2" <?php if(user()->stripe_payment == 1){echo "checked";} ?>>
                                  <label class="custom-control-label font-weight-bold" for="switch-2"> <?php echo trans('stripe') ?></label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label><?php echo trans('publish-key') ?></label>
                              <input type="text" name="publish_key" value="<?php echo html_escape(user()->publish_key); ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label><?php echo trans('secret-key') ?> </label>
                            <input type="text" name="secret_key" value="<?php echo html_escape(user()->secret_key); ?>" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                          <h5 class="mb-4"><?php echo trans('razorpay') ?></h5>

                          <div class="form-group">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" value="1" name="razorpay_payment" class="custom-control-input" id="switch-3" <?php if(user()->razorpay_payment == 1){echo "checked";} ?>>
                                  <label class="custom-control-label font-weight-bold" for="switch-3"> <?php echo trans('razorpay') ?></label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label><?php echo trans('kay-id') ?></label>
                              <input type="text" name="razorpay_key_id" value="<?php echo html_escape(settings()->razorpay_key_id); ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label><?php echo trans('key-secret') ?> </label>
                            <input type="text" name="razorpay_key_secret" value="<?php echo html_escape(settings()->razorpay_key_secret); ?>" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card-footers mb-4">
                  <!-- csrf token -->
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <button type="submit" class="btn btn-primary btn-lgs"> <?php echo trans('save-changes') ?></button>
                </div>
                
       
              </form>
          </div>
          

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
