(function($, undefined) {
    "use strict";
    $(function() {
        var $input = $("input#price");
        $input.on("keyup", function(event) {
            var selection = window.getSelection().toString();
            if (selection !== '') {
                return;
            }
            if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
                return;
            }
            var $this = $(this);
            var input = $this.val();
            var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt(input, 10) : 0;
            $this.val(function() {
                return (input === 0) ? "" : input.toLocaleString("vi-VI");
            });
        });
    });
})(jQuery);
