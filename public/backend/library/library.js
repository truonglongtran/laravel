(function($){
    "use strict";
    var HT = {};
    var documentEl = $(document); // tránh override object document gốc

    HT.switchery = () => {
        $('.js-switch').each(function(){
            new Switchery(this, { color: '#1AB394' });
        });
    };

    HT.select2 = () => {
        $('.setupSelect2').select2();
    };

    HT.datetime = () => {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });
    };

    documentEl.ready(function(){
        HT.switchery();
        HT.select2();
        HT.datetime(); // gọi khởi tạo datepicker ở đây
    });
})(jQuery);
