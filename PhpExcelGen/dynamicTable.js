$(document).ready(function() {
    //adding buttons


    var Columns_json = JSON.parse(columns_table);
    //datatable
    var table = $('#datatable').DataTable({
        // scrollX: true,
        dom: 'Blfrtip',
        serverSide: true,
        processing: true,
        paging: true,
        pagingType: "full_numbers",
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pageLength: 10,
        ajax: {
            url: "serverside.php",
            type: "POST",

        },
        buttons: [{
                extend: 'excel',
                title: 'sample',
                header: false,


            }, {
                extend: 'csv',
                title: 'sampleCSV',
                header: false,
            }

        ],
        columns: Columns_json,
        //When table is fully loaded
        "initComplete": function(settings, json) {

            $('#EditTable').prop('disabled', false);
            $('#SaveTable').prop('disabled', true);

            //Edit and Save Buttons 

            $('#EditTable').on('click', function() {
                //disable some buttons to avoid conflict
                $(this).prop('disabled', true);
                $('#SaveTable').prop('disabled', false);

                //removing display 
                $(".buttons-excel").css('display', 'none');
                $(".buttons-csv").css('display', 'none');
                $(".buttons-pdf").css('display', 'none');
                $('.paginate_button').css('display', 'none');
                $('#datatable td').each(function() {
                    var value = $(this).text();
                    $(this).empty();
                    $(this).append("<input type='text' id='tempContent' value=" + value + ">");
                });

            });

            $('#SaveTable').on('click', function() {
                $('#EditTable').prop('disabled', false);
                $(this).prop('disabled', true);

                //returning display
                $('.paginate_button').css('display', '');
                $(".buttons-excel").css('display', '');
                $(".buttons-csv").css('display', '');
                $(".buttons-pdf").css('display', '');

                $('#datatable td').each(function() {

                    var value;
                    $('#tempContent').each(function() {
                        value = $(this).val();
                    });
                    $(this).empty();
                    $(this).append(value);
                });



            });


        }


    });

    var table = $('#datatable_import').DataTable({
        scrollX: true,
        dom: 'Blfrtip',
        paging: true,
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        buttons: [{
                extend: 'excel',
                title: 'sample',
                header: false,


            }, {
                extend: 'csv',
                title: 'sampleCSV',
                header: false,
            }

        ],
        pageLength: 10,

    });


});



// $('#datatable').DataTable().table.data().length;