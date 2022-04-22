var table_quotes

            $(function(){
                table_quotes = $('#table_quotes').DataTable({
                    fixedHeader: true,
                    destroy: true,
                    searching: true,
                    processing: true,
                    deferRender: false,
                    scroller: true,
                    ajax: {
                        url: "/quote/datatable",
                        type: 'GET',
                        async: true,
                        dataSrc: function (response) {
                            return response.data
                        }
                    },
                    columnDefs: [
                        // { 'title': 'ID', 'targets': [0], 'className': 'text-center', 'width': '10%' },
                        { 'title': 'Código', 'targets': [0], 'className': 'text-center', 'width': '20%' },
                        { 'title': 'Nombre del proyecto', 'targets': [1], 'className': 'text-center', 'width': '20%' },
                        { 'title': 'Observaciones', 'targets': [2], 'className': 'text-center', 'width': '20%' },
                        { 'title': 'Cliente', 'targets': [3], 'className': 'text-center', 'width': '20%' },
                        { 'title': 'Estado', 'targets': [4], 'className': 'text-center', 'width': '10%' },
                        { 'title': 'Acciones', 'targets': [5], 'orderable': false, 'className': 'text-center', 'width': '10%' },
                    ],
                    columns: [
                        // { 'data': 'id', 'className': 'text-center' },
                        { 'data': 'code', 'className': 'text-center' },
                        { 'data': 'name_project', 'className': 'text-center' },
                        { 'data': 'observations', 'className': 'text-center' },
                        { 'data': null, 'className': 'text-center',
                            render: function(data){
                                return data.customer.company
                            }
                        },
                        { 'data': 'status', 'className': 'text-center' },
                        { 'data': 'actions', 'className': 'text-center' }
                    ],
                    select: 'multi',
                    // order: [[2, 'desc']],
                    // stateSave: true,
                    language: {
                        url: "/js/libs/datatable/i18n/es_es.json",
                    },
                    lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, "TODOS"]],
                    scrollY: '',
                    initComplete: function(){
                    }
                });
            })
            
            // Destroy
            $(document).on('click', '.btn-modal-delete-quote', function(){
            
                let route = $(this).data('route')

                $('#form_delete_quote').attr('action', `${route}`)
                $('#modal_delete_quote').modal('show')
            })

            $(document).on('click', '.btn-delete-quote', function(){

                let route = $('#form_delete_quote').attr('action')

                $.ajax({
                    url: route,
                    type: 'POST',
                    async: false
                }).done(function(response){

                    if(response.type == "success"){
                        Swal.fire({
                            title: 'Exito!',
                            text: response.msg,
                            icon: response.type,
                            confirmButtonText: 'Ok'
                        })

                        table_quotes.ajax.reload()
                        $('#modal_delete_quote').modal('hide')
                    }else{
                        Swal.fire({
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