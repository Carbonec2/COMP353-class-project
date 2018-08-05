//global variable to the page instance
var thisPage;

$(document).ready(() => {

    thisPage = new ContractAssignment();

});

class ContractAssignment {

    constructor() {

        this.bind();

        this.data = [];
        
        //List of columns incomplete

        this.handsontable = new Handsontable($('#contractAssignmentHandsontable')[0], {
            data: this.data,
            colHeaders: ['Employee','Contract'],
            rowHeaders: true,
            columns: [
                {data: 'employeeName', type: 'dropdown', source: this.fetchEmployeeList},
                {data: 'contract', type: 'dropdown', source: this.fetchContractName}
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

    
    fetchEmployeeList(query, process) {

        employeeTDG.getManagerHashtable((result) => {
            this.employeeNameToId = result.nameToId;
            this.employeeIdToName = result.idToName;

            let names = Object.keys(this.nameToId);

            console.log(names);

            if (typeof (process) === "function") {
                process(names);
            }
        });
    }
    
    /**
     * Handsontable dropdown source handler
     * @param {type} query
     * @param {type} process
     * @returns {undefined}
     */
    fetchContractName(query, process) {
        
        let result = [];
        
        //Fill result with a set of contract names with the TDG, in async

        //contractTypeTDG.getAllNames((result) => {
            process(result);
        //});
    }

    getPageData() {
        
        let data = this.handsontable.getSourceData();
        
        //We revert the dropdown from the hashtable
        for(let i = 0; i<data.length; i++){
            data[i].employeeId = this.employeeNameToId[data[i].employeeName];
        }

        return data;
    }

    formSubmit() {
        
        console.log(this.getPageData());

        contractAssignmentTDG.saveWorkChoiceTable(this.getPageData(), (result) => {

            console.log(result);

        });
    }
}
