class EmployeeTDG {

    getEmployeeTable(callbackMethod) {

        //AJAX request to validate if we can authenticate the user

        $.ajax({
            method: "POST",
            url: "api/employee-api.php",
            data: {method: "getEmployeeTable"}
        }).done(function (result) {

            console.log(result);

            result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });
    }

    saveEmployeeTable(data, callbackMethod) {
        $.ajax({
            method: "POST",
            url: "api/employee-api.php",
            data: {method: "saveEmployeeTable", OV: JSON.stringify(data)}
        }).done(function (result) {

            console.log(result);

            result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });

    }

    getManagerHashtable(callbackMethod) {
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

    getEmployeeHashtable(callbackMethod) {
        $.ajax({
            method: "POST",
            url: "api/employee-api.php",
            data: {method: "getEmployeeHashtable"}
        }).done(function (result) {

            console.log(result);

            result = JSON.parse(result);

            console.log(result);

            if (typeof (callbackMethod) !== "undefined" && typeof (callbackMethod) === "function") {
                callbackMethod(result);
            }
        });
    }

    getInterestedEmployees(contractId, cb) {
        
        console.log(contractId);
        $.ajax({
            method: "POST",
            url: "api/employee-api.php",
            data: {method: "getInterestedEmployees", contract: contractId}
        }).done(res => {
            console.log(res);
            const json = JSON.parse(res);
            console.log(json);

            if (typeof (cb) === "function") {
                cb(json);
            }
        });
    }
}

