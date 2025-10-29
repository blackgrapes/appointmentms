<?php
session_start();
error_reporting(1);

$db_config_path = '../application/config/database.php';

if (!isset($_SESSION["license_code"])) {
    $_SESSION["error"] = "Invalid purchase code!";
    header("Location: index.php");
    exit();
}

if (isset($_POST["btn_admin"])) {

    $_SESSION["db_host"] = $_POST['db_host'];
    $_SESSION["db_name"] = $_POST['db_name'];
    $_SESSION["db_user"] = $_POST['db_user'];
    $_SESSION["db_password"] = $_POST['db_password'];


    /* Database Credentials */
    defined("DB_HOST") ? null : define("DB_HOST", $_SESSION["db_host"]);
    defined("DB_USER") ? null : define("DB_USER", $_SESSION["db_user"]);
    defined("DB_PASS") ? null : define("DB_PASS", $_SESSION["db_password"]);
    defined("DB_NAME") ? null : define("DB_NAME", $_SESSION["db_name"]);

    /* Connect */
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $connection->query("SET CHARACTER SET utf8");
    $connection->query("SET NAMES utf8");

    /* check connection */
    if (mysqli_connect_errno()) {
        $error = 0;
    } else {
        
        mysqli_query($connection, "UPDATE settings SET version = '1.2' WHERE id = 1;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `enable_category` VARCHAR(155) NULL DEFAULT '0' AFTER `time_interval`;");
        mysqli_query($connection, "ALTER TABLE `appointments` ADD `sub_location_id` VARCHAR(155) NULL DEFAULT '0' AFTER `location_id`;");
        mysqli_query($connection, "ALTER TABLE `settings` ADD `num_format` VARCHAR(155) NULL DEFAULT '0' AFTER `chart_style`, ADD `curr_locate` VARCHAR(155) NULL DEFAULT '0' AFTER `num_format`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `curr_locate` VARCHAR(155) NULL DEFAULT '0' AFTER `template_style`, ADD `num_format` VARCHAR(155) NULL DEFAULT '0' AFTER `curr_locate`;");

        mysqli_query($connection, "ALTER TABLE `ratings` CHANGE `patient_id` `customer_id` INT(11) NOT NULL;");

        mysqli_query($connection, "ALTER TABLE `ratings` ADD `business_id` VARCHAR(255) NULL AFTER `user_id`, ADD `service_id` INT NULL AFTER `business_id`, ADD `appointment_id` INT NULL AFTER `service_id`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `enable_rating` VARCHAR(155) NULL DEFAULT '0' AFTER `enable_category`;");

        mysqli_query($connection, "ALTER TABLE `services` ADD `duration_type` VARCHAR(255) NULL DEFAULT 'minute' AFTER `duration`;");

        mysqli_query($connection, "ALTER TABLE `settings` ADD `razorpay_payment` VARCHAR(155) NULL DEFAULT '0' AFTER `secret_key`, ADD `razorpay_key_id` VARCHAR(255) NULL DEFAULT NULL AFTER `razorpay_payment`, ADD `razorpay_key_secret` VARCHAR(255) NULL DEFAULT NULL AFTER `razorpay_key_id`;");

        mysqli_query($connection, "ALTER TABLE `users` ADD `razorpay_payment` VARCHAR(155) NULL DEFAULT '0' AFTER `secret_key`, ADD `razorpay_key_id` VARCHAR(255) NULL DEFAULT NULL AFTER `razorpay_payment`, ADD `razorpay_key_secret` VARCHAR(255) NULL DEFAULT NULL AFTER `razorpay_key_id`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `interval_type` VARCHAR(255) NULL DEFAULT 'minute' AFTER `time_interval`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `interval_settings` VARCHAR(155) NULL DEFAULT '2' AFTER `interval_type`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `enable_location` VARCHAR(155) NULL DEFAULT '0' AFTER `enable_rating`;");

        mysqli_query($connection, "ALTER TABLE `appointments` ADD `note` TEXT NULL DEFAULT NULL AFTER `time`;");

        mysqli_query($connection, "ALTER TABLE `settings` ADD `enable_frontend` VARCHAR(155) NULL DEFAULT '1' AFTER `enable_multilingual`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `enable_group` VARCHAR(155) NULL DEFAULT '0' AFTER `enable_location`, ADD `total_person` VARCHAR(155) NULL DEFAULT '5' AFTER `enable_group`;");

        mysqli_query($connection, "ALTER TABLE `appointments` ADD `group_booking` VARCHAR(155) NULL DEFAULT '0' AFTER `note`, ADD `total_person` VARCHAR(155) NULL DEFAULT '0' AFTER `group_booking`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `enable_payment` VARCHAR(155) NULL DEFAULT '1' AFTER `total_person`, ADD `enable_onsite` VARCHAR(155) NULL DEFAULT '1' AFTER `enable_payment`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `facebook` VARCHAR(255) NULL AFTER `color`, ADD `twitter` VARCHAR(255) NULL AFTER `facebook`, ADD `instagram` VARCHAR(255) NULL AFTER `twitter`, ADD `whatsapp` VARCHAR(255) NULL AFTER `instagram`;");

        

        mysqli_query($connection, "
            INSERT INTO `lang_values` (`id`, `type`, `label`, `keyword`, `english`) VALUES
            (803, 'user', 'You have reached the maximum limit! Please upgrade your plan.', 'reached-maximum-limit', 'You have reached the maximum limit! Please upgrade your plan'),
            (804, 'user', 'Enable Category', 'enable-category', 'Enable Category'),
            (805, 'user', 'Disable Category', 'disable-category', 'Disable Category'),
            (806, 'user', 'Location', 'location', 'Location'),
            (807, 'user', 'Locations', 'locations', 'Locations'),
            (808, 'user', 'Sub location', 'sub-location', 'Sub location'),
            (809, 'user', 'Sub locations', 'sub-locations', 'Sub locations'),
            (810, 'user', 'Currency location', 'currency-location', 'Currency location'),
            (811, 'user', 'Number format', 'number-format', 'Number format'),
            (812, 'user', 'Currency Position', 'currency-position', 'Currency Position'),
            (813, 'user', 'Paid', 'paid', 'Paid'),
            (814, 'user', 'Minute', 'minute', 'Minute'),
            (815, 'user', 'Hour', 'hour', 'Hour'),
            (816, 'user', 'Send SMS Reminder', 'send-sms-reminder', 'Send SMS Reminder'),
            (817, 'user', 'Review', 'review', 'Review'),
            (818, 'user', 'Reviews', 'reviews', 'Reviews'),
            (819, 'user', 'Customer Feedback', 'customer-feedback', 'Customer Feedback'),
            (820, 'user', 'Average Rating', 'average-rating', 'Average Rating'),
            (821, 'user', 'Ratings Summary', 'ratings-summary', 'Ratings Summary'),
            (822, 'user', 'Ratings', 'ratings', 'Ratings'),
            (823, 'user', 'Service Ratings', 'service-ratings', 'Service Ratings'),
            (824, 'user', 'Enable Ratings', 'enable-ratings', 'Enable Ratings'),
            (825, 'user', 'Enable to publicly visible service ratings, Until complete 3 ratings it will be hidden', 'enable-ratings-title', 'Enable to publicly visible service ratings, Until complete 3 ratings it will be hidden'),
            (826, 'user', 'Learn more', 'learn-more', 'Learn more'),
            (827, 'user', 'Write your review', 'write-review', 'Write your review'),
            (828, 'user', 'January', 'january', 'January'),
            (829, 'user', 'February', 'february', 'February'),
            (830, 'user', 'March', 'march', 'March'),
            (831, 'user', 'April', 'april', 'April'),
            (832, 'user', 'May', 'may', 'May'),
            (833, 'user', 'June', 'june', 'June'),
            (834, 'user', 'July', 'july', 'July'),
            (835, 'user', 'August', 'august', 'August'),
            (836, 'user', 'September', 'september', 'September'),
            (837, 'user', 'October', 'october', 'October'),
            (838, 'user', 'November', 'november', 'November'),
            (839, 'user', 'December', 'december', 'December'),
            (840, 'user', 'Su', 'su', 'Su'),
            (841, 'user', 'Mo', 'mo', 'Mo'),
            (842, 'user', 'Tu', 'tu', 'Tu'),
            (843, 'user', 'We', 'we', 'We'),
            (844, 'user', 'Th', 'th', 'Th'),
            (845, 'user', 'Fr', 'fr', 'Fr'),
            (846, 'user', 'Sa', 'sa', 'Sa'),
            (847, 'user', 'Days', 'days', 'Days'),
            (848, 'user', 'Day', 'day', 'Day'),
            (849, 'user', 'Kay Id', 'kay-id', 'Key Id'),
            (850, 'user', 'Key Secret', 'key-secret', 'Key Secret'),
            (851, 'user', 'Setup your Razorpay account to accept payments', 'razorpay-title', 'Setup your Razorpay account to accept payments'),
            (852, 'user', 'Razorpay ', 'razorpay', 'Razorpay '),
            (853, 'user', 'Opening Hour', 'opening-hour', 'Opening Hour'),
            (854, 'user', 'End Hour', 'end-hour', 'End Hour'),
            (855, 'user', 'Branches', 'branches', 'Branches'),
            (856, 'user', 'Enable Locations', 'enable-locations', 'Enable Locations'),
            (857, 'user', 'Disable Locations', 'disable-locations', 'Disable Locations'),
            (858, 'user', 'Enable to allow locations in booking page', 'enable-location-title', 'Enable to allow locations in booking page'),
            (859, 'user', 'Disable to hide locations in booking page', 'disable-location-title', 'Disable to hide locations in booking page'),
            (860, 'user', 'Any special notes?', 'any-special-notes', 'Any special notes?'),
            (861, 'user', 'Write your notes here', 'write-your-notes-here', 'Write your notes here'),
            (862, 'user', 'Enable Frontend', 'enable-frontend', 'Enable Frontend'),
            (863, 'user', 'Enable to show frontend site', 'enable-to-show-frontend-site', 'Enable to show frontend site'),
            (864, 'user', 'View Details', 'view-details', 'View Details'),
            (865, 'user', 'Total Appointments', 'total-appointments', 'Total Appointments'),
            (866, 'user', 'Total Services', 'total-services', 'Total Services'),
            (867, 'user', 'Last Appointment', 'last-appointment', 'Last Appointment'),
            (868, 'user', 'Add Breaks', 'add-breaks', 'Add Breaks'),
            (869, 'user', 'This phone number will used for as username', 'phone-as-username', 'This phone number will used for as username'),
            (870, 'user', 'Search', 'search', 'Search'),
            (871, 'user', 'Search Value', 'search-value', 'Search Value'),
            (872, 'user', ' Twillo SMS Settings', 'twillo-sms-settings', ' Twillo SMS Settings'),
            (873, 'user', 'Cancel', 'cancel', 'Cancel'),
            (874, 'user', 'Phone already exist', 'phone-exist', 'Phone already exist'),
            (875, 'user', 'Persons', 'persons', 'Persons'),
            (876, 'user', 'Bringing anyone with you?', 'bringing-anyone-with-you', 'Bringing anyone with you?'),
            (877, 'user', 'Additional Persons:', 'additional-persons', 'Additional Persons:'),
            (878, 'user', 'General Settings', 'general-settings', 'General Settings'),
            (879, 'user', 'Enable Group Booking', 'enable-group-booking', 'Enable Group Booking'),
            (880, 'user', 'Enable to allow group booking for your customers', 'enable-group-title', 'Enable to allow group booking for your customers'),
            (881, 'user', 'Maximum allowed additional persons', 'max-allowed-persons', 'Maximum allowed additional persons'),
            (882, 'user', 'Group Booking', 'group-booking', 'Group Booking'),
            (883, 'user', 'Payments', 'payments', 'Payments'),
            (884, 'user', 'just now', 'just-now', 'just now'),
            (885, 'user', 'one minute ago', 'one-minute-ago', 'one minute ago'),
            (886, 'user', 'minutes ago', 'minutes-ago', 'minutes ago'),
            (887, 'user', 'an hour ago', 'an-hour-ago', 'an hour ago'),
            (888, 'user', 'hours ago', 'hours-ago', 'hours ago'),
            (889, 'user', 'yesterday', 'yesterday', 'yesterday'),
            (890, 'user', 'days ago', 'days-ago', 'days ago'),
            (891, 'user', 'weeks ago', 'weeks-ago', 'weeks ago'),
            (892, 'user', 'a month ago', 'a-month-ago', 'a month ago'),
            (893, 'user', 'months ago', 'months-ago', 'months ago'),
            (894, 'user', 'one year ago', 'one-year-ago', 'one year ago'),
            (895, 'user', 'years ago', 'years-ago', 'years ago'),
            (896, 'user', 'Jan', 'jan', 'Jan'),
            (897, 'user', 'Feb', 'feb', 'Feb'),
            (898, 'user', 'Mar', 'mar', 'Mar'),
            (899, 'user', 'Apr', 'apr', 'Apr'),
            (900, 'user', 'Jun', 'jun', 'Jun'),
            (901, 'user', 'Jul', 'jul', 'Jul'),
            (902, 'user', 'Aug', 'aug', 'Aug'),
            (903, 'user', 'Sep', 'sep', 'Sep'),
            (904, 'user', 'Oct', 'oct', 'Oct'),
            (905, 'user', 'Nov', 'nov', 'Nov'),
            (906, 'user', 'Dec', 'dec', 'Dec'),
            (907, 'user', 'Facebook', 'facebook', 'Facebook'),
            (908, 'user', 'Twitter', 'twitter', 'Twitter'),
            (909, 'user', 'Instagram', 'instagram', 'Instagram'),
            (910, 'user', 'WhatsApp', 'whatsapp', 'WhatsApp'),
            (911, 'user', 'LinkedIn', 'linkedin', 'LinkedIn'),
            (912, 'user', 'Google Analytics', 'google-analytics', 'Google Analytics'),
            (913, 'user', 'reCaptcha', 'recaptcha', 'reCaptcha'),
            (914, 'user', 'Total Persons', 'total-persons', 'Total Persons'),
            (915, 'user', 'Apply service duration to generate booking time slots', 'generate-booking-time-slots', 'Apply service duration to generate booking time slots'),
            (916, 'user', 'Apply fixed duration to generate booking time slots', 'fixed-booking-time-slots', 'Apply fixed duration to generate booking time slots'),
            (917, 'user', 'Enable Online Payments', 'enable-online-payment', 'Enable Online Payments'),
            (918, 'user', 'Enable to active only payment methods to receive booking payments', 'enable-online-title', 'Enable to active online payment methods to receive booking payments'),
            (919, 'user', 'Enable offline payment', 'enable-offline-payment', 'Enable offline payment'),
            (920, 'user', 'Enable to active onsite payment option', 'enable-offline-title', 'Enable to active onsite payment option');
        ");

        mysqli_query($connection, "DROP TABLE locations;");

        // import database table
        $query = '';
          $sqlScript = file('sql/locations.sql');
          foreach ($sqlScript as $line) {
            
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
              continue;
            }
              
            $query = $query . $line;
            if ($endWith == ';') {
              mysqli_query($connection, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
              $query= '';   
            }
        }

        mysqli_query($connection, "TRUNCATE TABLE `working_time`;");

        

      /* close connection */
      mysqli_close($connection);

      $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://" . $_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
      $redir = str_replace('updates/v1.2/', '', $redir);
      header("refresh:5;url=" . $redir);
      $success = 1;
    }



}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aoxio &bull; Update Installer</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/libs/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,500,600,700&display=swap" rel="stylesheet">
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-md-offset-2">

                <div class="row">
                    <div class="col-sm-12 logo-cnt">
                        <p>
                           <img src="assets/img/logo.png" alt="">
                       </p>
                       <h1>Welcome to the update installer</h1>
                   </div>
               </div>

               <div class="row">
                <div class="col-sm-12">

                    <div class="install-box">

                        <div class="steps">
                            <div class="step-progress">
                                <div class="step-progress-line" data-now-value="100" data-number-of-steps="3" style="width: 100%;"></div>
                            </div>
                            <div class="step" style="width: 50%">
                                <div class="step-icon"><i class="fa fa-arrow-circle-right"></i></div>
                                <p>Start</p>
                            </div>
                            <div class="step active" style="width: 50%">
                                <div class="step-icon"><i class="fa fa-database"></i></div>
                                <p>Database</p>
                            </div>
                        </div>

                        <div class="messages">
                            <?php if (isset($message)) { ?>
                            <div class="alert alert-danger">
                                <strong><?php echo htmlspecialchars($message); ?></strong>
                            </div>
                            <?php } ?>
                            <?php if (isset($success)) { ?>
                            <div class="alert alert-success">
                                <strong>Completing Updates ... <i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> Please wait 5 second </strong>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="step-contents">
                            <div class="tab-1">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="tab-content">
                                        <div class="tab_1">
                                            <h1 class="step-title">Database</h1>
                                            <div class="form-group">
                                                <label for="email">Host</label>
                                                <input type="text" class="form-control form-input" name="db_host" placeholder="Host"
                                                value="<?php echo isset($_SESSION["db_host"]) ? $_SESSION["db_host"] : 'localhost'; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Database Name</label>
                                                <input type="text" class="form-control form-input" name="db_name" placeholder="Database Name" value="<?php echo @$_SESSION["db_name"]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Username</label>
                                                <input type="text" class="form-control form-input" name="db_user" placeholder="Username" value="<?php echo @$_SESSION["db_user"]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Password</label>
                                                <input type="password" class="form-control form-input" name="db_password" placeholder="Password" value="<?php echo @$_SESSION["db_password"]; ?>">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="buttons">
                                        <a href="index.php" class="btn btn-success btn-custom pull-left">Prev</a>
                                        <button type="submit" name="btn_admin" class="btn btn-success btn-custom pull-right">Finish</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>


    </div>


</div>

<?php

unset($_SESSION["error"]);
unset($_SESSION["success"]);

?>

</body>
</html>

