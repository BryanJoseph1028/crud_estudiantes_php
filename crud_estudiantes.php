<?php 
if( !empty($_POST) ){
        $txt_id = utf8_decode($POST["txt_id"]);
        $txt_carne = utf8_decode($POST["txt_carne"]);
        $txt_nombres = utf8_decode($POST["txt_nombres"]);
        $txt_apellidos = utf8_decode($POST["txt_apellidos"]);
        $txt_direccion = utf8_decode($POST["txt_direccion"]);
        $txt_correo = utf8_decode($POST["txt_correo"]);
        $txt_sangre = utf8_decode($POST["drop_sangre"]);
        $txt_fecha_nacimiento = utf8_decode($POST["txt_fn"]);

        include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql="";

    if(isset($_POST['btn_agregar'])){
        $sql = "INSERT INTO estudiantes(id,carne,nombre,apellidos,direccion,correo_electronico,id_tipo_sangre,fecha_nacimiento) VALUES('". $txt_carne ."','" . $txt_nombres . "','" . $txt_apellidos . "','" . $txt_direccion . "','" . $txt_correo . "'," . $drop_sangre . ",'" . $txt_fecha_nacimiento . "');";

    }
    if(isset($_POST['btn_modificar'])){
        $sql = "update estudiantes set carne='". $txt_carne ."',nombre='" . $txt_nombres . "',apellidos='" . $txt_apellidos . "',direccion='" . $txt_direccion . "',correo_electronico='" . $txt_correo . "',id_tipo_sangre=" . $drop_sangre . ",fecha_nacimiento='" . $txt_fecha_nacimiento . "' where id_estudiante=". $txt_id . ";";

    }
    if(isset($_POST['btn_eliminar'])){
        $sql = "delete from estudiantes where id_estudiante=". $txt_id . ";";

    }
        if( $db_conexion->query($sql)===true){
            $db_conexion ->close();
            
            header("Location: /estudiantes_php");
        }else{
                echo "Error " . $sql . "<br>".$db_conexion -> close() ;
            }   
    
        
    }
  ?>