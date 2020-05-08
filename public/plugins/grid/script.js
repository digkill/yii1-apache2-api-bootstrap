var table = $('#root').tableSortable({

    data: [

        {},
    ],
    columns: {
        id: '#',
        ip: 'IP',
        date: 'Date',
        method: 'Method',
        code: 'Code',
    },
    searchField: '#searchField',
    responsive: {
        1100: {
            columns: {
                formCode: 'Form Code',
                formName: 'Form Name',
            },
        },
    },
    rowsPerPage: 5,
    pagination: true,
    tableWillMount: () => {
    },
    tableDidMount: () => {

        $.get('/api/log/list', function (data) {
            table.setData(data, {
                'id': '#',
                'ip': 'IP',
                'date': 'Date',
                'method': 'Method',
                'code': 'Code',
            });
        })
    },
    tableWillUpdate: () => {
    },
    tableDidUpdate: () => {
    },
    tableWillUnmount: () => {
    },
    tableDidUnmount: () => {
    },
    onPaginationChange: function (nextPage, setPage) {
        setPage(nextPage);
    }
});

$('#changeRows').on('change', function () {
    table.updateRowsPerPage(parseInt($(this).val(), 10));
})

$('#startDate', '#endDate').change(function () {
    dateBetween()
})

const dateBetween = (e) => {
    let startDate = $('#startDate').val();
    let endDate = $('#endDate').val();

    if (startDate !== '' && endDate !== '') {
        console.log({startDate: startDate});

        $.get('/api/log/list',{dateStart: startDate, dateEnd: endDate}, function (data) {
            table.setData(data, {
                'id': '#',
                'ip': 'IP',
                'date': 'Date',
                'method': 'Method',
                'code': 'Code',
            });

        })
    }


}


var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
$('#startDate').datepicker({
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    format: 'dd.mm.yyyy',
    maxDate: function () {
        return $('#endDate').val();
    },
    change: function () {
        dateBetween()
    },
});
$('#endDate').datepicker({
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    format: 'dd.mm.yyyy',
    minDate: function () {

        return $('#startDate').val();
    },
    change: function () {
        dateBetween()
    },
});