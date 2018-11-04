  <div class="content">
            <div class="container-fluid">
                
                         <div class="row">
                          <div class="col-md-12">
                    <button class="btn" id="adicionar" style="border-radius:2px; background:black; color:white; border:none;">Add new access</button>
                    </div>
                    </div>
                    
                                           <div class="row">
                                            
                              
        <div class="col-md-12" style="margin-top:10px; " id="add">

                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add new access</h4>
                            </div>
                            <div class="content">
                                <form method="post" action=""  enctype="multipart/form-data">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="text" name="user" class="form-control border-input"  placeholder="E-mail" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="senha" class="form-control border-input"  placeholder="Password" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-md-12">
                                            <div class="form-group">   
                                            <label>Level of Access</label><br>
                                              <select name="acesso">
                                                  <option value="4">Administrator/Backoffice</option>
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
        
        $username = preg_replace('/\s+/', '', $_POST['user']);  
        $username = htmlentities($connect->real_escape_string($username));
        $password = sha1(htmlentities($connect->real_escape_string($_POST['senha'])));
        $nivel = $_POST['acesso'];

        $ordem = 0;
        
        $check_email = $connect->prepare("SELECT * FROM users WHERE  username = ?");
        $check_email->bind_param("s", $username);
        $check_email->execute();
        $check_email->store_result();
        
        $row_name_email = $check_email->num_rows;

       $check_email->close();


        


        if($row_name_email){
              
                echo'
               <div class="alert alert-warning">
              <span>Already exists an account with the same details.</span>
            </div>
               ';
              echo'<META HTTP-EQUIV="refresh" CONTENT="4">';


        
  
        }else{

    
          $save = $connect->prepare("INSERT INTO users (email,password,rank) VALUES(?, ?, ?)");
          $save->bind_param("ssi", $username,$password,$nivel);
          $save->execute();
          $save->close();

            if(!$save){
             printf("Errormessage: %s\n", $connect->error);
            }else{

               echo'
            <div class="alert alert-info">
              <span>Success.</span>
            </div>
            ';

            }
        
                



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
                                <h4 class="title">Users</h4>
                                <p class="category">All users with admin access</p>
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
                                      <th>Access</th>
                                      <th>Options</th>
                                    </tr>
                                </thead>
                                    <tbody id="todos">
                                        <form method="POST" action="">
                                    <?php 
                                    global $connect;
                                    $noticias = $connect->query("SELECT * FROM users ORDER BY id ASC");
                                    
                                    while($fetch = $noticias->fetch_array(MYSQLI_ASSOC)){
                                        
                                        
                                        if($fetch['rank'] == 4){
                                            $rank = "Administrador"; 
                                        } 
                                        
                                        
                                        
                                        echo '
                                    
                                        <tr class="todo" id="zd_'.$fetch['id'].'">
                                          <td>'.$fetch['email'].'</i></td>
                                          <td>'.$rank.'</i></td>


                                         
                                          ';

                                          global $url;
 
                                          $var = $fetch['id'];
                                          $link = $url."/scripts/delete.php?id=".$var."&table=users&secure_key=test";
                                       
                                          echo'

                          
                                          <input type="hidden" name="delete_id" value="'.$fetch['id'].'" />
                                          <td>
                                          <div class="text-left">
                                          <a href="/backoffice/editar_user/'.$fetch['id'].'"><button type="submit" name="editar"  class="btn" style="color:black; font-size:24px; border:none; background:transparent;"><i class="ti-pencil"></i></button></a>

                                          <a href="'.$link.'">
                                          <div id="'.$var.'" name="eliminar"  class="btn" style="float:left; border-radius:2px; background:transparent; font-size:24px; color:black; border:none;"><i class="ti-trash"></i></div>
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
                                      <th>Access</th>
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
$("#info").load("../../scripts/sort_acesso.php?"+order);
}
});

</script>
      


