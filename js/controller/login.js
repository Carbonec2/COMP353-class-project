//global variable to the page instance
var thisPage;

$(document).ready(() => {

    thisPage = new Login();

});

class Login {

    constructor() {

        this.bind();

    }

    bind() {

        $("#formSubmit").click(() => {
            this.formSubmit();
        });
    }

    getPageData() {

        let resultObject = {};

        resultObject.username = $("#username").val();
        resultObject.password = $("#password").val();

        return resultObject;
    }

    formSubmit() {
        let data = this.getPageData();
        accountTDG.checkAuthentification(data, (result) => {
            if (typeof (result) !== "undefined" && result !== false && typeof (result.id) !== "undefined" && parseInt(result.id) !== 0) {
                location.reload(true);
                //console.log("Authentication successful");
                //$("#formContent").empty();
                //$("#formContent").html('<p>Authentication successful</p>');
                
            }
            
            if(result === false){
                $("#formContent").empty();
                $("#formContent").html('<p>Authentication failed, wrong username or password <br/><a href="index.php?page=login">Try again</a></p>');
            }

            console.log(result);
        });
    }
}
