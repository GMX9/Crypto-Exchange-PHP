  <div class="content">
            <div class="container-fluid">
                <div class="row">
         
<?php
global $connect;
$get_id = $_GET['editar_geral'];
$s = $connect->query("SELECT * FROM geral WHERE id = '$get_id'");
$f = $s->fetch_array(MYSQLI_ASSOC);
?>
                     <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar</h4>
                            </div>
                            <div class="content">
                                <form method="post" action=""  enctype="multipart/form-data">
                                       <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" name="titulo" class="form-control border-input" value="<?php echo utf8_decode($f['titulo']) ?>"  placeholder="Nome de utilizador" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Titulo EN</label>
                                                <input type="text" name="titulo_en" class="form-control border-input" value="<?php echo utf8_decode($f['titulo_en']) ?>"  placeholder="Nome de utilizador" >
                                            </div>
                                        </div>
                                    </div>
                       
                                    
                                   
                          

                              <div class="row">
                                  <div class="col-md-12">
                                            <div class="form-group" >
                                
                                        <button type="submit" name="criar" class="btn" style="float:left; border-radius:2px; margin-left:0px; color:white; border:none; background:black;">Guardar</button>
               
                                    <div class="clearfix"></div>
                                     </div>
                                        </div>
                                    </div>
                                </form>


                                    <?php 
if(isset($_POST['criar'])){

        global $connect;

        $dat = date("Y/m/d");
        

        $titulo = utf8_encode($_POST['titulo']);
        $titulo_en = utf8_encode($_POST['titulo_en']);
        
        $ordem = 0;

        
          $save = $connect->prepare("UPDATE geral SET titulo = ?, titulo_en = ?  WHERE id = '$get_id'");
          $save->bind_param("ss", $titulo,$titulo_en);
          $save->execute();
          $save->close();

            if(!$save){
             printf("Errormessage: %s\n", $connect->error);
            }else{

               echo'
            <div class="alert alert-info">
              <span>Successo.</span>
            </div>
            ';

            }
        
        
   echo'

<meta http-equiv="refresh" content="0">


        ';

       
      }


        ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

