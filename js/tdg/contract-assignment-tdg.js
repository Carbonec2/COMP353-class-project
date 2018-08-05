class ContractAssignmentTDG {

    getContractAssignmentTable(callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/contract-assignment-api.php",
            data: {method: "getContractAssignmentTable"}
        }).done(function (result) {

            console.log(result);

            result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });
    }

    saveContractAssignmentTable(data, callbackMethod) {
        $.ajax({
            method: "POST",
            url: "api/contract-assignment-api.php",
            data: {method: "saveContractAssignmentTable", OV: JSON.stringify(data)}
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