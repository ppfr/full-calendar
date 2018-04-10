<?php
//mysql_connect();
//mysqli_connect();
//PDO mysql
try {
    $mbd = new PDO('mysql:host=localhost;dbname=full_calendar', "root", "root");
    $sth = $mbd->query('select * from eventos');
    /*foreach($sth as $fila) {
        echo $fila["title"];
        echo $fila["start"];
        //print_r($fila);
        echo "<br>";
    }*/
    //echo "Conectado";
} catch (PDOException $e) {
    echo "No conectado";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <!---bootstrap.min.css  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src='assets/js/moment.min.js'></script>
    <link rel='stylesheet' href='assets/css/fullcalendar.css'/>

    <script src='assets/js/jquery.min.js'></script>

    <script src='assets/js/fullcalendar.js'></script>

    <script src='assets/js/locale-all.js'></script>


    <!--<script src='assets/js/locale/es.js'></script>-->


    <style>
        .Disponible {
            background-color: green;
            color: #ffffff;
            border-radius: 20px;
        }

        .NoDispoble {
            background-color: red;
            color: #ffffff;
            border-radius: 20px;
        }
    </style>


    <script language="JavaScript">
        $(document).ready(function () {
            $('#calendario').fullCalendar({
                locale: 'es',
                events: [
                    <?php
                        foreach($sth as $fila) {
                    ?>

                    {
                        id: "<?php echo $fila["id"];?>",
                        title: "<?php echo $fila["title"];?>",
                        start: "<?php echo $fila["start"];?>",
                        end: "<?php echo $fila["end"];?>",
                        editable: "<?php echo $fila["editable"];?>",
                        color: "<?php echo $fila["color"];?>",
                    },
                    <?php
                        }
                    ?>
                ],
                dayClick: function (fecha, javascriptEvent, vista) {

                    $("#exampleModal").modal("show");
                    $("#fecha").val(fecha.format());


                    /*
                     $.ajax({
                     type: "POST",
                     url: "registrar.php",
                     data: $("#form_full_calendar").serialize(),
                     success: success,
                     dataType: dataType
                     });*/

                    /*
                     //date,fecha es un objeto de tipo moment
                     alert(fecha.format());

                     //jsEvent,javascriptEvent objeto nativo de javascript
                     alert('Cordenadas: ' + javascriptEvent.pageX + ',' + javascriptEvent.pageY);

                     //view,vista objeto de tipo View Object
                     alert('Titulo de la vista: ' + vista.title);


                     $(this).css('background-color', 'red');
                     //alert("Click en dayClick");*/
                }
            })
        });
    </script>
</head>
<body>

<div class="row">
    <div class="col-md-3">

    </div>

    <div class="col-md-6">
        <div id="calendario"></div>
    </div>

    <div class="col-md-3">

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="app/registrar.php" method="POST">
                    <label for="">Fecha:</label>

                    <input type="text" id="fecha" name="fecha"/>

                    <br/>
                    <label for="">Evento:</label>
                    <input type="text" name="evento"/>


                    <br/>
                    <label for="">Hora inicial:</label>
                    <input type="time" name="hora_inicial"/>
                    <br/>
                    <label for="">Hora final:</label>
                    <input type="time" name="hora_final"/>


                    <br/>
                    <label for="">Color:</label>
                    <input type="color" name="color"/>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>