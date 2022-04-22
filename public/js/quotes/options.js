$(function(){
    $.ajax({
        url: '/quote/form-options',
        type: 'GET',
        async: false
    }).done(function(response){
        let states = response.states

        $.each(states, function(index, state){
            $('#state_name').append(`<option value="${state.id}">${state.name}</option>`)
        })
        
    }).always(function(){

    })
})