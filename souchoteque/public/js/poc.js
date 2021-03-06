var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: {
            "data": [
                {
                    "DT_RowId": "row_1",
                    "first_name": "Tiger",
                    "last_name": "Nixon",
                    "position": "System Architect",
                    "email": "t.nixon@datatables.net",
                    "office": "Edinburgh",
                    "extn": "5421",
                    "age": "61",
                    "salary": "320800",
                    "start_date": "2011-04-25"
                },
                {
                    "DT_RowId": "row_2",
                    "first_name": "Garrett",
                    "last_name": "Winters",
                    "position": "Accountant",
                    "email": "g.winters@datatables.net",
                    "office": "Tokyo",
                    "extn": "8422",
                    "age": "63",
                    "salary": "170750",
                    "start_date": "2011-07-25"
                },
                {
                    "DT_RowId": "row_3",
                    "first_name": "Ashton",
                    "last_name": "Cox",
                    "position": "Junior Technical Author",
                    "email": "a.cox@datatables.net",
                    "office": "San Francisco",
                    "extn": "1562",
                    "age": "66",
                    "salary": "86000",
                    "start_date": "2009-01-12"
                },
                {
                    "DT_RowId": "row_4",
                    "first_name": "Cedric",
                    "last_name": "Kelly",
                    "position": "Senior Javascript Developer",
                    "email": "c.kelly@datatables.net",
                    "office": "Edinburgh",
                    "extn": "6224",
                    "age": "22",
                    "salary": "433060",
                    "start_date": "2012-03-29"
                },
                {
                    "DT_RowId": "row_5",
                    "first_name": "Airi",
                    "last_name": "Satou",
                    "position": "Accountant",
                    "email": "a.satou@datatables.net",
                    "office": "Tokyo",
                    "extn": "5407",
                    "age": "33",
                    "salary": "162700",
                    "start_date": "2008-11-28"
                }
            ],
            "options": [],
            "files": []
        },
        table: "#example",
        fields: [ {
            label: "First name:",
            name: "first_name"
        }, {
            label: "Last name:",
            name: "last_name"
        }, {
            label: "Position:",
            name: "position"
        }, {
            label: "Office:",
            name: "office"
        }, {
            label: "Extension:",
            name: "extn"
        }, {
            label: "Start date:",
            name: "start_date",
            type: "datetime"
        }, {
            label: "Salary:",
            name: "salary"
        }
        ]
    } );

    $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: {
            "data": [
                {
                    "DT_RowId": "row_1",
                    "first_name": "Tiger",
                    "last_name": "Nixon",
                    "position": "System Architect",
                    "email": "t.nixon@datatables.net",
                    "office": "Edinburgh",
                    "extn": "5421",
                    "age": "61",
                    "salary": "320800",
                    "start_date": "2011-04-25"
                },
                {
                    "DT_RowId": "row_2",
                    "first_name": "Garrett",
                    "last_name": "Winters",
                    "position": "Accountant",
                    "email": "g.winters@datatables.net",
                    "office": "Tokyo",
                    "extn": "8422",
                    "age": "63",
                    "salary": "170750",
                    "start_date": "2011-07-25"
                },
                {
                    "DT_RowId": "row_3",
                    "first_name": "Ashton",
                    "last_name": "Cox",
                    "position": "Junior Technical Author",
                    "email": "a.cox@datatables.net",
                    "office": "San Francisco",
                    "extn": "1562",
                    "age": "66",
                    "salary": "86000",
                    "start_date": "2009-01-12"
                },
                {
                    "DT_RowId": "row_4",
                    "first_name": "Cedric",
                    "last_name": "Kelly",
                    "position": "Senior Javascript Developer",
                    "email": "c.kelly@datatables.net",
                    "office": "Edinburgh",
                    "extn": "6224",
                    "age": "22",
                    "salary": "433060",
                    "start_date": "2012-03-29"
                },
                {
                    "DT_RowId": "row_5",
                    "first_name": "Airi",
                    "last_name": "Satou",
                    "position": "Accountant",
                    "email": "a.satou@datatables.net",
                    "office": "Tokyo",
                    "extn": "5407",
                    "age": "33",
                    "salary": "162700",
                    "start_date": "2008-11-28"
                }
            ],
            "options": [],
            "files": []
        },
        columns: [
            { data: null, render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return data.first_name+' '+data.last_name;
                } },
            { data: "position" },
            { data: "office" },
            { data: "extn" },
            { data: "start_date" },
            { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );