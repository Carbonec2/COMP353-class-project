class AccountTDG {


    checkAuthentification(identifiers, callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/account-api.php",
            data: {method: "checkAuthentification", data: JSON.encode(identifiers)}
        }).done(function (result) {
            
            result = JSON.decode(result);
            
            console.log(result);

            if (typeof (callbackMethod) !== "undefined") {
                callbackMethod(result);
            }
        });
    }

}