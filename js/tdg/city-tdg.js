class CityTDG {


    getProvinceHashTable(callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/city-api.php",
            data: {method: "getProvinceHashTable"}
        }).done(function (result) {
            
            console.log(result);
            
            result = JSON.parse(result);
            
            console.log(result);

            if (typeof (callbackMethod) !== "undefined") {
                callbackMethod(result);
            }
        });
    }

}