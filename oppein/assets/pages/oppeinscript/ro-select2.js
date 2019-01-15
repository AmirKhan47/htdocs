var ComponentsSelect2 = function() {
    var handleDemo = function() {
        $.fn.select2.defaults.set("theme", "bootstrap");
        $.fn.modal.Constructor.prototype.enforceFocus = function () {};
        $('.ro_list').select2({
            width: null,
        });
    };

    return {
        //main function to initiate the module
        init: function() {
            handleDemo();
        }
    };
}();

jQuery(document).ready(function() {
    ComponentsSelect2.init();
});