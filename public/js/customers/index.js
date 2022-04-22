var table_customer
    $(function()
    {
        table_customer = $('#table_customer').DataTable(
        {
            fixedHeader: true,
            destroy: true,
            searching: true,
            processing: true,
            deferRender: false,
            scroller: true,
            ajax: 
            {
                url: "/customer/datatable",
                type: 'GET',
                async: true,
                    dataSrc: function (response)
                    {
                        return response.data
                    }
            },
            columnDefs: 
            [
                { 'title': 'ID', 'targets': [0], 'className': 'text-center', 'width': '5%' },
                { 'title': 'Razón Social', 'targets': [1], 'className': 'text-center', 'width': '30%' },
                { 'title': 'NIT', 'targets': [2], 'className': 'text-center', 'width': '15%' },
                { 'title': 'Contacto', 'targets': [3], 'className': 'text-center', 'width': '20%' },
                { 'title': 'e-mail', 'targets': [4], 'className': 'text-center', 'width': '20%' },
                { 'title': 'Acciones', 'targets': [5], 'orderable': false, 'className': 'text-center', 'width': '10%' }
            ],
            columns: 
            [
                { 'data': 'id', 'className': 'text-center' },
                { 'data': 'company', 'className': 'text-center' },
                { 'data': 'nit', 'className': 'text-center' },
                { 'data': null, 'className': 'text-center',
                        render: function(data)
                        {
                            return `${data.fname_contact} ${data.lname_contact}`
                        }
                        },
                { 'data': 'email', 'className': 'text-center' },
                { 'data': 'actions', 'className': 'text-center' }
            ],

            select: 'multi',
            // order: [[2, 'desc']],
            // stateSave: true,
            language: 
            {
                url: "/js/libs/datatable/i18n/es_es.json",
            },
            lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, "TODOS"]],
            scrollY: '',
                initComplete: function()
                {
                }
        });
    })
    // Destroy
    $(document).on('click', '.btn-modal-delete-customer', function()
    {
        let route = $(this).data('route')
        $('#form_delete_customer').attr('action', `${route}`)
        $('#modal_delete_customer').modal('show')
    })
    $(document).on('click', '.btn-delete-customer', function()
    {
        let route = $('#form_delete_customer').attr('action')
        $.ajax({
            url: route,
            type: 'POST',
            async: false
            }).done(function(response)
            {
                if(response.type == "success")
                {
                    Swal.fire(
                        {
                        title: 'Exito!',
                        text: response.msg,
                        icon: response.type,
                        confirmButtonText: 'Ok'
                        })

                        table_customer.ajax.reload()
                        $('#modal_delete_customer').modal('hide')
                    }else
                    {
                        Swal.fire(
                            {
                            title: 'Error!',
                            text: response.msg,
                            icon: response.type,
                            confirmButtonText: 'Ok'
                        })
                    }
                }).always(function(){
                }).fail(function(){
        })
    })