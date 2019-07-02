<?php if($this->session->flashdata('login_success')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('login_success'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('logged_out')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('logged_out'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('no_access')) : ?>
  <div class="alert alert-warning" role="alert">
    <?php echo $this->session->flashdata('no_access'); ?>
  </div>
<?php endif; ?>

<h1>Welcome to Roommate-Match!</h1></br>
<p>This web application is created to allow users to manage their login/logout processes and their profiles
    as well as to retrieve their credentials when forgotten.</p></br>
<?php if(!$this->session->userdata('logged_in')) : ?>
    <p>For existing members, please log into your account.</p>
    <p>For new members, you can access to the application by creating an account.</p>
<?php else :?>
  <p>
    To find your potential roommate, you will have to create a profile that provides your accomodation preferences.
    To create one, please go to <a href="<?php echo base_url('profiles/mymatchprofile'); ?>">My Accomodation Preferences</a>.
  </p>
<?php endif; ?></br>
<p>Enjoy using Roommate-Match...</p>
