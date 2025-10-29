
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-10 mx-200">
                <div class="pay_status p-20">
                    <?php if (isset($success_msg) && $success_msg=='Success'): ?>
                        <h1 class="text-success"><i class="icon-check"></i><br> Success</h1>
                        <h5 class="text-success">Your payment has been completed Successfully !</h5><br>
                        <a href="<?php echo base_url('admin/subscription') ?>" class="btn btn-md btn-success">Continue <i class="fa fa-long-arrow-right"></i></a>
                    <?php endif; ?>
                    <?php if (isset($error_msg) && $error_msg=='Error'): ?>
                        <h1 class="text-danger"><i class="icon-close"></i><br> Failed!</h1>
                        <h5 class="text-danger">Your payment has been failed !</h5><br>
                        <a href="<?php echo base_url('admin/subscription') ?>" class="btn btn-md btn-danger">Try again <i class="fa fa-long-arrow-right"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>