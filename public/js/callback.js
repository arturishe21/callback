"use strict";

var Callback =
{
    init: function()
    {
        jQuery("[name=callback]").validate({
            rules : {
                phone_callback : {
                    required : true
                }
            },

            errorPlacement : function(error, element) {
                error.insertAfter(element);
            },

            submitHandler: function(form) {
                $(".callback_result").html("<span style='color:green'>Отправка...</span>");
                $.post("/callback/send", {filds : $("[name=callback]").serialize() },
                    function (data) {
                        if (data.status == "error") {
                            $(".callback_result").html(data.errors_messages);
                        } else {
                            $(".callback_result").html("<span style='color:green'>" + data.text + "</span>");
                            $("[name=callback] input").val("");
                        }
                    },"json");
            }
        });
    }
};

$(document).ready(function(){
    Callback.init();
});
