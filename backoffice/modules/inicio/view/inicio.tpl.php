  <div class="content">
            <div class="container-fluid">
                
                         <div class="row">
                          <div class="col-md-12">
                    <button class="btn" id="adicionar" style="border-radius:2px; background:black; color:white; border:none;">Adicionar</button>
                    </div>
                    </div>
                    
                                           <div class="row">
                                            
                              
        <div class="col-md-12" style="margin-top:10px; " id="add">

                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add new</h4>
                            </div>
                            <div class="content">
                                <form method="post" action=""  enctype="multipart/form-data">


                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title EN</label>
                                                <input type="text" name="titulo_en" class="form-control border-input"  placeholder="Title EN" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                     
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title PT</label>
                                                <input type="text" name="titulo_en" class="form-control border-input"  placeholder="Title PT" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Chave</label>
                                                <input type="text" name="key" class="form-control border-input"  placeholder="Chave" >
                                            </div>
                                        </div>
                                    </div>
                      
                                       
                    
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <button type="submit" name="criar" class="btn" style="border-radius:2px; background:black; color:white; border:none;">Gravar</button>
                                            </div>
                                         </div>
                                     </div>     
                                     
                                    <div class="clearfix"></div>
                                    <div class="clearf" style="width:100%; height:20px;"></div>
                                </form>


                                    <?php 
if(isset($_POST['criar'])){

        global $connect;

        $dat = date("Y/m/d");
        

        $titulo = utf8_encode($_POST['titulo']);
        $titulo_en = utf8_encode($_POST['titulo_en']);
        $key = utf8_encode($_POST['key']);
        $ordem = 0;


        


        if(empty($titulo)){

        
  
        }else{


            if($criar_noticia = $connect->prepare("INSERT INTO geral (titulo,titulo_en,`key`) VALUES(?,?,?)")){
            $criar_noticia->bind_param("sss", $titulo,$titulo_en,$key);
            $criar_noticia->execute();
            
            
            echo'
            <div class="alert alert-info">
              <span>Successo.</span>
            </div>
            ';
            
            echo '  <meta http-equiv="refresh" content="0">';            

            }else{

            printf("Errormessage: %s\n", $connect->error);


            }
        
                



      

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
                                <h4 class="title">General</h4>
                                <p class="category">All words,names editable</p>
                            </div>
                            <!-- apenas se quiserem este botao
                            <button id="wrapper">
                                             <div id="inner" onclick="choose()"></div>
                            </button>-->
                            <div class="content table-responsive" style="width:90%">

                                <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />

                                <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                      <th>Title</th>
                                      <th>Title PT</th>
                                      <th>Key</th>
                                      <th>Options</th>
                                    </tr>
                                </thead>
                                    <tbody id="todos">
                                        <form method="POST" action="">
                                    <?php 
                                    global $connect;
                                    $noticias = $connect->query("SELECT * FROM geral ORDER BY ordem ASC");
                                    
                                    while($fetch = $noticias->fetch_array(MYSQLI_ASSOC)){
                                        
                                        
                                        
                                        echo '
                                    
                                        <tr class="todo" id="zd_'.$fetch['id'].'">
                                          <td><i class="ti-arrows-vertical" id="handle" ></i>'.utf8_decode($fetch['titulo']).'</td>
                                          <td>'.utf8_decode($fetch['titulo_en']).'</td>
                                          <td>'.utf8_encode($fetch['key']).'</i></td>

                                         
                                          ';

                                          global $url;
 
                                          $var = $fetch['id'];
                                          $link = $url."/scripts/delete.php?id=".$var."&table=geral&secure_key=test";
                                       
                                          echo'

                          
                                          <input type="hidden" name="delete_id" value="'.$fetch['id'].'" />
                                          <td>
                                          <div class="text-left">
                                          <a href="/backoffice/editar_geral/'.$fetch['id'].'"><button type="submit" name="editar"  class="btn" style="color:black; font-size:24px; border:none; background:transparent;"><i class="ti-pencil"></i></button></a>

                                          <a href="'.$link.'">
                                          <div id="'.$var.'"  name="eliminar"  class="btn" style="float:left; border-radius:2px; background:transparent; font-size:24px; color:black; border:none;"><i class="ti-trash"></i></div>
                                          </a>


                                          </div>
                                          </td>
                                     
                                        </tr>
                                       
                                        ';
                                        
                                        
                                       
                                        
                                        
                                    }
                                    
                                    
                                    ?>


                                         </form>
                                    <tfoot>
                                      <tr>
                                            
                                      <th>Title</th>
                                      <th>Key</th>
                                      <th>Options</th>
                      
                                     </tr>
                                    </tfoot>

                                </table>

                            </div>
                        </div>
                    </div>
                    
         
        


 
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

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "bSort" : false
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

<script src="../jquery.sortable.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
// When the document is ready set up our sortable with it's inherant function(s)

$("#todos").sortable({   
handle: "#handle",
update : function () {
var order = $('#todos').sortable('serialize');
$("#info").load("../../scripts/sort_geral.php?"+order);
}
});

</script>
      


