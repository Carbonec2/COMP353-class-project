//global variable to the page instance
var thisPage;
var premiumContractDelayedContract;
var monthVentilation;
var managerSatisfaction;

$(document).ready(() => {

    if (globalRole === "Client") {
        managerSatisfaction = new ManagerSatisfaction();
        $('.notClient').hide();
    } else {
        thisPage = new PremiumLessSixtyHours();
        premiumContractDelayedContract = new PremiumContractDelayedContract();
        monthVentilation = new MonthVentilation();
        $('.client').hide();
    }

});

class PremiumLessSixtyHours {

    constructor() {

        this.data = [];

        this.handsontable = new Handsontable($('#premiumLessSixtyHours')[0], {
            data: this.data,
            colHeaders: ['First Name', 'Middle Initial', 'Last Name', 'Hours'],
            rowHeaders: true,
            columns: [
                {data: 'firstName', type: 'text', readOnly: true},
                {data: 'middleInitial', type: 'text', readOnly: true},
                {data: 'lastName', type: 'text', readOnly: true},
                {data: 'weeklyHours', type: 'text', readOnly: true}
            ],
            minSpareRows: 0,
            stretchH: "all"
        });

        this.fetchData();
    }

    /**
     * Fetch data from the database
     * @returns {undefined}
     */
    fetchData() {

        employeeTDG.getPremiumLessSixtyHoursTable((employeeTableResult) => {

            this.data = employeeTableResult;
            this.handsontable.updateSettings({
                data: this.data
            });
            this.handsontable.render();
        });
    }
}

class PremiumContractDelayedContract {

    constructor() {

        this.data = [];

        this.handsontable = new Handsontable($('#premiumContractDelayedContract')[0], {
            data: this.data,
            colHeaders: ['Contract ID', 'Service Start Date', 'Service End Date', 'Company Name'],
            rowHeaders: true,
            columns: [
                {data: 'contractId', type: 'text', readOnly: true},
                {data: 'serviceStartDate', type: 'text', readOnly: true},
                {data: 'serviceEndDate', type: 'text', readOnly: true},
                {data: 'companyName', type: 'text', readOnly: true}
            ],
            minSpareRows: 0,
            stretchH: "all"
        });

        this.fetchData();
    }

    /**
     * Fetch data from the database
     * @returns {undefined}
     */
    fetchData() {

        contractAssignmentTDG.getPremiumContractDelayedContract((tableResult) => {

            this.data = tableResult;
            this.handsontable.updateSettings({
                data: this.data
            });
            this.handsontable.render();
        });
    }

}

class MonthVentilation {

    constructor() {

        this.data = [];

        this.handsontable = new Handsontable($('#monthVentilation')[0], {
            data: this.data,
            colHeaders: ['Contract ID', 'Service Start Date', 'Service End Date', 'Theorical Due Date'],
            rowHeaders: true,
            columns: [
                {data: 'id', type: 'text', readOnly: true},
                {data: 'serviceStartDate', type: 'text', readOnly: true},
                {data: 'serviceEndDate', type: 'text', readOnly: true},
                {data: 'theoricalDueDate', type: 'text', readOnly: true}
            ],
            minSpareRows: 0,
            stretchH: "all"
        });

        this.fetchData();
    }

    /**
     * Fetch data from the database
     * @returns {undefined}
     */
    fetchData() {

        contractAssignmentTDG.monthVentilation((tableResult) => {

            this.data = tableResult;
            this.handsontable.updateSettings({
                data: this.data
            });
            this.handsontable.render();
        });
    }

}

class ManagerSatisfaction {

    constructor() {

        this.data = [];

        this.handsontable = new Handsontable($('#managerSatisfaction')[0], {
            data: this.data,
            colHeaders: ['Manager', 'Satisfaction Rate'],
            rowHeaders: true,
            columns: [
                {data: 'manager', type: 'text', readOnly: true},
                {data: 'satisfactionRate', type: 'text', readOnly: true}
            ],
            minSpareRows: 0,
            stretchH: "all"
        });

        this.fetchData();
    }

    /**
     * Fetch data from the database
     * @returns {undefined}
     */
    fetchData() {

        contractTDG.managerSatisfaction((tableResult) => {

            this.data = tableResult;
            this.handsontable.updateSettings({
                data: this.data
            });
            this.handsontable.render();
        });
    }

}

