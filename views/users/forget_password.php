<?php if($this->session->flashdata('email_notexist')) : ?>
  <div class="alert alert-warning" role="alert">
    <?php echo $this->session->flashdata('email_notexist'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('new_password')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('new_password'); ?>
  </div>
<?php endif; ?>

<!-- comment only for einyan, delete later -->
<?php if($this->session->flashdata('email_notsent')) : ?>
  <div class="alert alert-warning" role="alert">
    <?php echo $this->session->flashdata('email_notsent'); ?>
  </div>
<?php endif; ?>

<h1>Forgot Password</h1></br>
<p>Please enter your email address and we'll send you instructions on how to reset your password.</p>

<!--Start Form-->
<?php $attributes = array(
                        'id'    => 'login_form',
                        'class' => 'form-horizontal'); ?>
<?php echo form_open('users/forget_password',$attributes); ?>

<div class="container-fluid">
  <div class="row">
    <p>
      <?php
      $data = array(
                  'name'        => 'email',
                  'placeholder' => 'Enter your email address',
                  'style'       => 'width:20%',
                  'value'       => set_value('email')); ?>
      <?php echo form_input($data); ?>
    </p>

    <p>
      <?php $data = array(
                      'value' => 'Reset',
                      'name' => 'submit',
                      'class' => 'btn btn-primary'); ?>
      <?php echo form_submit($data); ?>
    </p>
  </div>
