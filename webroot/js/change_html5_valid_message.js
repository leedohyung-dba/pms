'use strict';

// HTML5で提供しているFORM VAIDATIONのカスタマイズ
(function() {
    $(function () {
        const VALID_MESSAGE_REQUIRED = "🌟💀ウアアア！！！💀🌟\n 🌟💀入力してください!!!💀🌟";
        const VALID_MESSAGE_TYPE = "🌟💀ウアアア！！！💀🌟\n 🌟💀指定されている形式で入力してください💀🌟";

        $("input").each(function(index, elem) {
            // console.log(elem.validity);
            elem.addEventListener('invalid', function(e) {
            // checkValidity メソッドがINPUT要素の条件が、不一致場合に「invalid」イベントが動作
                if(elem.validity.valueMissing){
                    //必須項目の条件不一致場合
                    e.target.setCustomValidity(VALID_MESSAGE_REQUIRED);
                } else if(elem.validity.typeMismatch) {
                    //必須条件以外の条件不一致場合
                    e.target.setCustomValidity(VALID_MESSAGE_TYPE);
                } else {
                    return true;
                }
                elem.addEventListener('input', function(e){
                    //バリデーションが発生した後、消しながら出るメッセージ
                    e.target.setCustomValidity('');
                });
            }, false);
        });
        $('datepicker').on('change', function() {
            $(this).addEventListener('invalid', function(e) {
                e.target.setCustomValidity('');
            });
        });
    });
})();