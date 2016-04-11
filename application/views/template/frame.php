<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('template/header'); ?>
    
    <body class="page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN CONTAINER -->
        <div class="wrapper">
            <?php $this->load->view('template/header_nav'); ?>
            
            <div class="container-fluid">
                <?php $this->load->view($frame_content); ?>
            </div>
        </div>
        
        <?php $this->load->view('template/footer'); ?>
    </body>
</html>