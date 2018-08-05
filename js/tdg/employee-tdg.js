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

}