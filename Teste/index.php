<?php 

    $user       = 'root';
    $password   = '';
    $db         = 'teste_db';

    //Conexão com o banco de dados
    $db         = new mysqli( 'localhost', $user, $password, $db ) or die("Problema na conexão ao banco de dados");

    //Inserindo os dados na tabela criada
    // $sql = "INSERT INTO inputs (id, input_id) VALUES ('1','inputToDoA')";
    // $db->query($sql);
    // $sql = "INSERT INTO inputs (id, input_id) VALUES ('2','inputToDoB')";
    // $db->query($sql);
    // $sql = "INSERT INTO inputs (id, input_id) VALUES ('3','inputToDoC')";
    // $db->query($sql);
    // $sql = "INSERT INTO inputs (id, input_id) VALUES ('4','inputToDoD')";
    // $db->query($sql);
    // $sql = "INSERT INTO inputs (id, input_id) VALUES ('5','inputToDoE')";
    // $db->query($sql);

    session_start();

    if($_SESSION['done']):
        foreach( $_SESSION['done'] as $done ){

            $sql = "SELECT id, input_id FROM inputs WHERE input_id = '".$done."'";
            $result = mysqli_query( $db, $sql );

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "id: ".$row["id"]." - input_id: ".$row["input_id"]."<br>";
                }
            }
            // if( $result ){

            //     echo print_r($result);

            // }

        }
    endif;

?>

<head>
    <script language="JavaScript" src="custom.js"></script>
</head>

<section id='main-section'>

    <div id='container-todo' class='container-todo'>
        <form id='form-todo'>
            <fieldset class='field'>
                <input type='checkbox' id='inputToDoA' name='todo-A'>
                <label for='todo-A'>A</label>
            </fieldset>
            <fieldset class='field'>
                <input type='checkbox' id='inputToDoB' name='todo-B'>
                <label for='todo-B'>B</label>
            </fieldset>
            <fieldset class='field'>
                <input type='checkbox' id='inputToDoC' name='todo-C'>
                <label for='todo-C'>C</label>
            </fieldset>
            <fieldset class='field'>
                <input type='checkbox' id='inputToDoD' name='todo-D'>
                <label for='todo-D'>D</label>
            </fieldset>
            <fieldset class='field'>
                <input type='checkbox' id='inputToDoE' name='todo-E'>
                <label for='todo-E'>E</label>
            </fieldset>
        </form>
    </div>

    <div id='container-done' class='container-done'>
        <form id='form-done'>
        <?php 
            if( $_SESSION['done'] ) {
                $done = $_SESSION['done'];
                foreach( $done as $d ):
                    switch( $d ){

                        case 'inputToDoA': echo "<fieldset class='field'>
                                                    <input type='checkbox' id='inputDoneA' name='done-A'>
                                                    <label for='done-A'>A</label>
                                                </fieldset>";
                                                break;

                        case 'inputToDoB': echo"<fieldset class='field'>
                                                    <input type='checkbox' id='inputDoneB' name='done-B'>
                                                    <label for='done-B'>B</label>
                                                </fieldset>";
                                                break;

                        case 'inputToDoC': echo "<fieldset class='field'>
                                                    <input type='checkbox' id='inputDoneC' name='done-C'>
                                                    <label for='done-C'>C</label>
                                                </fieldset>";
                                                break;

                        case 'inputToDoD': echo"<fieldset class='field'>
                                                    <input type='checkbox' id='inputDoneD' name='done-D'>
                                                    <label for='done-D'>D</label>
                                                </fieldset>";
                                                break;

                        case 'inputToDoE': echo"<fieldset class='field'>
                                                    <input type='checkbox' id='inputDoneE' name='done-E'>
                                                    <label for='done-E'>E</label>
                                                </fieldset>";
                                                break;

                    }
                endforeach;
            }
        ?>
        </form>
    </div>

</section>