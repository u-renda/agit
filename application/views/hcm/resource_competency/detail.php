<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption caption-md">
            <i class="icon-bar-chart theme-font hide"></i>
            <span class="caption-subject font-blue-madison bold uppercase">Detail</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row marginbottom15">
            <div class="col-sm-2 text-right">Nama</div>
            <div class="col-sm-10"><?php echo $this->session->userdata('name'); ?></div>
        </div>
        <div class="row marginbottom15">
            <div class="col-sm-2 text-right">NIK</div>
            <div class="col-sm-10"><?php echo $this->session->userdata('nik'); ?></div>
        </div>
        <div class="row marginbottom15">
            <div class="col-sm-2 text-right">Position</div>
            <div class="col-sm-10"><?php echo $this->session->userdata('position'); ?></div>
        </div>
        <div class="row">
            <div class="col-sm-2 text-right">Email</div>
            <div class="col-sm-10"><?php echo $this->session->userdata('email'); ?></div>
        </div>
    </div>
</div>