class ContractAssignmentTDG {

    getContractAssignmentTable(contractId, callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/contract-assignment-api.php",
            data: {method: "getContractAssignmentTable", OV: contractId}
        }).done(function (result) {

            console.log(result);

            result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });
    }

    saveContractAssignmentTable(data, contract, callbackMethod) {
        $.ajax({
            method: "POST",
            url: "api/contract-assignment-api.php",
            data: {method: "saveContractAssignmentTable", OV: JSON.stringify(data), contract}
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
