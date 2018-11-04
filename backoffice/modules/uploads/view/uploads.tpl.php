
  <div class="content">
            <div class="container-fluid">
                
                         <div class="row">
                          <div class="col-md-12">
                    <button class="btn" id="downl" style="border-radius:2px; background:black; color:white; border:none;">New image icon</button>
                    </div>
                    </div>
   
                      <div class="row">
                    <div class="col-md-12" style="margin-top:10px;" id="add_down">

                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add new image icon</h4>
                            </div>
                            <div class="content">
                                <form method="post" action=""  enctype="multipart/form-data">
                                    
          
                                        
                                              

                                    <div class="row">
                                      <div class="col-md-12">
                                            <div class="form-group">
                                                <label>File</label>
                                                <input type="file" name="fileToUpload" id="fileToUpload">

                                            </div>
                                        </div>
                                      </div>
                                    
                                    
              
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <button type="submit" name="criara" class="btn" style="border-radius:2px; background:black; color:white; border:none;">Save</button>
                                            </div>
                                         </div>
                                     </div>     
                                     
                                    <div class="clearfix"></div>
                                    <div class="clearf" style="width:100%; height:20px;"></div>
                                </form>
                                
                                <script type="text/javascript">


$("#add_down").hide();
$( "#downl" ).click(function() {
$( "#add_down" ).toggle( "slow", function() {
    // Animation complete.
  });
});



</script>


                                    <?php 
if(isset($_POST['criara'])){

        global $connect;

        $dat = date("Y/m/d");

        $titulo = "x";
        $aid = 1;

            
            
                if(empty($titulo)){
                   
                }else{
                 
                
                $target_dir = "uploads/nuploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $Newfilename = $target_dir ."uploads_".uniqid().$_FILES["fileToUpload"]["name"];
                
               
            

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Desculpe, ocorreu um erro de codigo 143.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $Newfilename)) {
                        echo "Moved";
                    } else {
                        echo "Desculpe, existiu um erro no upload do ficheiro.";
                    }
                }  
                
                $ficheiro = $Newfilename;
        

                $criar_ficheiro = $connect->prepare("INSERT INTO uploads(nome,ficheiro) VALUES(?,?)");
                $criar_ficheiro->bind_param("ss", $titulo,$ficheiro);
                $criar_ficheiro->execute();


                
        
                //echo '  <meta http-equiv="refresh" content="0">';
        
              }
                    
    

        
 ?>
<!--<meta http-equiv="refresh" content="0">-->
 <?php
        }

        ?>
                            </div>
                        </div>
 


                </div>
                 </div>
                                          
      
                    
  
                <div class="row" style="margin-top:10px;">
           
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Uploaded images</h4>
                                <p class="category">All uploaded images</p>
                            </div>
                            <!-- apenas se quiserem este botao
                            <button id="wrapper">
                                             <div id="inner" onclick="choose()"></div>
                            </button>-->
                            <div class="content table-responsive" style="width:90%">
                                <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />

                                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>.                     <th>Image</th>
                                   
                                      <!--<th>Conteudo</th>-->
                                      <th>Link</th>
                            
                               
                                      <th></th>
            </tr>
        </thead>
                                    <tbody id="todos" >
                                    <form method="POST" action="">
                                    <?php 
                                    global $connect;
                                    $query = "SELECT * FROM uploads ORDER BY ordem";
                                    $noticias = $connect->query($query);
                                    
                                    while($fetch = $noticias->fetch_array(MYSQLI_ASSOC)){
                                        global $url;

                                       $urlx = $url.$fetch['ficheiro']; 
                                        
                                        
                                        
                                        echo '
                                    
                                        <tr class="todo" id="zd_'.$fetch['id'].'">
                                    
                                          <td><img src="'.$urlx.'"  width="140px" height="120px"/></td>

                                          <td>'.$urlx.'</td>

                                  
                                          
                                         
                                         
                                          ';

                              
                                          global $url;
                                          $var = $fetch['id'];
                                          $link = $url."/scripts/delete.php?id=".$var."&table=uploads&secure_key=test";
                                       
                                          echo'

                                        <form method="post" action="">

                                          <input type="hidden" name="delete_id" value="'.$fetch['id'].'" />
                                              <td>

                                        
                                 
                                          <a href="'.$link.'">
                                          <div id="'.$var.'" name="eliminar"  class="btn" style="float:left; border-radius:2px; background:transparent; font-size:24px; color:black; border:none;"><i class="ti-trash"></i></div>
                                          </a>
                           
                                               
                                              </td>
                                         
                                        </tr>
                                        </form>
                                           

                                        ';

                                                                             
                                      
                                        
                                        
                                    }
                                    
                                    
                                    ?>

                                         </form>
                                     </tbody>
                                     
                               

                                    <tfoot>
            <tr>
                
                                     <th>Imagem</th>
                                      <!--<th>Conteudo</th>-->
                            
                                     <th>Link</th>
                             
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



      




 
            </div>
        </div>
        </div>


