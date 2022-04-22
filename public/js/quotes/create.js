// Script para hacer select dinamico de states y cities 
$(document).on('change', '#state_name', function(){  //'#state_name' es el id del select
    $('#city_name').empty()
    let stateid = $(this).val()
    $.ajax({
        'url':`/get-cities-by-state-id/${stateid}`,
        type:'GET',   
    }).done(function(response){
        $.each(response, function(index, city){
            $('#city_name').append(`<option value="${city.id}">${city.name}</option>`)
        })
    })
})
// Script para hacer select dinamico de tipo de cliente y cliente 
$(document).on('change', '#companies_name', function(){  //'#companies_name' es el id del select
    $('#customer_name').empty()
    let companyid = $(this).val()
    $.ajax({
        'url':`/get-customers-by-company-id/${companyid}`,
        type:'GET',   
    }).done(function(response){
        $.each(response, function(index, customer){
            $('#customer_name').append(`<option value="${customer.id}">${customer.company}</option>`)
        })
    })
})
// Script para calculo de IVA
function calculo (){
    var iva = 19;
    var funit_value = $('#funit_value').val();
    var sunit_value = $('#sunit_value').val();
    var tunit_value = $('#tunit_value').val();
    var subtotal = $('#subtotal').val();
    var subtotal = (parseInt(funit_value) + parseInt(sunit_value) + parseInt(tunit_value));
    var iva = (subtotal * iva)/100;
    $('#iva').val(iva);
    $('#subtotal').val(subtotal);
    // $('#subtotal').val(parseInt(funit_value)+parseInt(sunit_value)+parseInt(tunit_value));
    $('#total').val(parseInt(subtotal)+parseInt(iva));
}
// Script selects scopes
$(document).on('change', '.sel', function(){
    $(this).siblings().find('option[value="'+$(this).val()+'"]').remove();
})

// $("#number").on({
//     "focus": function(event){
//         $(event.target).select();
//     },
//     "keyup": function(event){
//         $(event.target).val(function(index, value) {
//             return value.replace(/\D/g, "")
//             .replace(/ ([0-9]) ([0-9] {2}) ) $/, '$1.$2')
//             .replace(/\B(?=(\d{3})+(?!\d.?)/g, ",");
//         });
//     }
// });