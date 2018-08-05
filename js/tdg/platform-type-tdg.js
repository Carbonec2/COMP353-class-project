class PlatformTypeTDG {

    getAllNames(callbackMethod) {

        $.ajax({
            method: "POST",
            url: "api/platform-type-api.php",
            data: {method: "getAllNames"}
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