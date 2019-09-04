document.addEventListener("DOMContentLoaded", function() {

    document.addEventListener("click", function( event ){

        let id = event.target.id;

        if( id == 'inputToDoA' || 'inputToDoB' || 'inputToDoC' || 'inputToDoD' || 'inputToDoE' ){

            if( event.target.checked == true ){
                
                ajaxHandler(id);

            }

        }

    });

    //Controla os inputs
    function ajaxHandler( id ){

        var xhr = new XMLHttpRequest();
        var data = new FormData();
        
        data.append('action', 'mainAjax');
        data.append('id', id );

        xhr.open( 'POST', 'ajax.php' );
        xhr.responseType = 'json';

        xhr.onload = function(response) {

            if( xhr.status === 200 ){

                if( xhr.response.erro ){

                    console.log('error');

                } else {
                    
                    console.log(xhr.response.id);

                }

            }

        };
        
        xhr.send(data);

    }

});