<?php if (empty($times)): ?>
	<div class="align-item-center pt-1">
		<h4 class="mb-0"><i class="lni lni-cross-circle text-danger"></i></h4>
		<p class="time-empty-info pt-0 mt-xs-20"><?php echo trans('schedule-not-available') ?></p>
	</div>
<?php else: ?>

	<p class="pick-date fs-16 pt-2 mb-3 mt-xs-20"><?php echo trans('pick-time-for') ?>  <span><?php echo my_date_show($date) ?></span></p>
	<div class="time_wrap" style="height: <?php if(count($times) > 20){echo "369px";}else{ echo "auto"; } ?>;">
		<?php foreach ($times as $time): ?>
			<?php 
				$time_val = date("H:i", strtotime($time['start_time'])).'-'.date("H:i", strtotime($time['end_time'])); 
				$check = check_time($time_val, $date);
				$break = check_break(date("H:i", strtotime($time['start_time'])), date("H:i", strtotime($time['end_time'])), $day_id); 

				if($company->time_format == 'HH'){
					$time_view = date("H:i", strtotime($time['start_time'])).'-'.date("H:i", strtotime($time['end_time'])); 
				}else{
					$time_view = date("h:i a", strtotime($time['start_time'])).'-'.date("h:i a", strtotime($time['end_time'])); 
				}
			?>
			
			<?php if ($break == 1): ?>
			<div class="time_group pt-1">
				<div class="btn-group w-100">
				    <label class="btn btn-light-success btn-sm time_btn <?php if($check == TRUE){echo 'disabled';} ?>">
				      <input type="radio" class="time_inp" value="<?php echo $time_val ?>" name="time" autocomplete="off"><i class="far fa-clock"></i> <?php echo $time_view?> 
				    </label>
				</div>
			</div>
			<?php endif ?>

		<?php endforeach ?>
	</div>
<?php endif ?>