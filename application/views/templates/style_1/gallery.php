<section class="pt-5">
    <div class="container h-100vh mb-5">
        <div class="row justify-content-center">
            <div class="text-center">
                <h3 class="mb-4"><?php echo trans('Gallery') ?></h3>
            </div>
            <div class="col-lg-12 br-10 minh-400">
            	<div class="gallery minh-400">
                    <?php if (empty($galleries)): ?>
                        <div class="text-center">
                            <p class="text-muted m-auto pt-4"><?php echo trans('no-data-found') ?></p>
                        </div>
                    <?php else: ?>
    					<?php foreach ($galleries as $image): ?>
    						<a class="example-image-link" href="<?php echo base_url($image->image); ?>" data-lightbox="example-set" data-title="<?php echo html_escape($image->title); ?>">
    				  			<img src="<?php echo base_url($image->image); ?>">
    				  		</a>
    				  	<?php endforeach ?>
                    <?php endif ?>
				</div>
            </div>
        </div>
    </div>
</section>


