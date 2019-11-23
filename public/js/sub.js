window.addEventListener("load" , function(){

    //alert("hola");
    $('#buscador').submit(function(e){
        //var persona = $('#buscador #search').val()
        var persona = $('#search').val()
        console.log(persona);
        //e.preventDefault();
        $(this).attr('action',url+'/gente/'+ persona);
        ///$(this).submit();
    });

});
