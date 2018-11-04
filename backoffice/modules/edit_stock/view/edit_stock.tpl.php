<?php
global $connect;
   
$id = $connect->real_escape_string($_GET['edit_stock']);
$get_value = $connect->query("SELECT * FROM stock WHERE id = '$id'");
$value = $get_value->fetch_array(MYSQLI_ASSOC);
?>
<div class="content">
   <div class="row">
      <div class="col-md-12" style="margin-top:10px; ">
         <div class="card">
            <div class="header">
               <h4 class="title">Edit stock #<?php echo $id; ?></h4>
            </div>
            <div class="content">
               <form method="post" action=""  enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Title EN (Account Type):</label>
                           <input type="text" name="item" class="form-control border-input"  placeholder="Title" value="<?php echo $value['item_name']; ?>" />
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Price USD:</label>
                           <input type="text" name="price" class="form-control border-input"  placeholder="Price in USD" value="<?php echo $value['price']; ?>" />
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>PNG Icon Link:</label>
                           <input type="text" name="image" class="form-control border-input"  placeholder="Image" value="<?php echo $value['image']; ?>" >
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Color Type:</label><br>
                           <select name="color">
                              <option value="1" <?php if($value['type'] == 1){ echo"selected"; }  ?> >Green</option>
                              <option value="2" <?php if($value['type'] == 2){ echo"selected"; }  ?> >Blue</option>
                              <option value="3" <?php if($value['type'] == 3){ echo"selected"; }  ?> >Orange</option>
                              <option value="4" <?php if($value['type'] == 4){ echo"selected"; }  ?> >Purple</option>
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
                  <div class="clearf" style="width:100%; height:20px;"></div>
               </form>
               <?php 
                  if(isset($_POST['criar'])){
                  
                          global $connect;
                  
                          $dat = date("Y/m/d");
                          
                  
                          $item_name = utf8_encode($connect->real_escape_string($_POST['item']));
                          $image = $connect->real_escape_string($_POST['image']);
                          $price = $connect->real_escape_string($_POST['price']);
                          $type = $connect->real_escape_string($_POST['color']);
                          $ordem = 0;
                  
                  
                          
                  
                  
                          if(empty($item_name)){
                  
                              echo'
                              <div class="alert alert-info">
                                <span>Please type a name for your stock item.</span>
                              </div>
                              ';
                    
                          }else{
                  
                  
                              if($stock = $connect->prepare("UPDATE stock SET item_name = ?,image = ?,price = ?,type = ?")){
                              $stock->bind_param("ssii", $item_name,$image,$price,$type);
                              $stock->execute();
                              
                              
                              echo'
                              <div class="alert alert-info">
                                <span>Success.</span>
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
   
    <div class="row">
         <div class="col-md-12">
            <button class="btn" id="adicionar" style="border-radius:2px; background:black; color:white; border:none;">Add account</button>
         </div>
    </div>
    
   <div class="row">
    <div class="col-md-12" style="margin-top:10px; " id="add">
         <div class="card">
            <div class="header">
               <h4 class="title">Add new account to the stock</h4>
            </div>
            <div class="content">
               <form method="post" action=""  enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Account User</label>
                           <input type="text" name="user" class="form-control border-input"  placeholder="Your fortnite account user" >
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Account Password</label>
                           <input type="text" name="password" class="form-control border-input"  placeholder="Your fortnite account password" >
                        </div>
                     </div>
                  </div>
                
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <button type="submit" name="criarx" class="btn" style="border-radius:2px; background:black; color:white; border:none;">Save</button>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="clearf" style="width:100%; height:20px;"></div>
               </form>
               <?php 
                  if(isset($_POST['criarx'])){
                  
                          global $connect;
                  
                          $dat = date("Y/m/d");
                          
                  
                          $user =  $connect->real_escape_string($_POST['user']);
                          $password = $connect->real_escape_string($_POST['password']);
                  
                          if(empty($user)){
                  
                              echo'
                              <div class="alert alert-info">
                                <span>Please type an name for your stock item.</span>
                              </div>
                              ';
                    
                          }else{
                  
                  
                              if($stock = $connect->prepare("INSERT INTO stock_items (user,password,stock_id) VALUES(?,?,?)")){
                              $stock->bind_param("ssi", $user,$pass,$id);
                              $stock->execute();
                              
                              
                              echo'
                              <div class="alert alert-info">
                                <span>Success.</span>
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
               <h4 class="title">Accounts</h4>
               <p class="category">All accounts inside your stock</p>
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
                        <th>User</th>
                        <th>Options</th>
                     </tr>
                  </thead>
                  <tbody id="todos">
                     <form method="POST" action="">
                        <?php 
                           global $connect;
                           $accounts = $connect->query("SELECT * FROM stock_items ORDER BY id");
                           
                           while($fetch = $accounts->fetch_array(MYSQLI_ASSOC)){
                               
                               
                               
                               echo '
                           
                               <tr class="todo" id="zd_'.$fetch['id'].'">
                               <td><i class="ti-arrows-vertical" id="handle" ></i>'.utf8_decode($fetch['user']).'</td>
                               
                                 
                           
                                
                                 ';
                           
                                 global $url;
                           
                                 $var = $fetch['id'];
                                 $link = $url."/scripts/delete.php?id=".$var."&table=stock_items&secure_key=test";
                              
                                 echo'
                           
                           
                                 <input type="hidden" name="delete_id" value="'.$fetch['id'].'" />
                                 <td>
                                 <div class="text-left">
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
                        <th>User</th>
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
           "bSort" : false,
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
   $("#info").load("../../scripts/sort_sotck.php?"+order);
   }
   });
   
</script>