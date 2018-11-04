  <div class="content">
            <div class="container-fluid">
                <div class="row">
         
<?php
global $connect;
$test = $connect->query("SELECT * FROM seo WHERE id=1");
$fetch = $test->fetch_array(MYSQLI_ASSOC);
?>
                     <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Modify SEO</h4>
                            </div>
                            <div class="content">
                                <form method="post" action=""  enctype="multipart/form-data">
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Website Title</label>
                                                <input type="text" name="title" class="form-control border-input" value="<?php echo $fetch['title']; ?>"  placeholder="Description of the website" >
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="desc" class="form-control border-input" value="<?php echo $fetch['description']; ?>"  placeholder="Description of the website" >
                                            </div>
                                        </div>
                                    </div>    
                                        
                                        <div class="row">
                                          <div class="col-md-5">
                                            <div class="form-group">
                                                <label>SEO keywords</label>
                                                <input type="text" name="chave" class="form-control border-input" value="<?php echo $fetch['keywords']; ?>"  placeholder="Keywords.." >
                                            </div>
                                        </div>
                                        </div>
                                        
                          
                                       
                                    </div>

                              <div class="row">
                                  <div class="col-md-12">
                                            <div class="form-group" >
                                
                                        <button type="submit" name="criar" class="btn" style="float:left; border-radius:2px; margin-left:14px; color:white; border:none; background:black;">Save</button>
               
                                    <div class="clearfix"></div>
                                     </div>
                                        </div>
                                    </div>
                                </form>


                                    <?php 
if(isset($_POST['criar'])){

        global $connect;

        $chave = $connect->real_escape_string($_POST['chave']);
        $desc = $connect->real_escape_string($_POST['desc']);
        $title = $connect->real_escape_string($_POST['title']);

        
        $test = $connect->query("SELECT * FROM seo WHERE id=1");
        
        if($test->num_rows){
            
            // atualizar valores
            
            $connect->query("UPDATE seo SET title = '$title',description = '$desc',keywords='$chave' WHERE id=1 ");
            
        }else{
            
            // adicionar valores
           $adicionar = $connect->prepare("INSERT INTO seo(title,description,keywords) VALUES(?, ?, ?)");
           $adicionar->bind_param("sss", $title,$desc,$chave);
           $adicionar->execute();
           $adicionar->close();
           
         
            
            
        }
        
        
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

