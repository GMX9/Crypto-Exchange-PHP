  <?php 
  $gid = $_GET['editar'];
  ?>
<script>
$( ".icons" ).hide();

</script>




  <div class="content">
            <div class="container-fluid">

                     <div class="row">
                          <div class="col-md-12">
                    <button class="btn" id="adicionar" style="border-radius:2px; margin-left:-12px; background:black; border:none; color:white;">Add image</button>
                    </div>
                    </div>
                
                <div class="row">
                     
                     
                     <div class="col-md-12" id="add" style="float:left ; margin-top:10px; margin-left:-12px; ">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add a image to project</h4>
                            </div>
                            <div class="content">
                                <form method="post" action=""  enctype="multipart/form-data">
                          
                                 
                                    
                                    <div class="row">
                                      <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image (1200x900px)</label>
                                                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">

                                            </div>
                                        </div>
                                      </div>
                                      
    
                                    
                                    
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                    
                                        <button type="submit" name="criar_a" class="btn" style="background:black; border:none; color:white; border-radius:2px; color:white;">Save</button>
                                        
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </form>


                                    <?php 
if(isset($_POST['criar_a'])){

        global $connect;

        $dat = date("Y/m/d");
        $ordem = 0;

        $status = 1 ;



        $target_dir = "uploads/projetos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $Newfilename = $target_dir . "projetos_".uniqid().".".$imageFileType;
        // Check if image file is a actual image or fake image
       
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
                $uploadOk = 1;
        } else {

                $uploadOk = 0;
        }
       
        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
     
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Desculpe, apenas são permitidos formatos como JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Desculpe, ocorreu um erro código 143.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $Newfilename)) {
            } else {
                echo "Desculpe, existiu um erro no upload do ficheiro.";
            }
        }  
        $newuploadir = "../";
        $imagem = $Newfilename;


        $criar_noticia = $connect->prepare("INSERT INTO projetos_images (imagem,ordem,projeto,data_w) VALUES(?,?,?,?)");
        $criar_noticia->bind_param("siis", $imagem,$ordem,$gid,$dat);
        $criar_noticia->execute();
        $criar_noticia->close();


        echo'
        <div class="alert alert-info">
          <span>Success.</span>
        </div>




        ';
      
 ?>
<meta http-equiv="refresh" content="0">
 <?php
        }

        ?>
                            </div>
                        </div>
                    </div>

               <div class="row">
                     <div class="col-lg-12 col-md-12" style="margin-top:20px;">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar projeto #<?php echo $gid; ?></h4>
                            </div>
                            <div class="content">
                                  <?php 
                                    global $connect;
                                    $noticias = $connect->query("SELECT * FROM projetos WHERE id='$gid'");
                                    $fetch = $noticias->fetch_array(MYSQLI_ASSOC);
                                        
                                        ?>
                                <form method="post" action=""  enctype="multipart/form-data">
                               




                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title EN</label>
                                                <input type="text" name="contract" class="form-control border-input" value="<?php echo $fetch['titulo']; ?>" placeholder="Title" >
                                            </div>
                                        </div>
                                    </div>

                             
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Subtitle EN</label>

                                                  <pre><textarea rows="5"name="titulo_en" class="form-control border-input"  placeholder="Subtitle">
<?php echo $fetch['subtitulo']; ?>
                                                </textarea></pre>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Client EN</label>
                                                <input type="text" name="client" class="form-control border-input"  value="<?php echo $fetch['client']; ?>" placeholder="Client" >
                                            </div>
                                        </div>
                                    </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Location EN</label>
                                                <input type="text" name="local" class="form-control border-input" value="<?php echo $fetch['local']; ?>" placeholder="Location" >
                                            </div>
                                        </div>
                                    </div>
                                        
                                        
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description EN</label>
                                                <pre><textarea rows="5" class="form-control border-input"  placeholder="Description" name="desc"><?php echo $fetch['conteudo']; ?></textarea></pre>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Category EN</label>
                                                    <input type="text" name="cat" class="form-control border-input"  value="<?php echo $fetch['cat']; ?>" placeholder="Category" >
                                            </div>
                                        </div>
                                    </div>
                  
                                    
                                   <div class="row">
                                      <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image (1200x900px)</label>
                                                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">

                                            </div>
                                        </div>
                                      </div>

                                   <div class="row">
                                      <div class="col-md-12">
                                            <div class="form-group">   
                                            <label>Company</label><br>
                                            <?php
                                            if($fetch['category'] == 1){ 

                                                $sx = "selected";
                                            }else{
                                                $sx = "";
                                            }

                                            if($fetch['category'] == 2){ 

                                                $sf = "selected";
                                            }else{
                                                $sf = "";
                                            }

                                            if($fetch['category'] == 3){ 

                                                $sk = "selected";
                                            }else{
                                                $sk = "";
                                            }

                                            ?>
                                              <select name="company">
                                                  <option value="1" <?php echo $sx ?> >Armando Cunha</option>
                                                  <option value="2" <?php echo $sf; ?> >Devtraco Plus</option>
                                                  <option value="3" <?php echo $sk; ?> >Fabrico</option>
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                      
                                       
                    
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <button type="submit" name="criar" class="btn" style="border-radius:2px; background:black; color:white; border:none;">Save</button>
                                            </div>
                                         </div>
                                     </div>     
                                     

                                    <div class="clearfix"></div>
                                </form>


                                    <?php 
