jQuery(document).ready(function() {
	selector = jQuery( '.cd-countdown-main').attr("data-format");
	countdown_selector	= jQuery( '.cd-countdown-main').find('.cd-countdown');
	//console.log( countdown_selector ); 
	selector = jQuery.parseJSON( selector );
 	year = selector.year;
 	month = selector.month;
 	days = selector.day;
 	hour = selector.hours;
 	minutes = selector.mintues;
 	timer_format = 'YODHMS';
 	timer_layout = '<div class="cd-count-down-holding"><div class="cd-countdown-digit-wrapper">{ynn}</div><div class="class="cd-countdown-unit-names">{yl}</div></div>';
	timer_labels = 'Years,Months,Days,Hours,Minutes,Seconds';
	timer_labels_singular = 'Years,Months,Days,Hours,Minutes,Seconds';
	timer_exp_text	= "";
	timezone = '';

	var timer_date = new Date( year,month,days,hour,minutes);

        jQuery('.cd-countdown').countdown({
            date: timer_date,
            offset: -8,
            day: 'Day',
            days: 'Days'
        }, function () {
            alert('Done!');
        });



});