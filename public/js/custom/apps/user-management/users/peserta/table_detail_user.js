"use strict";

var KTUsersList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_risiko');
    var table2 = document.getElementById('kt_table_kebugaran');
    var datatable;
    var datatable2;

    // Private functions
    var initUserTable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            "pageLength": 10,
            "lengthChange": false,
            "dom": 'Brtip',
            "buttons": [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                }
            ]
        });

        datatable2 = $(table2).DataTable({
            "info": false,
            'order': [],
            "pageLength": 10,
            "lengthChange": false,
            "dom": 'Brtip',
            "buttons": [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [ 0, 1]
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [ 0, 1]
                    }
                }
            ]
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-risiko-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });

        const filterSearch2 = document.querySelector('[data-kt-kebugaran-table-filter="search"]');
        filterSearch2.addEventListener('keyup', function (e) {
            datatable2.search(e.target.value).draw();
        });
    }

    return {
        // Public functions  
        init: function () {
            if (!table && !table2) {
                return;
            }

            initUserTable();
            handleSearchDatatable();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersList.init();
});