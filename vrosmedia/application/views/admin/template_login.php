<?php
     $this->admin_headerlib->add_stylesheet("prism","prism.css");
     $this->admin_headerlib->add_stylesheet("page-center","page-center.css");
        
$headerData = $this->admin_headerlib->data();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        
         <title><?php echo 'Vros Media Control Panel' ?></title>
       
        
     
      
        <?php echo $headerData['stylesheets']; ?>
          <?php echo $headerData['plugins']; ?>
       
        <script type="text/javascript">
            var SITE_URL = '<?php echo base_url(); ?>admin/';
        </script> 
        
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="cyanImages">
    <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
  
        <!-- BEGIN PAGE CONTENT INNER -->
        <?php $this->load->view('admin/'.$module); ?>
        <!-- END PAGE CONTENT INNER -->

    


   
  <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/materialize.js"></script>
  <!--prism-->
 

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins.js"></script>
  
</body>
<!-- END BODY -->
</html>