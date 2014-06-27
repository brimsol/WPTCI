<script>
    function test_status() {
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url('front/modules/result_status'); ?>',
            //data: {postVar1: 'theValue1', postVar2: 'theValue2'},
            beforeSend: function() {

                $('#footer_notes').text('working on your request...');
            },
            success: function(data) {
                // successful request; do something with the data

                status_checker(data)

            },
            error: function() {
                // failed request; give feedback to user
                $('#footer_notes').html('Lost connection with server, we are re-trying..');
                setTimeout(function() {
                    test_status();
                }, 5000);
            }
        });
    }

    function get_result() {
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url('front/modules/get_result'); ?>',
            //data: {postVar1: 'theValue1', postVar2: 'theValue2'},
            beforeSend: function() {
                $('#footer_notes').empty();
                $('#footer_notes').text('Aggregating result data..');

                setTimeout(function() {
                    $('#footer_notes').empty();
                    $('#footer_notes').text('Populating reports...');
                }, 5000);
            },
            success: function(data) {
                // successful request; do something with the data
                if (data == 200) {
                    $('#footer_notes').empty();
                    $('#footer_notes').text('Report sent successfully, you will redirect to home');

                    setTimeout(function() {
                        redirect_success();
                    }, 3000);
                } else {
                    $('#footer_notes').empty();
                    $('#footer_notes').text('Sorry some error occured, you will redirect to home');

                    setTimeout(function() {
                       redirect();
                    }, 3000);
                }
                //status_checker(data)

            },
            error: function() {
                // failed request; give feedback to user
                $('#footer_notes').empty();
                $('#footer_notes').text('Lost connection with server, we are re-trying..');
            }
        });
    }

    function redirect_success() {
        window.location.replace("<?php echo site_url('front/modules/report_sent'); ?>");
        //alert('error');
    }
    
    function redirect() {
        window.location.replace("<?php echo site_url(); ?>");
        //alert('error');
    }

    function status_checker(stat) {

        if (stat >= 100 && stat < 200) {
            $('#footer_notes').empty();
            $('#footer_notes').text('working on your request...');
            setTimeout(function() {
                test_status();
            }, 5000);
        } else if (stat == 200) {
            $('#footer_notes').empty();
            $('#footer_notes').text('Aggregating result data..');
            setTimeout(function() {
                get_result();
            }, 5000);
        }
        else if (stat >= 400) {
            $('#footer_notes').empty();
            $('#footer_notes').text('Sorry some error occured, we are working on it.');
            setTimeout(function() {
                redirect();
            }, 5000);
        } else if (stat == 20) {
            $('#footer_notes').empty();
            $('#footer_notes').text('Lost connection with server, we are re-trying..');
            setTimeout(function() {
                test_status();
            }, 5000);
        } else if (stat == 20) {
            $('#footer_notes').empty();
            $('#footer_notes').text('Sorry some error occured, we are working on it.');
             setTimeout(function() {
                redirect();
            }, 3000);
        } else {
            $('#footer_notes').empty();
            $('#footer_notes').text('Sorry some error occured, we are working on it.');
             setTimeout(function() {
                redirect();
            }, 3000);
        }
    }

    test_status();
</script>