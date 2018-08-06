//global variable to the page instance
var thisPage;

$(document).ready(() => {

    thisPage = new EmployeeList();

});

class EmployeeList {

    constructor() {

        this.bind();

        this.data = [];
        //this.data.push({firstname: 'Bob', province: 'Québec'});

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
                {data: 'roleType', type: 'dropdown', source: this.fetchRoleType},
                {data: 'weeklyHours', type: 'numeric'},
                {data: 'province', type: 'dropdown', source: this.fetchProvince},
                {data: 'city', type: 'dropdown', readOnly: true},
                {data: 'username', type: 'text'},
                {data: 'password', type: 'password', hashLength: 10}
            ],
            minSpareRows: 1,
            beforeChange: (changes, source) => {
                //Only triggered when we change a cell after filling the table
                //
                //We cannot reference this method as a pointer to the method, since we would loose the lexical 'this'

                //[0][row, prop, oldValue, newValue]
                if (changes[0][1] === "province") {
                    //When we change the province
                    //We change the corresponding city source
                    cityTDG.getProvinceHashTable((result) => {

                        //We get the province list
                        let provinces = Object.keys(result);

                        //We change the corresponding city source
                        //setCellMeta(row, column, key, value)
                        this.handsontable.setCellMeta(changes[0][0], parseInt(this.handsontable.propToCol(changes[0][1])) + 1, 'source', result[changes[0][3]]);
                        this.handsontable.setCellMeta(changes[0][0], parseInt(this.handsontable.propToCol(changes[0][1])) + 1, 'readOnly', false);

                    });
                }
            },
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
        
        employeeTDG.getEmployeeTable((employeeTableResult) => {

            console.log(employeeTableResult);
            this.data = employeeTableResult;
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
    fetchLineOfBusinessName(query, process) {

        lineOfBusinessTDG.getAll((result) => {
            process(result);
        });

    }

    fetchProvince(query, process) {

        cityTDG.getProvinceHashTable((result) => {

            //We get the province list
            let provinces = Object.keys(result);

            //this.provinceCityHashTable = result; //Some dump way to do it, but it is needed to easily share data with the city source field

            process(provinces);
        });

    }

    /**
     * Handsontable dropdown source handler
     * @param {type} query
     * @param {type} process
     * @returns {undefined}
     */
    fetchInsurancePlanName(query, process)
    {

        insurancePlanTDG.getAllNames((result) => {
            process(result);
        });

    }

    /**
     * Handsontable dropdown source handler
     * @param {type} query
     * @param {type} process
     * @returns {undefined}
     */
    fetchRoleType(query, process) {

        roleTypeTDG.getAllNames((result) => {
            process(result);
        });

    }

    getPageData() {

        return this.handsontable.getSourceData();
    }

    formSubmit() {
        
        console.log(this.getPageData());

        employeeTDG.saveEmployeeTable(this.getPageData(), (result) => {

            console.log(result);

            this.fetchData();
        });
    }
}
