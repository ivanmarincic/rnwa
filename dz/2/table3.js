$(function() {
    $("td").mouseover(function($event) {
        var that = $(this);
        $("#tooltip")
            .addClass("active")
            .html($(this).parent().html())
            .css("left", $event.clientX + 10 + "px")
            .css("top", $event.clientY + 10 + "px");
        that.one("mouseout", function($event) {
            $("#tooltip")
                .removeClass("active")
                .html(null);
        })
    });
});


