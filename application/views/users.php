
<section class="pt-6">
    <div class="container">

        <div class="text-center mx-md-auto mb-5 mb-md-7 mb-lg-9">
            <h2 class="mb-0"><?php echo trans('company-lists') ?></h2>
        </div>


        <form method="GET" class="sort_form" action="<?php echo base_url('users') ?>">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="category" class="form-controls sort_front select2" style="width: 100%">
                            <option value=""><?php echo trans('all-categories') ?></option>
                            <?php foreach ($categories as $category): ?>
                                <option <?php if(isset($_GET['category']) && $_GET['category'] == $category->id){echo "selected";} ?> value="<?php echo html_escape($category->id); ?>"><?php echo html_escape($category->name); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <select name="country" class="form-controls sort_front select2" style="width: 100%">
                            <option value=""><?php echo trans('all-countries') ?></option>
                            <?php foreach ($countries as $country): ?>
                                <option <?php if(isset($_GET['country']) && $_GET['country'] == $country->id){echo "selected";} ?> value="<?php echo html_escape($country->id); ?>"><?php echo html_escape($country->name); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group input-group-sm pull-right">
                        <input name="search" type="text" class="form-control form-control-sm" placeholder="<?php echo trans('search-by-name') ?>">
                        <div class="input-group-append">
                          <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                    </div>
                </div>  
                
            </div>
        </form>

        <!-- Users -->
        <?php if (empty($companies)): ?>
            <div class="row">
                <div class="col-md-10 col-lg-9 col-xl-8 mx-md-auto">
                    <?php include'include/not_found_msg.php'; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="row mt-4">
                <?php $c=1; foreach ($companies as $company): ?>
                    <div class="col-sm-6 col-md-4 mb-5 mb-md-0">
                        <div class="card profile-card-2 mb-4" data-aos="fade-up" data-aos-delay="<?= $c * 50; ?>">
                            <div class="card-img-block">
                                <?php if (empty($company->image)): ?>
                                    <img class="img-fluid" src="<?php echo base_url('assets/front/img/vericla-cover.jpg'); ?>" alt="Card image cap">
                                <?php else: ?>
                                    <img class="img-fluid" src="<?php echo base_url($company->image) ?>" alt="User Image">
                                <?php endif ?>

                                <?php if (!empty($company->logo)): ?>
                                    <img src="<?php echo base_url($company->logo) ?>" alt="profile-image" class="profile"/>
                                <?php endif; ?>
                            </div>
                            <div class="card-body pt-5">
                                <p class="mb-0"><?php echo html_escape($company->category_name) ?></p>
                                <h5 class="card-title text-dark mb-0"><?php echo html_escape($company->name) ?></h5>
                                <p class="card-text"><?php echo html_escape($company->title) ?></p>
                                <a href="<?php echo base_url($company->slug) ?>" class="btn btn-light-secondary btn-sm mt-2"> <?php echo trans('view-page') ?></a>
                            </div>
                        </div>
                    </div>
                <?php $c++; endforeach ?>
            </div>

            <div class="col-md-12 text-center mt-4">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        <?php endif; ?>
        <!-- End Users -->
        
    </div>
</section>