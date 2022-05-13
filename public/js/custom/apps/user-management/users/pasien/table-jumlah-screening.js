"use strict";

var KTUsersList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_users');
    var datatable;

    // Private functions
    var initUserTable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [ 1, 2, 3],
            "pageLength": 10,
            "lengthChange": false,
            "dom": 'Brtip',
            "buttons": [
                'selectAll',
                'selectNone',
                {
                    text: 'Ingatkan pasien',
                    action: function () {
                        var data = datatable.rows( { selected: true } ).data();

                        for (let index = 0; index < data.length; ++index) {
                            const nomor = data[index][1];
                            
                            $.ajax({
                                url : "https://api.chat-api.com/instance216488/sendMessage?token=cls7zrc15wq7o1sm",
                                type: "POST",
                                data: JSON.stringify({
                                    phone: nomor,
                                    body: "WhatsApp API on Chat API works good"
                                }),
                                contentType: "application/json; charset=utf-8",
                                dataType   : "json",
                                success    : function(){
                                    console.log("Pure jQuery Pure JS object");
                                }
                            });
                        }
                        
                    }
                }
            ],
            "language": {
                buttons: {
                    selectAll: "Pilih Semua",
                    selectNone: "Batalkan Pilihan",

                }
            },
            "select": {
                style:    'multiple',
            },
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    return {
        // Public functions  
        init: function () {
            if (!table) {
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