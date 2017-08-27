<?php
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
        <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
       <link href="<?php echo ADMIN_URL; ?>js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
<body>
    
<!--   <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>-->
     <?php if($boolHeader){$this->load->view('admin/include/header');}?> 
    
     <div id="main">
    
        <div class="wrapper">

          <!-- START LEFT SIDEBAR NAV-->
         <aside id="left-sidebar-nav">
                <?php   if($boolSidebar){$this->load->view('admin/include/sidebar',$arrSidebar);}?>
          </aside>
          <!-- END LEFT SIDEBAR NAV-->

          <!-- //////////////////////////////////////////////////////////////////////////// -->

          <!-- START CONTENT -->
          <section id="content">

            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper" class=" grey lighten-3">
              <div class="container">
                <div class="row">
                  <?php $this->load->view('admin/include/breadcrumb'); ?>
                </div>
              </div>
            </div>
            <!--breadcrumbs end-->


            <!--start container-->
            <div class="container">
              <div class="section">

               <?php  $this->load->view('admin/'.$module); ?>
              </div>
            </div>
            <!--end container-->
          </section>
      

        </div>
    <!-- END WRAPPER -->

    </div> 
     <?php if($boolFooter){$this->load->view('admin/include/footer');}?>
   
   
   
   
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
     <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/core/listing.js"></script>     
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
       

    
    
    <!-- sparkline -->
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins/sparkline/sparkline-script.js"></script>
    
    <!--jvectormap-->
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins/jvectormap/vectormap-script.js"></script>
    
    <?php if($boolDataTables){ ?>
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins/data-tables/data-tables-script.js"></script> 
    <?php } ?>
    
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/plugins.js"></script>  
    <script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/CRUD.js"></script>  
    
</body>
    <!-- END BODY -->

</html>