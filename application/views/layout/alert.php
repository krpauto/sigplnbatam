<?php if($this->session->flashdata('danger')){ ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?=$this->session->flashdata('danger')?>
    </div>
<?php } ?>

<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?=$this->session->flashdata('success')?>
    </div>
<?php } ?>

<?php if($this->session->flashdata('warning')){ ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?=$this->session->flashdata('warning')?>
    </div>
<?php } ?>