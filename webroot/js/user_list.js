var userEdit = {

    initialize: function() {
        const URL_CUT_STRING = "direction=";
        const ASC = "asc";
        const DESC = "desc";

        $("#th-sort-link-" + PHPVALUE.sort + " > i").removeClass("fa-sort");
        $("#th-sort-link-" + PHPVALUE.sort + " > i").addClass("fa-sort-amount-" + PHPVALUE.direction);

        userEdit.testFunction();
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
    },

    testFunction : () => {
    	// let tempArray = [1, 5, 55, 23, 85];
    	// let total = tempArray.some((elem) => {
    	// 	return (elem > 80);
    	// });
    	// console.log(total);			// false
    	// [1,2,3].map(x => x * x)

    	// ES 6
		const limit = 100;
		// limit = 200;
		console.log(limit);  // 100

    }
}

$(function() {
   userEdit.initialize();
});