

$(function(){
    $("#cliente").change(function(event){
        $.get("/create/"+event.target.value+"",function(response,cliente){
            console.log(response);
            $("#animal").empty();
            for(i=0; i<response.length; i++){
            $("#animal").append("<option value='"+response[i].id_animal+"'> "+response[i].nome+"</option>");
            }
        });    

    });
});






























