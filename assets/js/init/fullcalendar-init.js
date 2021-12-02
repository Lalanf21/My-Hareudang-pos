
!function($) {
    "use strict";

    var CalendarApp = function() {
        this.$calendar = $('#calendar')
    };
    
    /* Initializing */
    CalendarApp.prototype.init = function() {

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            defaultView: 'month',  
            height: $(window).height() - 200,   
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
        });

    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    
}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);
