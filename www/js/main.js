$(document).ready(function(){
    var datepickerBind = function() {
      $('.datepicker').datepicker({
          orientation: 'left top'
      });      
    }
    
    $.nette.init();

    datepickerBind();
    
    $.nette.ext('datepicker', {
        load: datepickerBind
    });    
});