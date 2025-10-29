<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a target="_blank" href="<?php echo base_url() ?>" class="brand-link">
      <img src="<?php echo base_url(settings()->favicon) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-bold"><?php echo html_escape(settings()->site_name) ?></span>
      <?php if(get_user_info() == TRUE){$uval = 'd-show';}else{$uval = 'd-hide';} ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      

          <?php if (is_admin()): ?>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Dashboard"){echo "active";} ?>">
              <i class="nav-icon lni lni-grid-alt"></i> <p><?php echo trans('dashboard') ?></p>
            </a>
          </li>
         
          <li class="nav-item has-treeview <?php if(isset($page) && $page == "Settings"){echo "menu-open";} ?>">
            <a href="#" class="nav-link <?php if(isset($page) && $page == "Settings"){echo "active";} ?>">
              <i class="nav-icon lni lni-cog"></i>
              <p>
                <?php echo trans('settings') ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/settings') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "System Settings"){echo "active";} ?>">
                  <i class="lni lni-layout nav-icon"></i>
                  <p><?php echo trans('website-settings') ?></p>
                </a>
              </li>

              <li class="nav-item <?= $uval; ?>">
                <a href="<?php echo base_url('admin/payment/settings') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Payment Settings"){echo "active";} ?>">
                  <i class="lni lni-coin nav-icon"></i>
                  <p><?php echo trans('payment-settings') ?></p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/settings/license') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "License"){echo "active";} ?>">
                  <i class="lni lni-key nav-icon rt-90"></i>
                  <p><?php echo trans('license') ?></p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/settings/change_password') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Change Password"){echo "active";} ?>">
                  <i class="lni lni-lock-alt nav-icon"></i>
                  <p><?php echo trans('change-password') ?></p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Language"){echo "active";} ?>" href="<?php echo base_url('admin/language') ?>">
              <i class="nav-icon fas fa-globe"></i> <p><?php echo trans('language') ?></p>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Package"){echo "active";} ?>" href="<?php echo base_url('admin/package') ?>">
              <i class="nav-icon lni lni-layers"></i> <p><?php echo trans('plans') ?></p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Transactions"){echo "active";} ?>" href="<?php echo base_url('admin/payment/transactions') ?>">
              <i class="nav-icon lni lni-investment"></i> <p><?php echo trans('transactions') ?></p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Category"){echo "active";} ?>" href="<?php echo base_url('admin/category') ?>">
              <i class="nav-icon lni lni-folder"></i> <p><?php echo trans('categories') ?></p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Blogs"){echo "active";} ?>" href="<?php echo base_url('admin/blog') ?>">
              <i class="nav-icon lni lni-image"></i> <p><?php echo trans('blogs') ?></p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Users"){echo "active";} ?>" href="<?php echo base_url('admin/users') ?>">
              <i class="nav-icon lni lni-users"></i> <p><?php echo trans('users') ?></p>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Site_features"){echo "active";} ?>" href="<?php echo base_url('admin/site_features') ?>">
              <i class="nav-icon lni lni-star"></i> <p><?php echo trans('features') ?></p>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Pages"){echo "active";} ?>" href="<?php echo base_url('admin/pages') ?>">
              <i class="nav-icon lni lni-layout"></i> <p><?php echo trans('pages') ?></p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Faqs"){echo "active";} ?>" href="<?php echo base_url('admin/faq') ?>">
              <i class="nav-icon lni lni-question-circle"></i> <p><?php echo trans('faqs') ?></p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "Contact"){echo "active";} ?>" href="<?php echo base_url('admin/contact') ?>">
              <i class="nav-icon lni lni-popup"></i> <p><?php echo trans('contacts') ?></p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if(isset($page_title) && $page_title == "App Info"){echo "active";} ?>" href="<?php echo base_url('admin/dashboard/app_info') ?>">
              <i class="nav-icon fas fa-info-circle"></i> <p><?php echo trans('info') ?></p>
            </a>
          </li>

          <?php endif; ?>

          

          <?php if (is_user()): ?>

            <li class="nav-item">
              <a href="<?php echo base_url('admin/dashboard/user') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "User Dashboard"){echo "active";} ?>">
                <i class="nav-icon lni lni-grid-alt"></i> <p><?php echo trans('dashboard') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Subscription"){echo "active";} ?>" href="<?php echo base_url('admin/subscription') ?>">
              <i class="nav-icon lni lni-investment"></i> <p><?php echo trans('subscription') ?></p>
              </a>
            </li>

            <?php if (check_my_payment_status() == TRUE): ?>
              <li class="nav-item has-treeview <?php if(isset($page) && $page == "Settings"){echo "menu-open";} ?>">
                <a href="#" class="nav-link <?php if(isset($page) && $page == "Settings"){echo "active";} ?>">
                  <i class="nav-icon lni lni-cog"></i>
                  <p>
                    <?php echo trans('settings') ?>
                    <i class="right lni lni-chevron-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('admin/settings/company') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "System Settings"){echo "active";} ?>">
                      <i class="lni lni-home nav-icon"></i>
                      <p><?php echo trans('company-settings') ?></p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link <?php if(isset($page_title) && $page_title == "General Settings"){echo "active";} ?>" href="<?php echo base_url('admin/settings/general') ?>"><i class="lni lni-cog nav-icon"></i> <p><?php echo trans('general-settings') ?></p></a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="<?php echo base_url('admin/settings/working_hours') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Working Hours"){echo "active";} ?>">
                      <i class="far fa-clock nav-icon"></i>
                      <p><?php echo trans('working-hours') ?></p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo base_url('admin/settings/qr_code') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "QR Settings"){echo "active";} ?>">
                      <i class="fas fa-qrcode nav-icon"></i>
                      <p><?php echo trans('qr-code') ?></p>
                    </a>
                  </li>

                  <?php if (check_feature_access('get-online-payments') == TRUE): ?>
                    <li class="nav-item <?= $uval; ?>">
                      <a href="<?php echo base_url('admin/payment/user') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Payment Settings"){echo "active";} ?>">
                        <i class="lni lni-coin nav-icon"></i>
                        <p><?php echo trans('payment-settings') ?></p>
                      </a>
                    </li>
                  <?php endif; ?>
                  
                </ul>
              </li>

              <?php if (check_feature_access('appointments') == TRUE): ?>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Appointments"){echo "active";} ?>" href="<?php echo base_url('admin/appointment') ?>">
                  <i class="nav-icon far fa-clock"></i> <p><?php echo trans('appointments') ?></p>
                </a>
              </li>
              <?php endif; ?>

              
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Calendars"){echo "active";} ?>" href="<?php echo base_url('admin/appointment/calendars') ?>">
                  <i class="nav-icon far fa-calendar-alt"></i> <p><?php echo trans('calendars') ?></p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Location"){echo "active";} ?>" href="<?php echo base_url('admin/location') ?>">
                  <i class="nav-icon lni lni-map"></i> <p><?php echo trans('locations') ?></p>
                </a>
              </li>
              
              <?php if (check_feature_access('staffs') == TRUE): ?>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Staff"){echo "active";} ?>" href="<?php echo base_url('admin/staff') ?>">
                  <i class="nav-icon lni lni-network"></i> <p><?php echo trans('staffs') ?></p>
                </a>
              </li>
              <?php endif; ?>


              <?php if (check_feature_access('services') == TRUE): ?>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Service"){echo "active";} ?>" href="<?php echo base_url('admin/services') ?>">
                  <i class="nav-icon lni lni-layers"></i> <p><?php echo trans('services') ?></p>
                </a>
              </li>
              <?php endif; ?>
              
              <?php if (check_feature_access('customers') == TRUE): ?>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Customers" || isset($page) && $page == "Customers"){echo "active";} ?>" href="<?php echo base_url('admin/customers') ?>">
                  <i class="nav-icon lni lni-users"></i> <p><?php echo trans('customers') ?></p>
                </a>
              </li>
              <?php endif; ?>

              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Coupons"){echo "active";} ?>" href="<?php echo base_url('admin/coupons') ?>">
                <i class="nav-icon lni lni-offer"></i> <p><?php echo trans('coupons') ?></p>
                </a>
              </li>

              <?php if (check_feature_access('gallery') == TRUE): ?>
                <li class="nav-item">
                  <a class="nav-link <?php if(isset($page_title) && $page_title == "Gallery"){echo "active";} ?>" href="<?php echo base_url('admin/gallery') ?>">
                    <i class="nav-icon lni lni-image"></i> <p><?php echo trans('gallery') ?></p>
                  </a>
                </li>
              <?php endif; ?>
            
            <?php endif; ?>

          <?php endif; ?>

          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('auth/logout') ?>">
              <i class="nav-icon lni lni-exit"></i> <p><?php echo trans('logout') ?></p>
              </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>