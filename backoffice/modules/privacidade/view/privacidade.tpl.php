<style>
.abx{
    width:49%;
}    
</style>

<?php
global $connect;
$get = $connect->query("SELECT * FROM privacidade WHERE id = 1");
$fetch = $get->fetch_array(MYSQLI_ASSOC);
?>
 <div class="content">
            <div class="container-fluid">
                
             <div class="row" style="margin-top:10px;">
                          <div class="col-md-12">
                                <button class="btn" id="pt" style="border-radius:2px; background:white; color:black; border:none;">PT</button>
                                <button class="btn" id="en" style="border-radius:2px; background:#eeeeee; color:black; border:none;">EN</button>
                         </div>
                         

            </div>     
                
                <div class="row" id="show_pt">
         

                     <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Privacidade</h4>
                            </div>
                            <div class="content">
                                <form method="post" action=""  enctype="multipart/form-data">
 
            
                                       
                                    
                            
                                        <div class="row" >
                                            <div class="col-md-12">
                                               <div class="form-group">
                                                  <label>Texto A</label>
                                                  <textarea wrap="hard"  id="trumbowyg-demo"  cols="20" rows="5" class="form-control border-input" placeholder="Texto"   name="a"><?php echo utf8_decode($fetch['textoa']); ?></textarea>
                                               </div>
                                            </div>
                                         </div>
                                       
                                        
                           
                                    
                                
                                  

                                        
                                  
                     

                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <button type="submit" name="criar" class="btn" style="border-radius:2px; background:black; color:white; border:none;">Guardar</button>
                                            </div>
                                         </div>
                                     </div>     
                                     
                                    <div class="clearfix"></div>
                                    <div class="clearf" style="width:100%; height:20px;"></div>
                                </form>


                                    <?php 
if(isset($_POST['criar'])){

        global $connect;


        $a = $_POST['a'];

        $connect->query("UPDATE privacidade SET a = '$a' WHERE id=1 ");
            

        
        
   echo'
        <div class="alert alert-info">
          <span>Success.</span>
        </div>


<meta http-equiv="refresh" content="0">


        ';

       
      }


        ?>
                            </div>
                        </div>
                    </div>


                </div>
                
                
                  <div class="row" id="show_en">
         

                     <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Privacy</h4>
                            </div>
                            <div class="content">
                                <form method="post" action=""  enctype="multipart/form-data">
 
                
                            
                                        <div class="row" >
                                            <div class="col-md-12">
                                               <div class="form-group">
                                                  <label>Text A</label>
                                                  <textarea wrap="hard"  id="trumbowyg-demo"  cols="20" rows="5" class="form-control border-input" placeholder="Texto"   name="a"><?php echo utf8_decode($fetch['textoa']); ?></textarea>
                                               </div>
                                            </div>
                                         </div>
                                       
                                  
                                    
                               
                     

                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <button type="submit" name="criarx" class="btn" style="border-radius:2px; background:black; color:white; border:none;">Guardar</button>
                                            </div>
                                         </div>
                                     </div>     
                                     
                                    <div class="clearfix"></div>
                                    <div class="clearf" style="width:100%; height:20px;"></div>
                                </form>


                                    <?php 
if(isset($_POST['criarx'])){

        global $connect;


        $a = $_POST['a'];


        $connect->query("UPDATE contactos SET a_en = '$a' WHERE id=1 ");
            

        
        
   echo'
        <div class="alert alert-info">
          <span>Success.</span>
        </div>


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
        
<script>
$('#show_en').hide();

$('#en').click( function() {
    $('#en').css('background', 'white')  ;
    $('#pt').css('background', '#eeeeee')  ;  
    $('#show_pt').hide();
    $('#show_en').show();
});

$('#pt').click( function() {
    $('#pt').css('background', 'white')  ;
    $('#en').css('background', '#eeeeee')  ;  
    $('#show_en').hide();
    $('#show_pt').show();
});



</script>


