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

        if(quote.sscope != null){
            addScope('sscope', 'sunit_value', quote.sunit_value)
        }

        if(quote.tscope != null){
            addScope('tscope', 'tunit_value', quote.tunit_value)
        }
        
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



$(document).on('click', '#btn-add-scope', function(){
    if($('body').find('.sel').length == 1){
        addScope('sscope', 'sunit_value', '')
    }else if($('body').find('.sel').length == 2){
        addScope('tscope', 'tunit_value', '')
    }else{
        alert('No se pueden agregar mas items')
    }
})

$(document).on('click', '.btn-remove-scope', function(){
    let scope = $(this).data('scope')
    $(`#divscope${scope}`).remove()
})

function addScope(scope, svalue, value){

    let fscope = $('#fscope option:selected').val()
    let sscope = $('#sscope option:selected').val()
    console.log(sscope)
    console.log(typeof sscope)

    $('#addscope').append(`
        <div id="divscope${scope}" data-id="${scope}" class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="scope">Alcance</label>
                    <select name="${scope}" class="form-control sel">
                        ${ fscope != 'Inspección RETILAP proceso de iluminación interior' ? '<option value="Inspección RETILAP proceso de iluminación interior">Inspección RETILAP proceso de iluminación interior</option>' : '' }
                        ${ fscope != 'Inspección RETILAP proceso de iluminación exterior' ? '<option value="Inspección RETILAP proceso de iluminación exterior">Inspección RETILAP proceso de iluminación exterior</option>' : '' }
                        ${ fscope != 'Inspección RETILAP proceso de alumbrado público' ? '<option value="Inspección RETILAP proceso de alumbrado público">Inspección RETILAP proceso de alumbrado público</option>' : '' }
                        
                        ${ sscope != undefined ? `
                                ${ sscope != 'Inspección RETILAP proceso de iluminación interior' ? '<option value="Inspección RETILAP proceso de iluminación interior">Inspección RETILAP proceso de iluminación interior</option>' : '' }
                                ${ sscope != 'Inspección RETILAP proceso de iluminación exterior' ? '<option value="Inspección RETILAP proceso de iluminación exterior">Inspección RETILAP proceso de iluminación exterior</option>' : '' }
                                ${ sscope != 'Inspección RETILAP proceso de alumbrado público' ? '<option value="Inspección RETILAP proceso de alumbrado público">Inspección RETILAP proceso de alumbrado público</option>' : '' }`
                            : '' }
                    </select>
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-5">
                <div class="form-group">
                    <label for="unit_value">Valor unitario</label>
                    <input value="${value}" type="number" name="${svalue}" id="${svalue}" class="form-control" onChange="calculo();"> 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1">
                <div class="form-group">
                    <button type="button" data-scope="${scope}" class="btn btn-primary btn-remove-scope">delete</button>
                </div>
            </div>
        </div>
    `)
}

