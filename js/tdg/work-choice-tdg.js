class WorkChoiceTDG {

    getWorkChoiceTable(callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/work-choice-api.php",
            data: {method: "getWorkChoiceTable"}
        }).done(function (result) {

            console.log(result);

            result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });
    }

    saveWorkChoiceTable(data, callbackMethod) {
        $.ajax({
            method: "POST",
            url: "api/work-choice-api.php",
            data: {method: "saveWorkChoiceTable", OV: JSON.stringify(data)}
        }).done(function (result) {

            console.log(result);

            result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });

    }
    

}