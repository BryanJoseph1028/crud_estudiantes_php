<!doctype html>
<html lang="en">

<head>
  <title>Estudiantes</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <h1>Formulario Estudiantes</h1>
  <div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Estudiantes </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Formulario</h4>
        </div>
        <div class="modal-body">
        <form class="d-flex" action="crud_estudiantes.php" method="post" >
        <div class="col">
        <div class="mb-3">
                <label for="lbl_id" class="form-label"><b>ID</b></label>
                <input type="text" name="txt_id" id="txt_id" class="form-control" value="0" readonly>
            </div>
            <div class="mb-3">
                <label for="lbl_carne" class="form-label"><b>Carne</b></label>
                <input type="text" name="txt_carne" id="txt_carne" class="form-control" placeholder="Codigo E001-45645" >
            </div>
            <div class="mb-3">
                <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
                <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="nombre 1 nombre2" >
            </div>
            <div class="mb-3">
                <label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
                <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="apellido 1" >
            </div>
            <div class="mb-3">
                <label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
                <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="San lucas Sac" >
            </div>
            <div class="mb-3">
                <label for="lbl_correo_electronico" class="form-label"><b>Correo Electronico</b></label>
                <input type="text" name="txt_correo" id="txt_correo" class="form-control" placeholder="bchacajc@miumg.edu.gt" >
            </div>

            <div class="mb-3">
              <label for="lbl_sangre" class="form-label"><b>Sangre</b></label>
              <select class="form-select" name="drop_sangre" id="drop_sangre">
                <option value="0">---Sangre--- </option>
                <?php
                include("datos_conexion.php");
                $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                $db_conexion -> real_query("SELECT id_tipo_sangre as id,sangre from tipo_sangre;");
                $resultado =  $db_conexion -> use_result();
                while($fila = $resultado-> fetch_assoc()){
                    echo"<option value=".$fila['id'].">".$fila['sangre']."</option>";

                }

                    $db_conexion ->close();
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="lbl_fn" class="form-label"><b>Fecha Nacimiento</b></label>
                <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aa-mm-dd" >
            </div>   
            <div class="mb-3">
                <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value="Agregar" >
                <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-primary" value="Modificar" >
                <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-primary" value="Eliminar" >
            </div>
    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
 <div class="container">
    
    <div class="table-responsive">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <tr>
                    <th>carne</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Correo Electronico</th>
                    <th>Sangre</th>
                    <th>Fecha Nacimiento</th>
                </tr>
                </thead>

                <tbody id="tbl_estudiantes" class="table-group-divider">
                <?php
                include("datos_conexion.php");
                $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                $db_conexion -> real_query("select e.id_tipo_sangre as id,e.carne,e.nombre,e.apellidos,e.direccion,e.correo_electronico,t.sangre,e.fecha_nacimiento,e.id_tipo_sangre from estudiantes as e inner join tipo_sangre as t on e.id_tipo_sangre = t.id_tipo_sangre;");
                $resultado =  $db_conexion -> use_result();
                while($fila = $resultado-> fetch_assoc()){
                    echo "<tr data-id=".$fila['id']." data-ids=".$fila['id_tipo_sangre'] . ">";
                    echo"<td>".$fila['carne']."</td>";
                    echo"<td>".$fila['nombre']."</td>";
                    echo"<td>".$fila['apellidos']."</td>";
                    echo"<td>".$fila['direccion']."</td>";
                    echo"<td>".$fila['correo_electronico']."</td>";
                    echo"<td>".$fila['sangre']."</td>";
                    echo"<td>".$fila['fecha_nacimiento']."</td>";
                    
                    echo "</tr>";

                }

                    $db_conexion ->close();
                ?>
                        
                </tbody>
                <tfoot>
                    
                </tfoot>
        </table>
    </div>
    
 </div>
  <footer>
    <!-- place footer here -->
  </footer>
 
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function limpiar(){
        $("#txt_id").val(0);
        $("#txt_carne").val('');
        $("#txt_nombres").val('');
        $("#txt_apellidos").val('');
        $("#txt_direccion").val('');
        $("#txt_correo").val('');
        $("#txt_fn").val('');
        $("#drop_sangre").val(5);
    }
      $('#tbl_estudiantes').on('click','tr td',function(evt){
        var target,id,ids,carne,nombre,apellidos,direccion,correo,nacimiento;
        target = $(event.target);
        id = target.parent().data('id');
        ids = target.parent().data('ids');
        carne = target.parent("tr").find("td").eq(0).html();
        nombre = target.parent("tr").find("td").eq(1).html();
        apellidos =  target.parent("tr").find("td").eq(2).html();
        direccion = target.parent("tr").find("td").eq(3).html();
        correo = target.parent("tr").find("td").eq(4).html();
        nacimiento  = target.parent("tr").find("td").eq(6).html();
        $("#txt_id").val(id);
        $("#txt_carne").val(codigo);
        $("#txt_nombres").val(nombres);
        $("#txt_apellidos").val(apellidos);
        $("#txt_direccion").val(direccion);
        $("#txt_correo").val(correo);
        $("#txt_fn").val(nacimiento);
        $("#drop_sangre").val(ids);
        
        
    });   
    </script>

</body>

</html>