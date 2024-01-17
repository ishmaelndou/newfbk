<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                <a href="#" onclick="showAjaxModal('<?php echo site_url('admin/newsletter_add_form'); ?>', '<?php echo get_phrase('Newsletter template') ?>')" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class=" mdi mdi-plus"></i> <?php echo get_phrase('Newsletter'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
  <div class="col-lg-12">
    <div id="accordion" class="custom-accordion mb-4">

      <?php $newsletters = $this->db->get('newsletters')->result_array(); ?>
      <?php foreach($newsletters as $newsletter): ?>
        <div class="card mb-0">
          <div class="card-header" id="headingOne<?= $newsletter['id'] ?>">
            <h5 class="m-0">
              <a class="custom-accordion-title <?php echo isset($_GET['tab']) && $_GET['tab'] == $newsletter['id']? '':'collapsed'; ?> d-block pt-2 pb-2" data-toggle="collapse" href="#collapseOne<?= $newsletter['id']; ?>" aria-expanded="true" aria-controls="collapseOne<?= $newsletter['id'] ?>">
                <i class="mdi mdi-arrow-right-bold-outline"></i>
                <?php echo $newsletter['subject']; ?>
                <span class="float-right">
                  <i class="mdi mdi-chevron-down accordion-arrow"></i>
                </span>

                <span onclick="stopProp(event)">
                  <button class="btn btn-outline-danger float-right px-1 py-0 mr-4" onclick="confirm_modal('<?php echo site_url('admin/newsletters/delete/'.$newsletter['id']); ?>')" data-toggle="tooltip" title="<?php echo get_phrase('Delete'); ?>">
                    <i class="mdi mdi-delete"></i>
                  </button>
                  <button class="btn btn-outline-primary float-right px-1 py-0 mr-2" onclick="showAjaxModal('<?php echo site_url('admin/newsletter_edit_form/'.$newsletter['id']); ?>', '<?php echo get_phrase('Edit newsletter template') ?>')" data-toggle="tooltip" title="<?php echo get_phrase('Edit'); ?>">
                    <i class="mdi mdi-pencil"></i>
                  </button>
                  <button class="btn btn-outline-success float-right px-1 py-0 mr-2" onclick="showAjaxModal('<?php echo site_url('admin/newsletter_send_form/'.$newsletter['id']); ?>', '<?php echo get_phrase('Send Newsletter') ?>')" data-toggle="tooltip" title="<?php echo get_phrase('Send'); ?>">
                    <i class="mdi mdi-send  mdi-rotate-315"></i>
                  </button>
                </span>
              </a>
            </h5>
          </div>

          <div id="collapseOne<?= $newsletter['id'] ?>" class="collapse <?php echo isset($_GET['tab']) && $_GET['tab'] == $newsletter['id']? 'show':''; ?>" aria-labelledby="headingOne<?= $newsletter['id'] ?>" data-parent="#accordion">
            <div class="card-body">
              <?php echo $newsletter['description']; ?>
            </div>
          </div>
        </div> <!-- end card-->
      <?php endforeach; ?>

    </div> <!-- end custom accordions-->
  </div>
</div>

<script type="text/javascript">
  function stopProp(event){
    event.stopPropagation();
  }
</script>
