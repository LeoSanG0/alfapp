var id_city
var id_customer

$(function(){

    let id = $('#quote_id').val()

    $.ajax({
        url: `/quote/edit/${id}/ajax`,
        type: 'GET'
    }).done(function(response){

        let quote = response.quote

        id_city     = quote.id_cities 
        id_customer = quote.id_customers 

        $('#state_name').val(quote.id_state).trigger('change')
        $('#companies_name').val(quote.id_companies).trigger('change')
        
        $('#fscope').val(quote.fscope).trigger('change')
        $('#sscope').val(quote.sscope).trigger('change')
        $('#tscope').val(quote.tscope).trigger('change')

        // $('#funit_value').val(Intl?.NumberFormat().format(quote.funit_value))
        
    })
})

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

        $('#city_name').val(id_city).trigger('change')
    })
})

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

        $('#customer_name').val(id_customer).trigger('change')
    })
})

// $(document).on('keyup', '#funit_value', function(){
//     let num   = $('#funit_value').val()
//     $('#funit_value').val(Intl?.NumberFormat().format(num))
// })

// function addCommas(nStr) {
   
//     nStr += ''; //800.000

//     var x = nStr.split('.'); // array[0] 800 array[1] 000

//     var x1 = x[0]; // 800
//     var x2 = x.length > 1 ? '.' + x[1] : '';
//     var rgx = /(\d+)(\d{3})/;
//     while (rgx.test(x1)) {
//             x1 = x1.replace(rgx, '$1' + '.' + '$2');
//     }
//     return x1 + x2;
// }
