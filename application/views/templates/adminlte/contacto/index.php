<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Formulario de contacto</h3>
	</div> 
 
	<?php echo form_open(base_url().'contacto/enviar'); ?>
		<div class="box-body">
			<div class="form-group">
				<label for="txtNombre">Nombre</label>
				<?php
					$opciones = array('name'=>'txtNombre','class'=>'form-control' ,'type'=>'input', 'value'=> $nombre, 'maxlength'=> '200');
	  				echo form_input($opciones);
	  				echo form_error('txtNombre', '<div class="error">', '</div>');
				?>
			</div>
			<div class="form-group">
				<label for="emailCorreo">Correo</label>
				<?php
					$opciones = array('name'=>'emailCorreo','class'=>'form-control' ,'type'=>'mail', 'value'=> $correo, 'maxlength'=> '200');
	  				echo form_input($opciones);
	  				echo form_error('emailCorreo', '<div class="error">', '</div>');
				?>
			</div>
			<div class="form-group">
				<label for="txtAsunto">Asunto</label>
				<?php
					$opciones = array('name'=>'txtAsunto','class'=>'form-control' ,'type'=>'input', 'value'=> $asunto, 'maxlength'=> '200');
	  				echo form_input($opciones);
	  				echo form_error('txtAsunto', '<div class="error">', '</div>');
				?>
			</div>
			<div class="form-group">
				<label for="txtareaAsunto">Mensaje</label>
				<?php
					$opciones = array('name'=>'txtareaAsunto','class'=>'form-control', 'value'=> $mensaje);
	  				echo form_textarea($opciones);
	  				echo form_error('txtareaAsunto', '<div class="error">', '</div>');
				?>
			</div>
		</div> 
		<div class="box-footer">);
			<?php
				echo form_submit(array('value' => 'Enviar', 'class'=>'btn btn-primary'));
  				echo form_close();
			?>
		</div>
	</form>
</div>