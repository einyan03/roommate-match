<?php if($this->session->flashdata('signed_up')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('signed_up'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('login_failed')) : ?>
  <div class="alert alert-warning" role="alert">
    <?php echo $this->session->flashdata('login_failed'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('reset_sent')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('reset_sent'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('email_sent')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('email_sent'); ?>
  </div>
<?php endif; ?>

<h1>Log In Form</h1>
</br>

<!--Start Form-->
<?php $attributes = array(
                        'id'    => 'login_form',
                        'class' => 'form-horizontal'); ?>
<?php echo form_open('users/login',$attributes); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-1">
      <p>
        <?php echo form_label('Username:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                  'name'        => 'username',
                  'placeholder' => 'Enter Username',
                  'style'       => 'width:30%',
                  'value'       => set_value('username')); ?>
      <?php echo form_input($data); ?>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-1">
      <p>
        <?php echo form_label('Password:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                  'name'        => 'password',
                  'placeholder' => 'Enter Password',
                  'style'       => 'width:30%',
                  'value'       => set_value('password')); ?>
      <?php echo form_password($data); ?>
    </p>
    </div>
  </div>

  <p>
    <?php $data = array(
                    'value' => 'Login',
                    'name' => 'submit',
                    'class' => 'btn btn-primary'); ?>
    <?php echo form_submit($data); ?>
  </p>

  <div>
    <span>
      Forgot
    </span>
    <a href="<?php echo base_url('users/forget_password'); ?>">
      Password?
    </a>
  </div>

  <!--register for an account-->
  <div>
    <span>
      Create an account?
    </span>
    <a href="<?php echo base_url('users/signup'); ?>">
      Sign up
    </a>
  </div>

</div>
<?php echo form_close(); ?>
