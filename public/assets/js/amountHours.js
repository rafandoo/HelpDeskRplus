/* A JavaScript function that is executed when the page is loaded. It is used to calculate the amount
of hours worked on a ticket. */
$(document).ready(function() {
    var ticket = $('#id').val();
    var url = "/ticket/" + ticket + "/occurrences";
    var amountHours = 0;
    $.get(url, function(data){
        $.each(data, function(i, occurrence){
            hours = moment(occurrence.final_time, "HH:mm").diff(moment(occurrence.initial_time, "HH:mm"));
            amountHours += hours;
        });
        d = moment.duration(amountHours);
        h = Math.floor(d.asHours());
        if (h < 10) h = "0" + h;
        s = h + moment.utc(amountHours).format(":mm");
        $('#amount_hours').val(s);
    });
});