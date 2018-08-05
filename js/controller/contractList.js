//global variable to the page instance
var thisPage;

$(document).ready(() => {

    thisPage = new ContractList();

});

class ContractList {

    constructor() {

        this.bind();

        this.data = [];
        //this.data.push({firstname: 'Bob', province: 'Québec'});

        this.buildTable();

        this.fetchData();
    }

    bind() {

        $("#formSubmit").click(() => {
            this.formSubmit();
        });
    }
    
    buildTable(role){
        
        
        
        
        this.handsontable = new Handsontable($('#contractListHandsontable')[0], {
            data: this.data,
            colHeaders: ['Company Name', 'Manager', 'Annual Contract Value', 'Initial Amount',
                'Service Start Date', 'Service End Date', 'Platform Type', 'Contract Type', 'Satisfaction Score (0-10)'],
            rowHeaders: true,
            columns: [
                {data: 'companyName', type: 'dropdown', source: this.fetchCompanyList},
                {data: 'manager', type: 'dropdown', source: this.fetchManagerList},
                {data: 'annualContractValue', type: 'numeric',
                    numericFormat: {
                        pattern: '$0,0.00',
                        culture: 'en-US' // this is the default culture, set up for USD
                    }},
                {data: 'initialAmount', type: 'numeric',
                    numericFormat: {
                        pattern: '$0,0.00',
                        culture: 'en-US' // this is the default culture, set up for USD
                    }},
                {data: 'serviceStartDate', type: 'date'},
                {data: 'serviceEndDate', type: 'date'},
                {data: 'platformType', type: 'dropdown', source: this.fetchPlatformType},
                {data: 'contractType', type: 'dropdown', source: this.fetchContractType},
                {data: 'satisfactionScore', type: 'numeric', validator: /^[0-9]$|^10$/} //0 to 10 with this regex
            ],
            minSpareRows: 1,
            beforeChange: (changes, source) => {
                //Only triggered when we change a cell after filling the table
                //We cannot reference this method as a pointer to the method, since we would loose the lexical 'this'

                //[0][row, prop, oldValue, newValue]
            },
            stretchH: "all"
        });
        
    }

    /**
     * Fetch data from the database
     * @returns {undefined}
     */
    fetchData() {

        contractTDG.getContractTable((employeeTableResult) => {

            console.log(employeeTableResult);
            this.data = employeeTableResult;
            this.handsontable.updateSettings({
                data: this.data
            });
            this.handsontable.render();
        });

        this.fetchManagerList();
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

    fetchCompanyList(query, process) {


        clientTDG.getAllNames((result) => {
            process(result);
        });
    }

    fetchManagerList(query, process) {

        employeeTDG.getManagerHashtable((result) => {
            this.nameToId = result.nameToId;
            this.idToName = result.idToName;

            let names = Object.keys(this.nameToId);

            console.log(names);

            if (typeof (process) === "function") {
                process(names);
            }
        });
    }

    getPageData() {

        return this.handsontable.getSourceData();
    }

    formSubmit() {

        console.log(this.getPageData());

        employeeTDG.saveEmployeeTable(this.getPageData(), (result) => {

            console.log(result);

        });
    }
}
