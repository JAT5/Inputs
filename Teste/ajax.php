<?php

    //Função principal
    function mainHandler(){
        
        session_start();

        //Caso haja mais de um ajax somente o mainAjax entrará aqui
        if( $_POST['action'] != 'mainAjax' ){

            die();

        }else{

            if(isset($_POST["id"]) && !empty($_POST["id"])){
                
                if( !in_array( $_POST["id"], $_SESSION["done"] ) ){

                    $_SESSION["done"][] = $_POST["id"];

                }

            }else{

                unset($_SESSION["done"]);
                session_destroy();

            }

        }
        
        echo json_encode(array(
            'id'        => $_POST['id'],
            'erro'      => $_SESSION['erro']
        ));
        
        die();
        
    }
    
    mainHandler();
    
?>