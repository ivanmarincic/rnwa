$(function() {
    $("td").click(function() {
        $("#output").html($(this).parent().html())
    });
});

