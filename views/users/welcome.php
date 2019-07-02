<?php if($this->session->flashdata('logged_in')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('logged_in'); ?>
  </div>
<?php endif; ?>

<h3>Welcome to MyWEB!</h3>
<p>With MyWEB, you can simply view your profile in which you can update your details.</p>
<p>Enjoy using MyWEB...</p>
