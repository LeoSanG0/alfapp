var table_user

            $(function(){
                table_user = $('#table_user').DataTable({
                    fixedHeader: true,
                    destroy: true,
                    searching: true,
                    processing: true,
                    deferRender: false,
                    scroller: true,
                    ajax: {
                        url: "/user/datatable",
                        type: 'GET',
                        async: true,
                        dataSrc: function (response) {
                            return response.data
                        }
                    },

                    columnDefs: [
                        { 'title': 'ID', 'targets': [0], 'className': 'text-center', 'width': '3%' },
                        { 'title': 'Nombres', 'targets': [1], 'className': 'text-center', 'width': '15%' },
                        { 'title': 'Apellidos', 'targets': [2], 'className': 'text-center', 'width': '18%' },
                        { 'title': 'e-mail', 'targets': [3], 'className': 'text-center', 'width': '18%' },
                        { 'title': 'Telefono', 'targets': [4], 'className': 'text-center', 'width': '8%' },
                        { 'title': 'Acciones', 'targets': [5], 'orderable': false, 'className': 'text-center', 'width': '8%' },
                    ],
                    columns: [
                        { 'data': 'id', 'className': 'text-center' },
                        { 'data': 'fname', 'className': 'text-center' },
                        { 'data': 'lname', 'className': 'text-center' },
                        { 'data': 'email', 'className': 'text-center' },
                        { 'data': 'phone', 'className': 'text-center' },
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
            $(document).on('click', '.btn-modal-delete-user', function(){
            
                let route = $(this).data('route')

                $('#form_delete_user').attr('action', `${route}`)
                $('#modal_delete_user').modal('show')
            })

            $(document).on('click', '.btn-delete-user', function(){

                let route = $('#form_delete_user').attr('action')

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

                        table_user.ajax.reload()
                        $('#modal_delete_user').modal('hide')
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