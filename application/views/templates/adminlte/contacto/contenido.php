
      <!-- Left side column. contains the logo and sidebar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $titulo ?>
            <small><?= $subtitulo ?></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Formulario de contacto</h3>
            </div> 
           
            <?php echo form_open(base_url().'index.php/contacto/enviar'); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="txtNombre">Nombre</label>
                  <?php
                    $opciones = array('name'=>'txtNombre','class'=>'form-control' ,'type'=>'input', 'value'=> $txtNombre, 'maxlength'=> '200');
                      echo form_input($opciones);
                      echo form_error('txtNombre', '<div class="error">', '</div>');
                  ?>
                </div>
                <div class="form-group">
                  <label for="emailCorreo">Correo</label>
                  <?php
                    $opciones = array('name'=>'emailCorreo','class'=>'form-control' ,'type'=>'mail', 'value'=> $emailCorreo, 'maxlength'=> '200');
                      echo form_input($opciones);
                      echo form_error('emailCorreo', '<div class="error">', '</div>');
                  ?>
                </div>
                <div class="form-group">
                  <label for="txtAsunto">Asunto</label>
                  <?php
                    $opciones = array('name'=>'txtAsunto','class'=>'form-control' ,'type'=>'input', 'value'=> $txtAsunto, 'maxlength'=> '200');
                      echo form_input($opciones);
                      echo form_error('txtAsunto', '<div class="error">', '</div>');
                  ?>
                </div>
                <div class="form-group">
                  <label for="txtareaMensaje">Mensaje</label>
                  <?php
                    $opciones = array('name'=>'txtareaMensaje','class'=>'form-control', 'value'=> $txtareaMensaje);
                      echo form_textarea($opciones);
                      echo form_error('txtareaMensaje', '<div class="error">', '</div>');
                  ?>
                </div>
              </div> 
              <div class="box-footer">
                <?php
                  echo form_submit(array('value' => 'Enviar', 'class'=>'btn btn-primary'));
                    echo form_close();
                ?>
              </div>
            </form>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      