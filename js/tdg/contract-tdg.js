class ContractTDG {

    getContractTable(callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/contract-api.php",
            data: {method: "getContractTable"}
        }).done(function (result) {

            console.log(result);

            result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });
    }

    saveContractTable(data, callbackMethod) {
        $.ajax({
            method: "POST",
            url: "api/contract-api.php",
            data: {method: "saveContractTable", OV: JSON.stringify(data)}
        }).done(function (result) {

            console.log(result);

            //result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });

    }
    
    deleteContractFromList(data, callbackMethod) {
        $.ajax({
            method: "POST",
            url: "api/contract-api.php",
            data: {method: "deleteContractFromList", OV: JSON.stringify(data)}
        }).done(function (result) {

            console.log(result);

            //result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });

    }
    
    getContractList(contractId, callbackMethod) {
        $.ajax({
            method: "POST",
            url: "api/contract-api.php",
            data: {method: "getContractList", contractId: contractId}
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