var userEdit = {

    initialize: function() {
        $("#update-password-flag").on('change', function(){
            userEdit.passwordChangeFlgEvent();
        })
    },

    /*
     * ユーザーパスワードの変更フラグに対するアクション
     */
    passwordChangeFlgEvent : function (){
        $("#password").val("");
        if($("#update-password-flag").is(":checked")) {
            $(".pw-change").show();
        } else {
            $(".pw-change").hide();
        }
    },
}

$(function() {
   userEdit.initialize();
});