(function ($) {
    'use strict';
    $(function () {
        var body = $('body');
        var contentWrapper = $('.content-wrapper');
        var scroller = $('.container-scroller');
        var footer = $('.footer');
        var sidebar = $('.sidebar');

        //Add active class to nav-link based on url dynamically
        //Active class can be hard coded directly in html file also as required

        function addActiveClass(element) {
            if (current === "") {
                //for root url
                if (element.attr('href').indexOf("index.html") !== -1) {
                    element.parents('.nav-item').last().addClass('active');
                    if (element.parents('.sub-menu').length) {
                        element.closest('.collapse').addClass('show');
                        element.addClass('active');
                    }
                }
            } else {
                //for other url
                if (element.attr('href').indexOf(current) !== -1) {
                    element.parents('.nav-item').last().addClass('active');
                    if (element.parents('.sub-menu').length) {
                        element.closest('.collapse').addClass('show');
                        element.addClass('active');
                    }
                    if (element.parents('.submenu-item').length) {
                        element.addClass('active');
                    }
                }
            }
        }

        var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
        $('.nav li a', sidebar).each(function () {
            var $this = $(this);
            addActiveClass($this);
        })

        //Close other submenu in sidebar on opening any

        sidebar.on('show.bs.collapse', '.collapse', function () {
            sidebar.find('.collapse.show').collapse('hide');
        });

        //Delete confimation

        $("button[data-delete]").click(function () {
            $("#deleteField").val($(this).data('delete'))
        })

        //Form type
        $("#customerType").change(function () {
            if ($(this).val() === "I") {
                $(".form-group.type-i").show();
                $(".form-group.type-b").hide();
            } else {
                $(".form-group.type-i").hide();
                $(".form-group.type-b").show();
            }
        })
        if ($("#customerType").val() === "I") {
            $(".form-group.type-i").show();
            $(".form-group.type-b").hide();
        } else {
            $(".form-group.type-i").hide();
            $(".form-group.type-b").show();
        }

        // Form submission
        function getFormData($form) {
            var unindexed_array = $form.serializeArray();
            var indexed_array = {};

            $.map(unindexed_array, function (n, i) {
                indexed_array[n['name']] = n['value'] || null;
            });

            return indexed_array;
        }

        $("form.needs-validation").on('submit', function (e) {
            let that = $(this);
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: JSON.stringify(getFormData(that)),
                dataType: "json",
                contentType: "application/json; charset=utf-8",
            })
                .done(function () {
                    if (that.hasClass("redirect")) {
                        window.location.href = that.data("redirect");
                    } else {
                        window.location.reload();
                    }
                })
                .fail(function (result) {
                    let response = result.responseJSON;
                    let group = that.find("input,select").parent();
                    group.removeClass("has-danger");
                    group.find(".error-message").remove();
                    Object.keys(response).forEach((item) => {
                        let input = that.find("input[name='" + item + "'],select[name='" + item + "']")
                        let group = input.parent();
                        let error = group.find(".error-message");
                        group.addClass("has-danger")
                        group.append($("<div>").addClass("text-danger").addClass("error-message").text(response[item][0]))
                    })
                })
        })

        //Change sidebar

        $('[data-toggle="minimize"]').on("click", function () {
            body.toggleClass('sidebar-icon-only');
        });

        //checkbox and radios
        $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

        // Remove pro banner on close
        if ($.cookie('majestic-free-banner') != "true") {
            document.querySelector('#proBanner').classList.add('d-flex');
        } else {
            document.querySelector('#proBanner').classList.add('d-none');
        }
        document.querySelector('#bannerClose').addEventListener('click', function () {
            document.querySelector('#proBanner').classList.add('d-none');
            document.querySelector('#proBanner').classList.remove('d-flex');
            var date = new Date();
            date.setTime(date.getTime() + 24 * 60 * 60 * 1000);
            $.cookie('majestic-free-banner', "true", {expires: date});
        });
    });
})(jQuery);
