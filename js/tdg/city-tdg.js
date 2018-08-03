class CityTDG {


    getProvinceHashTable(callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/city-api.php",
            data: {method: "getProvinceHashTable"}
        }).done(function (result) {            
            result = JSON.parse(result);

            if (typeof (callbackMethod) !== "undefined") {
                callbackMethod(result);
            }
        });
    }

}