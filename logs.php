

$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");

<p>Update Version 1.2 - 31 August 2021</p>
<pre> 
- Added Service ratings with enable/disable option
- Added Staff enable/disable option
- Added Payment enable/disable option
- Added locations for booking
- Added Customer history page
- Added Razorpay payment gateway
- Added Currency position, Number formats, time formats
- Added Service based time slots option
- Added Group Booking
- Improve working hour section (now set only opening hour & end hour system will auto generate time slots)
- Improve company settings page
- Fixed missing languages  
- Fixed some minor issues
</pre>



need to check capacity issue
add per minute / hour
add currency locatin
staff duplication time slot


Version 1.2 Db logs
------------------------
locations - table


UPDATE settings SET version = '1.2' WHERE id = 1;
ALTER TABLE `business` ADD `enable_category` VARCHAR(155) NULL DEFAULT '0' AFTER `time_interval`;
ALTER TABLE `appointments` ADD `sub_location_id` VARCHAR(155) NULL DEFAULT '0' AFTER `location_id`;
ALTER TABLE `settings` ADD `num_format` VARCHAR(155) NULL DEFAULT '0' AFTER `chart_style`, ADD `curr_locate` VARCHAR(155) NULL DEFAULT '0' AFTER `num_format`;

ALTER TABLE `business` ADD `curr_locate` VARCHAR(155) NULL DEFAULT '0' AFTER `template_style`, ADD `num_format` VARCHAR(155) NULL DEFAULT '0' AFTER `curr_locate`;

ALTER TABLE `ratings` CHANGE `patient_id` `customer_id` INT(11) NOT NULL;

ALTER TABLE `ratings` ADD `business_id` VARCHAR(255) NULL AFTER `user_id`, ADD `service_id` INT NULL AFTER `business_id`, ADD `appointment_id` INT NULL AFTER `service_id`;

ALTER TABLE `business` ADD `enable_rating` VARCHAR(155) NULL DEFAULT '0' AFTER `enable_category`;

ALTER TABLE `services` ADD `duration_type` VARCHAR(255) NULL DEFAULT 'minute' AFTER `duration`;

ALTER TABLE `settings` ADD `razorpay_payment` VARCHAR(155) NULL DEFAULT '0' AFTER `secret_key`, ADD `razorpay_key_id` VARCHAR(255) NULL DEFAULT NULL AFTER `razorpay_payment`, ADD `razorpay_key_secret` VARCHAR(255) NULL DEFAULT NULL AFTER `razorpay_key_id`;

ALTER TABLE `users` ADD `razorpay_payment` VARCHAR(155) NULL DEFAULT '0' AFTER `secret_key`, ADD `razorpay_key_id` VARCHAR(255) NULL DEFAULT NULL AFTER `razorpay_payment`, ADD `razorpay_key_secret` VARCHAR(255) NULL DEFAULT NULL AFTER `razorpay_key_id`;

ALTER TABLE `business` ADD `interval_type` VARCHAR(255) NULL DEFAULT 'minute' AFTER `time_interval`;

ALTER TABLE `business` ADD `interval_settings` VARCHAR(155) NULL DEFAULT '2' AFTER `interval_type`;

ALTER TABLE `business` ADD `enable_location` VARCHAR(155) NULL DEFAULT '0' AFTER `enable_rating`;

ALTER TABLE `appointments` ADD `note` TEXT NULL DEFAULT NULL AFTER `time`;

ALTER TABLE `settings` ADD `enable_frontend` VARCHAR(155) NULL DEFAULT '1' AFTER `enable_multilingual`;

ALTER TABLE `business` ADD `enable_group` VARCHAR(155) NULL DEFAULT '0' AFTER `enable_location`, ADD `total_person` VARCHAR(155) NULL DEFAULT '5' AFTER `enable_group`;

ALTER TABLE `appointments` ADD `group_booking` VARCHAR(155) NULL DEFAULT '0' AFTER `note`, ADD `total_person` VARCHAR(155) NULL DEFAULT '0' AFTER `group_booking`;

ALTER TABLE `business` ADD `enable_payment` VARCHAR(155) NULL DEFAULT '1' AFTER `total_person`, ADD `enable_onsite` VARCHAR(155) NULL DEFAULT '1' AFTER `enable_payment`;

ALTER TABLE `business` ADD `facebook` VARCHAR(255) NULL AFTER `color`, ADD `twitter` VARCHAR(255) NULL AFTER `facebook`, ADD `instagram` VARCHAR(255) NULL AFTER `twitter`, ADD `whatsapp` VARCHAR(255) NULL AFTER `instagram`;

INSERT INTO `lang_values` (`id`, `type`, `label`, `keyword`, `english`) VALUES (NULL, 'admin', 'You have reached the maximum limit! Please upgrade your plan.', 'reached-maximum-limit', 'You have reached the maximum limit! Please upgrade your plan.');

