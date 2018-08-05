//global variable to the page instance
var thisPage;

$(document).ready(() => {

    thisPage = new WorkChoice();

});

class WorkChoice {

    constructor() {

        this.bind();

        this.data = [];
        //this.data.push({firstname: 'Bob', province: 'Québec'});

        this.handsontable = new Handsontable($('#workChoiceHandsontable')[0], {
            data: this.data,
            colHeaders: ['Contract Type', 'Platform'],
            rowHeaders: true,
            columns: [
                {data: 'contractType', type: 'dropdown', source: this.fetchContractType},
                {data: 'platform', type: 'dropdown', source: this.fetchPlatformType}
            ],
            minSpareRows: 1,
            stretchH: "all"
        });

        this.fetchData();
    }

    bind() {

        $("#formSubmit").click(() => {
            this.formSubmit();
        });
    }

    /**
     * Fetch data from the database
     * @returns {undefined}
     */
    fetchData() {
        
        workChoiceTDG.getWorkChoiceTable((workChoiceTableResult) => {

            console.log(workChoiceTableResult);
            this.data = workChoiceTableResult;
            this.handsontable.updateSettings({
                data: this.data
            });
            this.handsontable.render();
        });
    }

    /**
     * Handsontable dropdown source handler
     * @param {type} query
     * @param {type} process
     * @returns {undefined}
     */
    fetchPlatformType(query, process) {

        platformTypeTDG.getAllNames((result) => {
            process(result);
        });
    }
    
    /**
     * Handsontable dropdown source handler
     * @param {type} query
     * @param {type} process
     * @returns {undefined}
     */
    fetchContractType(query, process) {

        contractTypeTDG.getAllNames((result) => {
            process(result);
        });
    }

    getPageData() {

        return this.handsontable.getSourceData();
    }

    formSubmit() {
        
        console.log(this.getPageData());

        workChoiceTDG.saveWorkChoiceTable(this.getPageData(), (result) => {

            console.log(result);

        });
    }
}
