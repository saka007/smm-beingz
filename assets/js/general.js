"use strict";

function General(){
    var self= this;
    this.init = function(){
        self.generalOption();
        self.uploadSettings();
        self.scriptLicense();
        self.services();
        self.checkout();
        self.blogs();
        self.apiProviders();
        if ($(".navbar-side").length > 0) {
            self.menuOption();
        }
    };

    this.menuOption = function(){
        const ps1 = new PerfectScrollbar('.navbar-side .scroll-bar', {
            wheelSpeed: 1,
            wheelPropagation: true,
            minScrollbarLength: 10,
            suppressScrollX: true
        });

        $(document).on("click", ".mobile-menu", function(){
            var _that = $(".navbar.navbar-side");
            if (_that.hasClass('navbar-folded')) {
                _that.removeClass('navbar-folded');
            }
            _that.toggleClass("active");
        });
    }

    this.blogs = function(){
        $(document).on('click', '.upload-image', function(){
            var url = PATH + "file_manager/upload_files",
                _that = $(this),
                _closest_div = _that.closest('div');
            $('.upload-image').fileupload({
                url: url,
                formData: {token:token, encrypt_name: 0, folder: 'blogs'},
                dataType: 'json',
                done: function (e, data) {
                if (data.result.status == "success") {
                  _img_link = data.result.link;
                  _closest_div.children('input').val(_img_link);
                }
              },
            });
        });
    }

    this.checkout = function(){
        $(document).on("submit", ".actionCheckoutForm", function(){
            $(".actionCheckoutForm .btn-submit").addClass('btn-loading');
            alertMessage.hide();
            event.preventDefault();
            var _that       = $(this),
                _action     = PATH + '/checkout/process',
                _data       = _that.serialize();
                _data       = _data + '&' + $.param({token:token});
            $.post(_action, _data, function(_result){
                if (is_json(_result)) {
                    _result = JSON.parse(_result);
                    setTimeout(function(){
                        if (_result.status == 'error') {
                            alertMessage.show(_result.message, _result.status);
                        }  
                        if (_result.status == 'success') {
                            $(".alert-message").addClass('d-none');
                            $(".alert-message .content").html('');
                        }
                        $(".actionCheckoutForm .btn-submit").removeClass('btn-loading');
                    }, 1500)
                }else{
                    $(".checkout-left .form-content").html(_result);
                }
            })
            return false;
        })
    }

    this.services = function(){

        $(document).on('click', '.check-all', function(){
            var _that      = $(this),
                _checkName = _that.data('name');
            $('.'+_checkName+'').prop('checked', this.checked);
        })

        $(document).on("change", ".ajaxChangeServiceType", function(){
            event.preventDefault();
            var _that   = $(this),
                _type    = _that.val();
            switch(_type) {
              case "default":
                $("#add_edit_service .dripfeed-form").removeClass("d-none");
                break;  
              default:
                $("#add_edit_service .dripfeed-form").addClass("d-none");
                break;
            }
        })

        $(document).on("click", ".ajaxActionOptions" , function(){
            event.preventDefault();
            var _that       = $(this),
                _type       = _that.data("type"),
                _action     = _that.attr("href"),
                _form       = _that.closest('form'),
                _ids        = _form.serialize(),
                _data       = _ids + '&' +$.param({token:token, type:_type});

            if ((_type == 'delete' || _type == 'all_deactive' || _type == 'clear_all')) {
                if(!confirm_notice('deleteItems')){
                    return;
                }
            }

            pageOverlay.show();
            $.post( _action, _data, function(_result){
                setTimeout(function () {
                    pageOverlay.hide();
                    notify(_result.message, _result.status);
                    if (_result.status == 'success') {
                        var _redirect = '';
                        reloadPage(_redirect);
                    }
                }, 2000);
            },'json')
        }) 
    }

    this.scriptLicense = function(){
        $(document).on("click", ".ajaxUpgradeVersion", function(){
            pageOverlay.show();
            event.preventDefault();
            var _that   = $(this),
                _action = _that.attr("href"),
                _data   = $.param({token:token});
            $.post(_action, _data, function(_result){
                setTimeout(function () {
                    pageOverlay.hide();
                    notify(_result.message, _result.status);
                    if (_result.status == 'success') {
                        var _redirect = '';
                        reloadPage(_redirect);
                    }
                }, 2000);
            },'json')
        })
    }

    this.apiProviders = function(){
        /*----------  Add a service from API provider  ----------*/
        $(document).on("click", ".ajaxAddService", function(){
            event.preventDefault();
            var _that               = $(this),
                _serviceid          = _that.data("serviceid"),
                _name               = _that.data("name"),
                _min                = _that.data("min"),
                _max                = _that.data("max"),
                _original_price     = _that.data("rate"),
                _dripfeed           = _that.data("dripfeed"),
                _api_provider_id    = _that.data("api_provider_id"),
                _type               = _that.data("type"),
                _service_desc       = _that.data("service_desc");
            
            $("#modal-add-service input[name=dripfeed]").val(_dripfeed);
            $("#modal-add-service input[name=service_id]").val(_serviceid);
            $("#modal-add-service input[name=name]").val(_name);
            $("#modal-add-service input[name=min]").val(_min);
            $("#modal-add-service input[name=max]").val(_max);
            $("#modal-add-service input[name=original_price]").val(_original_price);
            $("#modal-add-service input[name=api_provider_id]").val(_api_provider_id);
            $("#modal-add-service input[name=type]").val(_type);
            $("#modal-add-service textarea[name=service_desc]").val(_service_desc);
            $('#modal-add-service').modal('show');
        })

        $(document).on("click", ".ajaxUpdateApiProvider", function(){
            $("#result_notification").html("");
            pageOverlay.show();
            event.preventDefault();
            var _that       = $(this),
                _action     = _that.attr("href"),
                _redirect   = _that.data("redirect"),
                _data       = $.param({token:token});
            $.post(_action, _data, function(_result){
                setTimeout(function () {
                    pageOverlay.hide();
                    notify(_result.message, _result.status);
                    if(_result.status == 'success' && typeof _redirect != "undefined"){
                        reloadPage(_redirect);
                    }
                }, 2000);
            },'json')
        })

        /*----------  Sync Services  ----------*/
        $(document).on("submit", ".actionSyncApiServices", function(){
            $("#result_notification").html("");
            pageOverlay.show();
            event.preventDefault();
            var _that       = $(this),
                _action     = _that.attr("action"),
                _redirect   = _that.data("redirect"),
                _data;
            if ($("#mass_order").hasClass("active")) {
                _data = $("#mass_order").find("input[name!=mass_order]").serialize();
                var _mass_order_array = [];
                var _mass_orders = $("#mass_order").find("textarea[name=mass_order]").val();
                if (_mass_orders.length > 0 ) {
                    _mass_orders = _mass_orders.split(/\n/);
                    for (var i = 0; i < _mass_orders.length; i++) {
                        // only push this line if it contains a non whitespace character.
                        if (/\S/.test(_mass_orders[i])) {
                            _mass_order_array.push($.trim(_mass_orders[i]));
                        }
                    }
                }
                _data       = _data + '&' + $.param({mass_order:_mass_order_array, token:token});
            }else{
                _data       = _that.serialize();
                _data       = _data + '&' + $.param({token:token});
            }

            $.post(_action, _data, function(_result){
                if (is_json(_result)) {
                    _result = JSON.parse(_result);
                    if(_result.status == 'success' && typeof _redirect != "undefined"){
                        reloadPage(_redirect);
                    }
                    setTimeout(function(){
                        pageOverlay.hide();
                    },2000)
                    setTimeout(function () {
                        notify(_result.message, _result.status);
                    }, 3000);
                }else{
                    setTimeout(function(){
                        pageOverlay.hide();
                        $('#modal-ajax').modal('hide');
                        $("#result_notification").html(_result);
                    },2000)
                }
            })
            return false;
        })
    }

    this.generalOption = function(){
        // load ajax-Modal
        $(document).on("click", ".ajaxModal", function(){
            var _that = $(this),
                _url  = _that.attr("href");
            $('#modal-ajax').load(_url, function(){
                $('#modal-ajax').modal({
                    backdrop: 'static',
                    keyboard: false 
                });
                $('#modal-ajax').modal('show');
            });
            return false;
        });

        // ajaxChangeLanguage (footer)
        $(document).on("change", ".ajaxChangeLanguage", function(){
            event.preventDefault();
            var _that     = $(this),
                _ids      = _that.val(),
                _action   = _that.data("url") + _ids,
                _redirect = _that.data("redirect"),
                _data     = $.param({token:token, redirect:_redirect});
            $.post(_action, _data, function(_result){
                pageOverlay.show();
                setTimeout(function () {
                    pageOverlay.hide();
                    location.reload();
                }, 1000);
            },'json')
        })

        // ajaxChangeLanguageSecond (header top)
        $(document).on("click", ".ajaxChangeLanguageSecond", function(){
            event.preventDefault();
            var _that     = $(this),
                _ids      = _that.data("ids"),
                _action   = _that.data("url") + _ids,
                _redirect = _that.data("redirect"),
                _data     = $.param({token:token, redirect:_redirect});
            $.post(_action, _data, function(_result){
                pageOverlay.show();
                setTimeout(function () {
                    pageOverlay.hide();
                    location.reload();
                }, 1000);
            },'json')
        })

        // ajaxChangeStatus ticket
        $(document).on("click", ".ajaxChangeStatus", function(){
            event.preventDefault();
            var _that   = $(this),
                _action = _that.data("url"),
                _status = _that.data("status"),
                _data   = $.param({token:token, status:_status});
            $.post(_action, _data, function(_result){
                pageOverlay.show();
                setTimeout(function () {
                    pageOverlay.hide();
                    notify(_result.message, _result.status);
                }, 2000);
                if (_status == 'new' || _status == 'unread') {
                    var _redirect = PATH + 'tickets';
                }else{
                    var _redirect = '';
                }
                reloadPage(_redirect);
            },'json')
        })

        // callback ajaxChange
        $(document).on("change", ".ajaxChange" , function(){
            pageOverlay.show();
            event.preventDefault();
            var _that       = $(this),
                _id         = _that.val();
            if (_id == "") {
                pageOverlay.hide();
                return false;
            }
            var _action     = _that.data("url") + _id,
                _data       = $.param({token:token});
            $.post( _action, _data,function(_result){
                pageOverlay.hide();
                setTimeout(function () {
                    $("#result_ajaxSearch").html(_result);
                }, 100);
            });
        })  

        // callback ajaxChangeCategory
        $(document).on("change", ".ajaxChangeCategory" , function(){
            event.preventDefault();
            $("#new_order .drip-feed-option").addClass("d-none");
            if ($("#order_resume").length > 0) {
                $("#order_resume input[name=service_name]").val("");
                $("#order_resume input[name=service_min]").val("");
                $("#order_resume input[name=service_max]").val("");
                $("#order_resume input[name=service_price]").val("");
                $("#order_resume textarea[name=service_desc]").val("");
                $("#order_resume #service_desc").val("");
            }
            var _that       = $(this);
            var _id         = _that.val();
            if (_id == "") {
                return;
            }
            var _action     = _that.data("url") + _id;
            var _data       = $.param({token:token});
            $.post( _action, _data,function(_result){
                setTimeout(function () {
                    $("#result_onChange").html(_result);
                }, 100);
            });
        })  

        // callback ajaxSearch
        $(document).on("submit", ".ajaxSearchItem" , function(){
            pageOverlay.show();
            event.preventDefault();
            var _that       = $(this),
                _action     = _that.attr("action"),
                _data       = _that.serialize(),
                _data       = _data + '&' + $.param({token:token});
            $.post( _action, _data, function(_result){
                setTimeout(function () {
                    pageOverlay.hide();
                    $("#result_ajaxSearch").html(_result);
                }, 300);
            });
        })

        // callback actionForm
        $(document).on("submit", ".actionForm", function(){
            pageOverlay.show();
            event.preventDefault();
            var _that       = $(this),
                _action     = _that.attr("action"),
                _redirect   = _that.data("redirect");
            if ($("#mass_order").hasClass("active")) {
                var _data = $("#mass_order").find("input[name!=mass_order]").serialize();
                var _mass_order_array = [];
                _mass_orders = $("#mass_order").find("textarea[name=mass_order]").val();
                if (_mass_orders.length > 0 ) {
                    _mass_orders = _mass_orders.split(/\n/);
                    for (var i = 0; i < _mass_orders.length; i++) {
                        // only push this line if it contains a non whitespace character.
                        if (/\S/.test(_mass_orders[i])) {
                            _mass_order_array.push($.trim(_mass_orders[i]));
                        }
                    }
                }
                _data       = _data + '&' + $.param({mass_order:_mass_order_array, token:token});
            }else{
                var _data       = _that.serialize();
                    _data       = _data + '&' + $.param({token:token});
            }

            $.post(_action, _data, function(_result){
                setTimeout(function(){
                    pageOverlay.hide();
                },1500)
                if (is_json(_result)) {
                    _result = JSON.parse(_result);
                    setTimeout(function(){
                        notify(_result.message, _result.status);
                    },1500)
                    setTimeout(function(){
                        if(_result.status == 'success' && typeof _redirect != "undefined"){
                            reloadPage(_redirect);
                        }
                    }, 2000)
                }else{
                    setTimeout(function(){
                        $("#resultActionForm").html(_result);
                    }, 1500)
                }
            })
            return false;
        })

        // actionFormWithoutToast
        $(document).on("submit", ".actionFormWithoutToast", function(){
            $(".actionFormWithoutToast .btn-submit").addClass('btn-loading');
            alertMessage.hide();
            event.preventDefault();
            var _that       = $(this),
                _action     = _that.attr("action"),
                _data       = _that.serialize();
                _data       = _data + '&' + $.param({token:token});
            
            $.post(_action, _data, function(_result){
                if (is_json(_result)) {
                    _result = JSON.parse(_result);
                    setTimeout(function(){
                        alertMessage.show(_result.message, _result.status);
                    }, 1500)
                }else{
                    setTimeout(function(){
                        $("#resultActionForm").html(_result);
                    }, 1500)
                }

                setTimeout(function(){
                    $(".actionFormWithoutToast .btn-submit").removeClass('btn-loading');
                }, 1500)
            })
            return false;
        })

        // callback Delete item
        $(document).on("click", ".ajaxDeleteItem", function(){
            event.preventDefault();
            if(!confirm_notice('deleteItem')){
                return;
            }
            var _that       = $(this),
                _action     = _that.attr("href"),
                _data       = $.param({token:token});

            $.post(_action, _data, function(_result){
                pageOverlay.show();
                if(_result.status =='success'){
                    $(".tr_" + _result.ids).remove();
                }
                setTimeout(function () {
                    pageOverlay.hide();
                    notify(_result.message, _result.status);
                }, 2000);
            },'json')
        })

        /*----------  callback Change status itme  ----------*/
        $(document).on("click", ".ajaxChangeStatusItem", function(){
            event.preventDefault();
            var _that       = $(this),
                _action     = _that.attr("href"),
                _status     = _that.data("status"),
                _redirect   = _that.data("redirect"),
                _data       = $.param({token:token, status:_status});
            $.post(_action, _data, function(_result){
                pageOverlay.show();
                setTimeout(function () {
                    pageOverlay.hide();
                    notify(_result.message, _result.status);
                }, 2000);
                if (_result.status == 'success' && typeof _redirect != "undefined") {
                    reloadPage(_redirect);
                }
            },'json')
        })
    }

    // Upload media on Settings page
    this.uploadSettings = function () {
        var url = PATH + "file_manager/upload_files";
        $(document).on('click','.settings_fileupload', function(){
            var _that = $(this),
                _closest_div = _that.closest('div');
            $('.settings .settings_fileupload').fileupload({
                url: url,
                formData: {token:token},
                dataType: 'json',
                done: function (e, data) {
                if (data.result.status == "success") {
                  var _img_link = data.result.link;
                      _closest_div.children('input').val(_img_link);
                }
              },
            });
        });
    }

    // Check post type
    $(document).on("change","input[type=radio][name=email_protocol_type]", function(){
      var _that = $(this),
          _type = _that.val();
      if(_type == 'smtp'){
        $('.smtp-configure').removeClass('d-none');
      }else{
        $('.smtp-configure').addClass('d-none');
      }
    });
}
General= new General();
$(function(){
    General.init();
});
