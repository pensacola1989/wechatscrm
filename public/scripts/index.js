var register = register || (function () {

    function validateData ($d) {
        
    }

    function redirect (url) {
        window.location.href = url;
    }

    var formValidation =  (function() {
        var $textInputs = $('.input');
        //校验密码：只能输入6-20个字母、数字、下划线
        var rules = {
            'InputEmail': /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
            'InputUserName': /^\s*[\s\S]{1,10}\s*$/,
            'InputPassword': /^(\w){6,20}$/,
            'InputMobile': /^1[3|4|5|8][0-9]\d{4,8}$/,
            'InputQQ': /^(\w){5,20}$/
        };

        var tips = {
            'InputEmail': '请输入正确的E-mail地址',
            'InputPassword' : '不超过十个字符',
            'InputName': '26个字母下划线'
        }

        function validData () {
            var input = $('.input')
                ,tag = true;
            $.each(input,function (index,i) {
                var id = $(this).attr('id');
                var val = $(this).val();
                if(id != 'InputPassword2') {
                    tag = tag && rules[id].test(val);                    
                }
            });
            tag = tag && $('#InputPassword').val() != $('#InputPassword2')
            return tag;
        }

        function setFocusinAndOut() {
            $textInputs
                .focusout(function() {
                    var id = $(this).attr('id');
                    var val = $(this).val();

                    if(rules[id] != undefined) {
                        var isOk = rules[id].test(val);                        
                    }

                    if(id == 'InputPassword2' ) {
                        if( $(this).val() == $('#InputPassword').val()) {
                            isOk = true;
                        }
                    }

                    var temp = isOk
                        ? '<span style="color:green;" class="glyphicon glyphicon-ok"></span>'
                        : '<span style="color:orangered;" class="glyphicon glyphicon-remove"></span>';

                    $(this).siblings('.tips').html(temp);
                });
        }
        function bindEvent () {
            $('.btn-default').click(function () {
                
                if(validData()) {
                    addUser();
                }
            });
        }

        function addUser () {
            $('.btn-default').addClass('disabled');
            var obj = {
                'username': $('#InputUserName').val(),
                '   email': $('#InputEmail').val(),
                'password': $('#InputPassword').val(),
                      'qq': $('#InputQQ').val(),
                  'mobile': $('#InputMobile').val()
            }
            console.log(obj);
            $.ajax({
                type: 'POST',
                data: obj,
                url: '/newuser',
                dataType: 'json'
            })
            .success(function (data) {
                if(data) {
                    obj = data;
                    var template = [
                        '<p><span class="cb-url" style="color:#CACACA">回掉地址：</span>{url}</p>',
                        '<p><span class="cb-url" style="color:#CACACA">Token：</span>{token}</p>'
                    ].join('');
                    template = template.replace('{url}',obj.callbackurl);
                    template = template.replace('{token}',obj.token);
                    $('.modal-body').html(template);
                    $('#myModal').modal();
                    // setTimeout(function () {
                    //     window.location.href = '/dashboard';
                    // },1000);
                }
            })
            .error(function () {
                
            })
            .complete(function () {
                $('.btn-default').removeClass('disabled');
            });
        }

        function init() {
            setFocusinAndOut();
            bindEvent();
        }

        return {
            init: init
        };

    })();
    return {
        init: formValidation.init
    }
})();