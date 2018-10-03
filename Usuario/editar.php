<?php
	include_once("../../class/Carregar.class.php");
		include_once("../../theme/topo.php");
	if(!$_GET["id"]){
		header("location:listar.php");
	}
	else{
		$id= $_GET["id"];
		$objeto = new Usuario();
		$objeto->id = $id;
		$variavel = $objeto->retornarUnico();
	}
?>
<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Editar Usuario</h4>
                      <form class="form-horizontal style-form" method="POST" action="inserirok.php">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nombre" value="<?php echo $variavel->nombre;?>">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nombre" value="<?php echo $variavel->email;?>">
                              </div>
                          </div>
						 
						   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Fecha Nacimiento</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control" name="fechanacimiento" value="<?php echo $variavel->fechanacimiento;?>">
                              </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Seña</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="sena" value="<?php echo $variavel->sena;?>">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Direccion</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="direccion" value="<?php echo $variavel->direccion;?>">
                              </div>
                          </div>

		
			<input type="hidden" name="id"value="<?php echo $variavel->id;?>" />
			<input type="submit" value="Alterar" />
			<input type="reset" value="Limpiar" />
		</form>

<?php
	include_once("../../theme/rodape.php");
?>