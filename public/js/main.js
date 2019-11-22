var url = "http://localhost/pictogram/public";

window.addEventListener("load" , function(){

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    like();
    function like(){
        $('.btn-like').unbind('click').click(function(){
            //alert("like");
            var id = $(this).data('id')
            
            $(this).addClass('btn-dislike').removeClass('btn-like');
            
            $.ajax({
                url: url+'/like/'+$(this).data('id'),
                type: 'GET',
                success : function(response){
                    //console.log(response)
                    if(response.like){
                        console.log("Like guardado");
                    }
                    else{
                        console.log("Like no guardado");
                    }
                }
            });

            dislike();
        });
    }

    function dislike(){
        $('.btn-dislike').unbind('click').click(function(){
            //alert("dislike");
            //console.log("like");
            $(this).addClass('btn-like').removeClass('btn-dislike');

            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type: 'GET',
                success : function(response){
                    //console.log(response)
                    if(response.like){
                        console.log("dislike guardado");
                    }
                    else{
                        console.log("dislike no guardado");
                    }
                }
            });
            like();
        });
    }
    dislike();

});
