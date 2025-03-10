(function ($) {
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr("content");

    HT.setupNestable = () => {
        if ($("#nestable2").length) {
            $("#nestable2")
                .nestable({
                    group: 1,
                })
                .on("change", HT.updateNestableOutput);
        }
    };

    HT.updateNestableOutput = (e) => {
        var list = $(e.currentTarget);
        var output = $(list.data("output"));
        let json = window.JSON.stringify(list.nestable("serialize"));
        if (json.length) {
            let option = {
                json: json,
                _token: _token,
            };
            $.ajax({
                url: "/ajax/menu/drag",
                type: "POST",
                data: option,
                dataType: "json",
                success: function (res) {},
                beforeSend: function () {},
                error: function (jqXHR) {},
            });
        }
    };

    HT.runUpdateNestableOutput = () => {
        HT.updateNestableOutput({ currentTarget: $("#nestable2") });
    };

    HT.expandAndCollapse = () => {
        $("#nestable-menu").on("click", function (e) {
            var target = $(e.target),
                action = target.data("action");

            if (action === "expand-all") {
                $(".dd").nestable("expandAll");
            }

            if (action === "collapse-all") {
                $(".dd").nestable("collapseAll");
            }
        });
    };

    $(document).ready(function () {
        HT.setupNestable();
        HT.expandAndCollapse();
    });
})(jQuery);
