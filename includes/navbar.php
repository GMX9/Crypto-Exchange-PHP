<div class="sidebar" data-background-color="black" data-active-color="danger">
<?php 
global $main_logo;
$backoffice = $_GET['backoffice'];
?>

    <!--
       data-background-color="white | black"
       data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper"> 
        
            <div class="logo">
                <a href="/backoffice/inicio" class="simple-text">
                   <img src="<?php echo $main_logo; ?>" height="20px" />
                </a>
            </div>

            <ul class="nav">
                
                <li <?php if($backoffice == "inicio"){ echo 'class="active"'; }?> style="">
                    <a href="/backoffice/inicio">
                        <p>General</p>
                    </a>
                </li>
                
                <li <?php if($backoffice == "seo"){ echo 'class="active"'; }?> style="margin-top:-30px;">
                    <a href="/backoffice/seo">
                        <p>Seo</p>
                    </a>
                </li>
                
                <li <?php if($backoffice == "homepage"){ echo 'class="active"'; }?> style="margin-top:-30px;">
                    <a href="/backoffice/homepage">
                        <p>Homepage</p>
                    </a>
                </li>

                <li <?php if($backoffice == "about"){ echo 'class="active"'; }?> style="margin-top:-30px;">
                    <a href="/backoffice/about">
                        <p>About</p>
                    </a>
                </li>
                
                <li <?php if($backoffice == "help"){ echo 'class="active"'; }?> style="margin-top:-30px;">
                    <a href="/backoffice/help">
                        <p>Help</p>
                    </a>
                </li>

                <li <?php if($backoffice == "exchanges"){ echo 'class="active"'; }?> style="margin-top:-30px;">
                    <a href="/backoffice/exchanges">
                        <p>Exchanges</p>
                    </a>
                </li>
             
                
                
                <li <?php if($backoffice == "terms"){ echo 'class="active"'; }?> style="margin-top:-30px;">
                    <a href="/backoffice/terms">
                        <p>Terms and Conditions</p>
                    </a>
                </li>
           
                
                
                <li <?php if($backoffice == "privacidade"){ echo 'class="active"'; }?> style="margin-top:-30px;">
                    <a href="/backoffice/privacidade">
                        <p>Privacy Policy</p>
                    </a>
                </li>
      
                
        
               
                <li class="active-pro" style="margin-top:-30px;">
                    <a href="/backoffice/logout">
                        <p>Logout</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
    
    

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Backoffice</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    
                        
                      
                    </ul>

                </div>
            </div>
            
            </nav>
            

            
