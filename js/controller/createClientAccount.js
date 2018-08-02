//global variable to the page instance
var thisPage;

$(document).ready(() => {

    thisPage = new CreateClientAccount();

});

class CreateClientAccount {

    constructor() {

        this.data = {};

        this.bind();


    }

    bind() {

        $("#formSubmit").click(() => {
            this.formSubmit();
        });
    }

    setPageData() {



    }

    getPageData() {
        
        let resultObject = {};

        let formAttributes = $("#clientAccountForm input[id]")         // find spans with ID attribute
                .map(function () {
                    return this.id;
                }) // convert to set of IDs
                .get(); // convert to instance of Array (optional)

                //We take every attribute and set the corresponding value of the object member
                formAttributes.forEach((id)=>
                {
                    resultObject[id] = $('#'+id).val();
                });

        return resultObject;
    }

    formSubmit() {
        let data = this.getPageData();
        
        console.log(data);
        
        
        
        clientTDG.saveClientAndAccount(data, (result) => {
            if (typeof (result) !== "undefined" && result !== false && typeof (result.id) !== "undefined" && parseInt(result.id) !== 0) {
                console.log("Authentication successful");
            }

            console.log(result);
        });
    }
}
