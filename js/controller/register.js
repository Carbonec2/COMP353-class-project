//global variable to the page instance
var thisPage;

$(document).ready(()=>{
    
    thisPage = new Register();
    
});

class Register{
    
    constructor(){
        
        this.bind();
        
    }
    
    bind(){
        
        $("#formSubmit").click(()=>{
            formSubmit();
        });
    }
    
    getPageData(){
        
        let resultObject = {};
        
        resultObject.username = $("#username").val();
        resultObject.password = $("#password").val();
        
        return resultObject;
    }
    
    formSubmit(){
        let data = this.getPageData();
            accountTDG.checkAuthentification(data, (result)=>{
                if(typeof(result)!=="undefined"&&result !==false && typeof(result.id)!=="undefined"&&parseInt(result.id)!==0){
                    console.log("Authentication successful");
                }
                
                console.log(result);
            });
    }
}
