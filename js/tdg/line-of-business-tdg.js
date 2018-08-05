class LineOfBusinessTDG {

    getAll(callbackMethod) {

        $.ajax({
            method: "POST",
            url: "api/line-of-business-api.php",
            data: {method: "getAll"}
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