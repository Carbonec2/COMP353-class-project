class ClientTDG {


    saveClientAndAccount(clientObject, callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/client-api.php",
            data: {method: "saveClientAndAccount", OV: JSON.stringify(clientObject)}
        }).done(function (result) {
            
            console.log(result);
            
            result = JSON.parse(result);
            
            console.log(result);

            if (typeof (callbackMethod) !== "undefined") {
                callbackMethod(result);
            }
        });
    }
    
    getAllNames(callbackMethod){     
        
        $.ajax({
            method: "POST",
            url: "api/client-api.php",
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
    
    getClientHashtable(callbackMethod) {
        $.ajax({
            method: "POST",
            url: "api/employee-api.php",
            data: {method: "getManagerHashtable"}
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