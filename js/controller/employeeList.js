//global variable to the page instance
var thisPage;

$(document).ready(() => {

    thisPage = new EmployeeList();

});

class EmployeeList {

    constructor() {

        this.bind();

        this.data = [];

        this.handsontable = new Handsontable($('#employeeListHandsontable')[0], {
            data: this.data,
            colHeaders: ['First Name', 'Middle Initial', 'Last Name', 'Email', 'Phone', 'Line of Business', 'Insurance Plan', 'Role Type', 'Weekly Hours',
                'Province', 'City', 'Username', 'Password'],
            rowHeaders: true,
            columns: [
                {data: 'firstName', type: 'text'},
                {data: 'middleInitial', type: 'text'},
                {data: 'lastName', type: 'text'},
                {data: 'email', type: 'text'},
                {data: 'phone', type: 'text'},
                {data: 'lineOfBusinessName', type: 'dropdown', source: this.fetchLineOfBusinessName},
                {data: 'insurancePlanName', type: 'dropdown', source: this.fetchInsurancePlanName},
                {data: 'roleType', type: 'dropdown'},
                {data: 'weeklyHours', type: 'numeric'},
                {data: 'province', type: 'dropdown'},
                {data: 'city', type: 'dropdown'},
                {data: 'username', type: 'text'},
                {data: 'password', type: 'password', hashLength: 10}
            ],
            minSpareRows: 1
        });

        this.fetchData();
    }

    bind() {

        $("#formSubmit").click(() => {
            formSubmit();
        });
    }

    /**
     * Fetch data from the database
     * @returns {undefined}
     */
    fetchData() {

        employeeTDG.getEmployeeTable((result) => {
            this.data = result;
            this.handsontable.render();
        });
    }

    /**
     * Handsontable dropdown source handler
     * @param {type} query
     * @param {type} process
     * @returns {undefined}
     */
    fetchLineOfBusinessName(query, process) {

        lineOfBusinessTDG.getAll((result) => {
            process(result);
        });

    }
    
    
    /**
     * Handsontable dropdown source handler
     * @param {type} query
     * @param {type} process
     * @returns {undefined}
     */
    fetchInsurancePlanName(query, process) {

        insurancePlanTDG.getAllNames((result) => {
            process(result);
        });

    }

    getPageData() {

        return this.handsontable.getData();
    }

    formSubmit() {

        employeeTDG.saveEmployeeTable(this.getPageData(), (result) => {

            console.log(result);

        });
    }
}
