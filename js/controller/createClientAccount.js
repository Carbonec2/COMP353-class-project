//global variable to the page instance
var thisPage;

$(document).ready(() => {

    thisPage = new CreateClientAccount();

});

class CreateClientAccount {

    constructor() {

        this.data = {};

        this.bind();
        this.selectFill();

        $("#city").attr('disabled', true);//Enabled only when we select a province, see selectFill member method

    }

    bind() {

        $("#formSubmit").click(() => {
            this.formSubmit();
        });
    }

    setPageData() {



    }

    selectFill() {

        cityTDG.getProvinceHashTable((result) => {

            //Fill choices
            let provinces = Object.keys(result);

            provinces.forEach((entry) => {
                $("#province").append($("<option />").val(entry).text(entry));
            });

            $("#province").change(() => {
                $("#city").empty();

                //We append the set of cities from the selected province
                let cities = result[$("#province").val()];

                cities.forEach((entry) => {
                    $("#city").append($("<option />").val(entry).text(entry));
                });

                $("#city").attr('disabled', false);
            });

            //We trigger it because there is a default value set above
            $("#province").trigger('change');
        });
    }

    getPageData() {

        let resultObject = {};

        let formAttributes = $("#clientAccountForm input[id]")         // find spans with ID attribute
                .map(function () {
                    return this.id;
                }) // convert to set of IDs
                .get(); // convert to instance of Array (optional)

        let selectAttributes = $("#clientAccountForm select[id]")         // find spans with ID attribute
                .map(function () {
                    return this.id;
                }) // convert to set of IDs
                .get();

        formAttributes = formAttributes.concat(selectAttributes);


        //We take every attribute and set the corresponding value of the object member
        formAttributes.forEach((id) =>
        {
            resultObject[id] = $('#' + id).val();
        });

        return resultObject;
    }

    formSubmit() {
        let data = this.getPageData();

        console.log(data);

        clientTDG.saveClientAndAccount(data, (result) => {
            
            //We should redirect to a general panel, but we will do it later on

            $("#clientAccountForm").empty();

            let $p = $('<p></p>');
            $p.append('Account created with success. Client number: ' + result);

            $("#clientAccountForm").append($p);
            
            $("#formSubmit").empty();

            console.log(result);
        });
    }
}
