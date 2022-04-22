var table_role

            $(function(){
                table_role = $('#table_role').DataTable({
                    fixedHeader: true,
                    destroy: true,
                    searching: true,
                    processing: true,
                    deferRender: false,
                    scroller: true,
                    ajax: {
                        url: "/role/datatable",
                        type: 'GET',
                        async: true,
                        dataSrc: function (response) {
                            return response.data
                        }
                    },

                    columnDefs: [
                        { 'title': 'ID', 'targets': [0], 'className': 'text-center', 'width': '10%' },
                        { 'title': 'Nombre del rol', 'targets': [1], 'className': 'text-center', 'width': '45%' },
                        { 'title': 'Acciones', 'targets': [2], 'orderable': false, 'className': 'text-center', 'width': '45%' }
                    ],
                    columns: [
                        { 'data': 'id', 'className': 'text-center' },
                        { 'data': 'name', 'className': 'text-center' },
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
            $(document).on('click', '.btn-modal-delete-role', function(){
            
                let route = $(this).data('route')

                $('#form_delete_role').attr('action', `${route}`)
                $('#modal_delete_role').modal('show')
            })

            $(document).on('click', '.btn-delete-role', function(){

                let route = $('#form_delete_role').attr('action')

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

                        table_role.ajax.reload()
                        $('#modal_delete_role').modal('hide')
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