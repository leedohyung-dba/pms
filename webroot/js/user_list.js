var userEdit = {

    initialize: function() {
        const URL_CUT_STRING = "direction=";
        const ASC = "asc";
        const DESC = "desc";

        console.log(PHPVALUE);
        $("#th-sort-link-" + PHPVALUE.sort + " > i").removeClass("fa-sort");
        $("#th-sort-link-" + PHPVALUE.sort + " > i").addClass("fa-sort-amount-" + PHPVALUE.direction);

    },

    /*
     * その要素のsortされている状態を確認して変更が必要だったら変更する
     */
    changeSortIcon : function (href){
        var href = href.split(URL_CUT_STRING);
        if(href[1] == ASC) {
            "fa-sort-amount-desc"
        } else if(href[1] == DESC) {
            fa-sort-amount-asc
        }
    }
}

$(function() {
   userEdit.initialize();
});