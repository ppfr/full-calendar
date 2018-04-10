<?php
    //echo "Estas en el archivo registrar.php";
    //var_dump($_POST);
    //echo $_POST['fecha'];

    $fecha=$_POST['fecha'];
    $evento=$_POST['evento'];
    $hora_inicial=$_POST['hora_inicial'];
    $hora_final=$_POST['hora_final'];
    $color=$_POST['color'];


    //var_dump($fecha,$evento,$hora_inicial,$hora_final,$color);
    $datos=array(
        "title"=>$evento,
        "start"=>$fecha." ".$hora_inicial,
        "end"=>$fecha." ".$hora_final,
        "color"=>$color
    );
    //var_dump($datos);

    try{
        $coneccion=new PDO('mysql:host=localhost;dbname=full_calendar','root','root');
        $cadena_consulta="insert into eventos(title, start, end, color) values(:title, :start, :end, :color)";
        $consulta=$coneccion->prepare($cadena_consulta);
        $consulta->execute($datos);

        //echo "Conectado";
    }catch (PDOException $e){
        //echo "No conectado";
        //echo $e;
    }

    header("location:http://localhost/full_calendar/");
