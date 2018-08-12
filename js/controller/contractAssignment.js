//global variable to the page instance
var thisPage;

$(document).ready(() => {

    thisPage = new ContractAssignment();

});

class ContractAssignment {

    constructor() {
        
        const params = (new URL(document.location)).searchParams;
        
        this.contract = params.get("contract");

        this.bind();
        this.fetchEmployeeList();

        this.data = [];

        //List of columns incomplete

        this.handsontable = new Handsontable($('#contractAssignmentHandsontable')[0], {
            data: this.data,
            colHeaders: ['Employee', 'Contract', 'Hours Worked'],
            rowHeaders: true,
            columns: [
                {data: 'employeeName', type: 'dropdown', source: this.fetchEmployeeList},
                {data: 'contractName', type: 'dropdown', source: this.fetchContractList},
                {data: 'hoursWorked', type: 'numeric'}
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

        contractAssignmentTDG.getContractAssignmentTable(this.contract, (contractAssignmentTableResult) => {

            console.log(contractAssignmentTableResult);
            
            this.data = contractAssignmentTableResult;
            
            this.handsontable.updateSettings({
                data: this.data
            });
            this.handsontable.render();
        });
    }

    fetchEmployeeList(query, process) {

        employeeTDG.getInterestedEmployees(this.contract, function (result) {
            this.employeeNameToId = result.nameToId;
            this.employeeIdToName = result.idToName;

            let names = Object.keys(this.employeeNameToId);

            console.log(names);

            if (typeof (process) === "function") {
                process(names);
            }
        }.bind(this));
    }
    
    fetchContractList(query, process) {

        contractTDG.getContractList(this.contract, function (result) {
            this.contractNameToId = result.nameToId;
            this.contractIdToName = result.idToName;

            let names = Object.keys(this.contractNameToId);

            console.log(names);

            if (typeof (process) === "function") {
                process(names);
            }
        }.bind(this));
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
        console.log(this.employeeNameToId);

        let data = this.handsontable.getSourceData();

        //We revert the dropdown from the hashtable
        for (let i = 0; i < data.length; i++) {
            data[i].employeeId = this.employeeNameToId[data[i].employeeName];
        }

        return data;
    }

    formSubmit() {

        console.log(this.getPageData());

        contractAssignmentTDG.saveContractAssignmentTable(this.getPageData(), this.contract, (result) => {

            console.log(result);

        });
    }
}