if(isset($_POST['criar'])){

     global $connect;

        $dat = date("Y/m/d");
        

        $contrato = $_POST['contract'];
        $titulo = $_POST['titulo_en'];
        $client = $_POST['client'];
        $local = $_POST['local'];
        $conteudo = $_POST['desc'];
        $cat = $_POST['cat'];
        $category = $_POST['company'];

        


        if(empty($titulo)){

        
  
        }else{


            $target_dir = "uploads/projetos/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $Newfilename = $target_dir . "projetos_".uniqid().".".$imageFileType;
            // Check if image file is a actual image or fake image
           
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                    $uploadOk = 1;
            } else {

                    $uploadOk = 0;
            }
           
            // Check if file already exists
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }
         
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {

                  echo'
                    <div class="alert alert-warning">
                      <span>Only formats like JPG, JPEG, PNG & GIF are allowed</span>
                    </div>
                    ';

                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {

                     echo'
                    <div class="alert alert-warning">
                      <span>Error code 143 contact the webmaster.</span>
                    </div>
                    ';

            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $Newfilename)) {
                  //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                
                } else {
                         echo'
                    <div class="alert alert-warning">
                      <span>There was an error uploading your file, try again.</span>
                    </div>
                    ';
                }
            }  
        
        $newuploadir = "../";
        $imagem = $Newfilename;
        $ordem = 0;

          if($check !== false) {

          $connect->query("UPDATE projetos SET titulo = '$contrato' ,subtitulo = '$titulo',client = '$client',local = '$local',conteudo = '$conteudo',imagem = '$imagem',cat = '$cat',category = '$category',data_w = '$dat',ordem = '$ordem' WHERE id = '$gid'");
                    
            } else {

             $connect->query("UPDATE projetos SET titulo = '$contrato' ,subtitulo = '$titulo',client = '$client',local = '$local',conteudo = '$conteudo',cat = '$cat',category = '$category',data_w = '$dat',ordem = '$ordem' WHERE id = '$gid'");
            }
      

                


        echo'
        <div class="alert alert-info">
          <span>Success.</span>
        </div>
        ';

        ?>
<meta http-equiv="refresh" content="0; url=/backoffice/projectos" />

        <?php
        //echo '  <meta http-equiv="refresh" content="0">';

       

       }
      
} 

        ?>
                            </div>
                        </div>
                    </div>

            


             <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Images</h4>
                                <p class="category">Project related images</p>
                            </div>                             
               <div class="content table-responsive" style="width:90%">
                                <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />

                                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                                      <th>Titulo</th>
                                      <!--<th>Conteudo</th>-->
                                      <th>Data</th>
                                      
                                      <th></th>
            </tr>
        </thead>
                                    <tbody id="todos" class="geo">
                                        <form method="POST" action="">
                                    <?php 
                                    global $connect;
                                    $query = "SELECT * FROM projetos_images WHERE projeto = '$gid' ORDER BY ordem";
                                    $noticias = $connect->query($query);
                                    
                                    while($fetch = $noticias->fetch_array(MYSQLI_ASSOC)){
                                        
                                     global $url;

                                     $imagem = $fetch['imagem'];
                                        
                                        echo '
                                    
                                        <tr class="todo" id="zd_'.$fetch['id'].'">
                                    
                                          <td><i class="ti-arrows-vertical" id="handle" ></i><img src="../../'.$imagem.'" width="170" style="border-radius:4px;" height="120" /></td>
                                          <td>'.$fetch['data_w'].'</td>
                                         
                                         
                                         
                                          ';

                           
                                          $var = $fetch['id'];
                                          $link = $url."/scripts/delete.php?id=".$var."&table=projetos_images&secure_key=test";
                                          echo'

                                          <td>
                                        
 
                                          <div class="text-left">
                                     
                                          <a href="'.$link.'">
                                          <div id="'.$var.'" name="eliminar"  class="btn" style="float:left; border-radius:2px; background:transparent; font-size:24px; color:black; border:none;"><i class="ti-trash"></i></div>
                                          </a>

                                         </div></td>
                    
                                        </tr>
                                       
                                        ';

                                      
                                        
                                     
                                       
                                        
                                        
                                    }
                                    
                                    
                                    ?>

                                         </form>
                                     </tbody>
                               

                                    <tfoot>
            <tr>
                
                                      <th>Imagem</th>
                                      <!--<th>Conteudo</th>-->
                                      <th>Data</th>
                                     
                                      <th></th>
            </tr>
        </tfoot>

                                </table>

                            </div>

                        </div>

                    </div>

                         <div class="row" id="info" style="margin-top:10px; height:100px;">
           
                        <div class="col-md-12" style="display:none;">
                               <div class="card">
                                <div class="header">
                                    

                            
                             </div>
                            </div>
                        
                        </div>
                        </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>        
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


        <script>

  $(document).ready(function() {
    $('#example').DataTable( {
 
    } );
} );
        </script>
        
        <script>
$('#add').hide();

  $( "#adicionar" ).click(function() {
  $( "#add" ).toggle( "slow", function() {
    // Animation complete.
  });
});

</script>


<script src="http://gm-tests.xyz/jquery.sortable.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
// When the document is ready set up our sortable with it's inherant function(s)

$("#todos").sortable({   
handle: "#handle",
update : function () {
var order = $('#todos').sortable('serialize');
$("#info").load("http://gm-tests.xyz/scripts/sort_images.php?"+order);
}
});

</script>


