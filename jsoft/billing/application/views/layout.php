<!-- header -->
<?php include "includes/header_main.php";?>
<!-- /header -->

<!-- Left side column. contains the logo and sidebar -->
<?php //if($req_page_name!="pos/pointofsale"){?>
<?php include "includes/sidebar_left.php";?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?php require_once $req_page_name.".php";?>
</div>
<div class="control-sidebar-bg"></div>
</div>
<?php include "includes/footer.php";?>