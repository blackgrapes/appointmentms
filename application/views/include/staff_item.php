<?php $staffs = json_decode($service->staffs);?>

<?php if (!empty($staffs)): ?>
    <div class="col-md-12 mb-2 text-left">
        <h5 class="mb-2 h5"><?php echo trans('select-staff') ?></h5>
    </div>
    <?php $s=1; foreach ($staffs as $staff): ?>
        <?php if($s == 1): ?>
            <div class="col-md-3 col-xs-6 mb-5 mb-md-0 hide" data-aos="fade-up" data-aos-duration="100">
                <label class="staff-rdo">
                    <input type="radio" name="staff_id" class="staff_input" value="0" />
                    <div class="bg-lights py-4 rounded-sm text-center staff_item">
                        <img alt="Staff Image" src="<?php echo base_url('assets/images/no-photo-sm.png') ?>" class="rounded-circle">
                        <p class="mb-0">Anyone</p>
                    </div>
                </label>
            </div>
        <?php endif; ?>

        <div class="col-md-3 col-xs-6 mb-5 mb-md-0">
            <label class="staff-rdo" data-aos="fade-up" data-aos-duration="<?php echo html_escape($s * 150) ?>">
                <input type="radio" name="staff_id" class="staff_input" value="<?php echo get_by_id($staff, 'staffs')->id ?>" />
                <div class="bg-lights py-4 rounded-sm text-center staff_item">
                    <img alt="Staff Image" src="<?php echo base_url(get_by_id($staff, 'staffs')->thumb) ?>" class="rounded-circle">
                    <p class="mb-0"><?php echo get_by_id($staff, 'staffs')->name ?></p>
                </div>
            </label>
        </div>
    <?php $s++; endforeach; ?>
<?php else: ?>
    <div class="col-md-12 col-xs-6 mb-4 text-center">
        <p class="text-muted staff_not p-2"><?php echo trans('staff-not-found') ?></p>
    </div>
<?php endif; ?>