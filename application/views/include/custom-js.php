<?php if(isset($page_title) && $page_title == 'Gallery'): ?>
<script type="text/javascript">
    $(document).ready(function () {
          // This is roughly the max pixels width/height of a square photo
          var widthSetting = 400;
          // Do not edit any of this unless you know what you're doing
          var containerWidth = $(".gallery").width();
        
          var ratioSumMax = containerWidth / widthSetting;
          var imgs = $(".gallery img");
          var numPhotos = imgs.length, ratioSum, ratio, photo, row, rowPadding, i = 0;

          while (i < numPhotos) {
            ratioSum = rowPadding = 0;
            row = new Array();
            while (i < numPhotos && ratioSum < ratioSumMax) {
                photo = $(imgs[i]);
                // reset width to original
                photo.width(""); 
                ratio = photo.width() / photo.height();
                rowPadding += getHorizontalPadding(photo);
                // if this is going to be first in the row, clear: left
                if(ratioSum == 0) photo.css("clear", "left"); else photo.css("clear", "none");
                ratioSum += ratio;
                row.push(photo);
                i++;
                // if only 1 image left, squeeze it in
                if(i == numPhotos - 1) ratioSumMax = 999;
            }
            unitWidth = (containerWidth - rowPadding) / ratioSum;

            row.forEach(function (elem) {
              elem.width(unitWidth * elem.width() / elem.height());
            });
          }
        

        function getHorizontalPadding(elem)
        {
            var padding = 0;
            var left = elem.css("padding-left");
            var right = elem.css("padding-right");
            padding += parseInt(left ? left.replace("px", "") : 0);
            padding += parseInt(right ? right.replace("px", "") : 0);
            return padding;
        }

        $(window).load(scaleGallery);
        $(window).resize(scaleGallery);



    });
</script>
<?php endif; ?>



<?php if(isset($page_title) && $page_title == 'Booking'): ?>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            var $datePicker = $("#datepickers");
            var base_url = $('#base_url').val();
            var business_id = <?php echo html_escape($company_id) ?>;
            var arrayFromPHP = <?php echo json_encode($not_available) ?>;

            $.datepicker.regional ['en'] = {
                clearText: 'Clear', 
                clearStatus: '',
                closeText: 'Close',
                closeStatus: 'Close without modifying',
                prevStatus: 'See previous month',
                nextStatus: 'See next month',
                currentText: 'Current',
                currentStatus: 'See current month',
                monthNames: ['<?php echo trans('january') ?>', '<?php echo trans('february') ?>', '<?php echo trans('march') ?>', '<?php echo trans('april') ?>', '<?php echo trans('may') ?>', '<?php echo trans('june') ?>',
                '<?php echo trans('july') ?>', '<?php echo trans('august') ?>', '<?php echo trans('september') ?>', '<?php echo trans('october') ?>', '<?php echo trans('november') ?>', '<?php echo trans('december') ?>'],
                monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                monthStatus: 'See another month',
                yearStatus: 'See another year',
                weekHeader: 'Sm',
                weekStatus: '',
                dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                dayNamesShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                dayNamesMin: ['<?php echo trans('su') ?>', '<?php echo trans('mo') ?>', '<?php echo trans('tu') ?>', '<?php echo trans('we') ?>', '<?php echo trans('th') ?>', '<?php echo trans('fr') ?>', '<?php echo trans('sa') ?>'],
                dayStatus: 'Use DD as the first day of the week',
                dateStatus: 'Choose the DD, MM of',
                firstDay: 0,
                initStatus: 'Choose date',
                isRTL: false
            }; 

            $.datepicker.setDefaults($.datepicker.regional['en']);

            $datePicker.datepicker({
                daysOfWeekDisabled: [0],
                changeMonth: false,
                changeYear: false,
                showOtherMonths: true,
                selectOtherMonths: true,
                showButtonPanel: true,
                minDate: 0,
                todayBtn: false,
                dateFormat: 'yy-mm-dd',
                onSelect: function(){
                    var date = $(this).val();
                    $('.booking_date').val(date);

                    var url = base_url+'company/get_time/'+date+'/'+business_id;
                    var post_data = {
                        'csrf_test_name' : csrf_token
                    };

                    $('#load_data').html('<span class="spinner-border spinner-border-sm"></span>');

                    $.ajax({
                        type: "POST",
                        url: url,
                        dataType: 'json',
                        data: post_data,
                        success: function(data) {
                            if (data.status == 0) {
                                $('.step2_btn').prop('disabled', true);
                            }
                            $('#load_data').html(data.result);
                        }
                    })

                },

                beforeShowDay: function(date) {
                    var show = true;
                    //foreach
                    $.each(arrayFromPHP, function (i, elem) {
                        if(date.getDay() == elem-1) show = false
                    });
                    
                    return [show];
                }

            });
        });
    </script>
<?php endif; ?>


<?php if(isset($page) && $page == 'Staffs'): ?>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
      
              $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
              });

              $.datepicker.regional ['en'] = {
                  clearText: 'Clear', 
                  clearStatus: '',
                  closeText: 'Close',
                  closeStatus: 'Close without modifying',
                  prevStatus: 'See previous month',
                  nextStatus: 'See next month',
                  currentText: 'Current',
                  currentStatus: 'See current month',
                  monthNames: ['<?php echo trans('january') ?>', '<?php echo trans('february') ?>', '<?php echo trans('march') ?>', '<?php echo trans('april') ?>', '<?php echo trans('may') ?>', '<?php echo trans('june') ?>',
                  '<?php echo trans('july') ?>', '<?php echo trans('august') ?>', '<?php echo trans('september') ?>', '<?php echo trans('october') ?>', '<?php echo trans('november') ?>', '<?php echo trans('december') ?>'],
                  monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                  'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                  monthStatus: 'See another month',
                  yearStatus: 'See another year',
                  weekHeader: 'Sm',
                  weekStatus: '',
                  dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                  dayNamesShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                  dayNamesMin: ['<?php echo trans('su') ?>', '<?php echo trans('mo') ?>', '<?php echo trans('tu') ?>', '<?php echo trans('we') ?>', '<?php echo trans('th') ?>', '<?php echo trans('fr') ?>', '<?php echo trans('sa') ?>'],
                  dayStatus: 'Use DD as the first day of the week',
                  dateStatus: 'Choose the DD, MM of',
                  firstDay: 0,
                  initStatus: 'Choose date',
                  isRTL: false
              }; 

              $.datepicker.setDefaults($.datepicker.regional['en']);

        });
    </script>
<?php endif; ?>

