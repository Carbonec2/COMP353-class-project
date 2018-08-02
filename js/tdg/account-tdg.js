class AccountTDG {


    checkAuthentification(identifiers, callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/account-api.php",
            data: {method: "checkAuthentification", OV: JSON.stringify(identifiers)}
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