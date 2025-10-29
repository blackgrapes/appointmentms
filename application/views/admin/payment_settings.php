
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <?php include"include/breadcrumb.php"; ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- .col-md-12 -->
          <div class="col-lg-12">
            <div class="card p-2">

              <form method="post" action="<?php echo base_url('admin/payment/update') ?>" role="form" class="form-horizontal pr-20">
                <div class="row mb-4">
                  <div class="col-md-4">
                    <h3 class="m-0"><?php echo trans('currency') ?></h3>
                    <p class="text-muted"><?php echo trans('currency-title') ?></p>
                  </div>

                  <div class="col-md-8">
                      <div class="card-body">
                        <select class="form-control single_select" id="country" name="country">
                            <option value=""><?php echo trans('select') ?></option>
                            <?php foreach ($currencies as $currency): ?>
                                <?php if (!empty($currency->currency_name)): ?>
                                  <option value="<?php echo html_escape($currency->id); ?>" 
                                    <?php echo (settings()->country == $currency->id) ? 'selected' : ''; ?>>
                                    <?php echo html_escape($currency->name.'  -  '.$currency->currency_code.' ('.$currency->currency_symbol.')'); ?>
                                  </option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                </div>


                <div class="row mb-4">
                  <div class="col-md-4">
                    <h3 class="m-0"><?php echo trans('paypal') ?></h3>
                    <p class="text-muted"><?php echo trans('paypal-title') ?></p>
                  </div>

                  <div class="col-md-8">
                      <div class="card-body">
                          
                          <div class="form-group">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" value="1" name="paypal_payment" class="custom-control-input" id="switch-1" <?php if(settings()->paypal_payment == 1){echo "checked";} ?>>
                                  <label class="custom-control-label font-weight-bold" for="switch-1"> <?php echo trans('paypal') ?></label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label><?php echo trans('paypal-mode') ?> </label>
                              <select class="form-control" name="paypal_mode">
                                  <option value=""><?php echo trans('select') ?></option>
                                  <option value="sandbox" <?php echo (settings()->paypal_mode == 'sandbox') ? 'selected' : ''; ?>>Sandbox</option>
                                  <option value="live" <?php echo (settings()->paypal_mode == 'live') ? 'selected' : ''; ?>>Live</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label> <?php echo trans('paypal-account') ?></label>
                              <input type="text" name="paypal_email" value="<?php echo html_escape(settings()->paypal_email); ?>" class="form-control" >
                          </div>
                      </div>
                  </div>
                </div>


                <div class="row mb-4">
                  <div class="col-md-4">
                    <h3 class="m-0"><?php echo trans('stripe') ?></h3>
                    <p class="text-muted"><?php echo trans('stripe-title') ?></p>
                  </div>

                  <div class="col-md-8">
                      <div class="card-body">
                          <div class="form-group">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" value="1" name="stripe_payment" class="custom-control-input" id="switch-2" <?php if(settings()->stripe_payment == 1){echo "checked";} ?>>
                                  <label class="custom-control-label font-weight-bold" for="switch-2"> <?php echo trans('stripe') ?></label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label><?php echo trans('publish-key') ?></label>
                              <input type="text" name="publish_key" value="<?php echo html_escape(settings()->publish_key); ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label><?php echo trans('secret-key') ?> </label>
                            <input type="text" name="secret_key" value="<?php echo html_escape(settings()->secret_key); ?>" class="form-control">
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-md-4">
                    <h3 class="m-0"><?php echo trans('razorpay') ?></h3>
                    <p class="text-muted"><?php echo trans('razorpay-title') ?></p>
                  </div>

                  <div class="col-md-8">
                      <div class="card-body">
                          <div class="form-group">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" value="1" name="razorpay_payment" class="custom-control-input" id="switch-3" <?php if(settings()->razorpay_payment == 1){echo "checked";} ?>>
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
                </div>

                <div class="row mb-4">
                  <div class="col-md-4">
                    <h3 class="m-0"><?php echo trans('offline-payment') ?></h3>
                    <p class="text-muted"><?php echo trans('offline-payment-title') ?>.</p>
                  </div>

                  <div class="col-md-8">
                      <div class="card-body">
                          <div class="form-group">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" value="1" name="enable_offline_payment" class="custom-control-input" id="switch-4" <?php if(settings()->enable_offline_payment == 1){echo "checked";} ?>>
                                  <label class="custom-control-label font-weight-bold" for="switch-4">  <?php echo trans('offline-payment') ?></label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label><?php echo trans('offline-payment-instructions') ?></label>
                              <p class="small"><?php echo trans('offline-payment-suggestions') ?>.</p>
                              <textarea id="summernote" name="offline_details" placeholder="Provide your offline payment instructions here"><?php echo settings()->offline_details; ?></textarea>
                              
                          </div>
                      </div>

                      <div class="card-footers mt-4">
                        <!-- csrf token -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <button type="submit" class="btn btn-primary btn-lgs"> <?php echo trans('save-changes') ?></button>
                      </div>
                  </div>
                </div>


              </form>
        
            </div>
          </div>
          <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
