<h1>Reset Your Password</h1>
</br>

<!--Start Form-->
<?php $attributes = array(
                        'id'    => 'login_form',
                        'class' => 'form-horizontal'); ?>
<?php echo form_open('Email/forget_password',$attributes); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
      <p>
        <?php echo form_label('Email:'); ?>
    </div>
    <div class="col-sm-8">
      <?php
      $data = array(
                  'name'        => 'email',
                  'style'       => 'width:30%',
                  'value'       => set_value('email')); ?>
      <?php echo form_input($data); ?>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <p>
        <?php echo form_label('New Password:'); ?>
    </div>
    <div class="col-sm-8">
      <?php
      $data = array(
                  'name'        => 'password1',
                  'style'       => 'width:30%',
                  'value'       => set_value('password1')); ?>
      <?php echo form_password($data); ?>
    </p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <p>
        <?php echo form_label('Confirm Password:'); ?>
    </div>
    <div class="col-sm-8">
      <?php
      $data = array(
                  'name'        => 'password2',
                  'style'       => 'width:30%',
                  'value'       => set_value('password2')); ?>
      <?php echo form_password($data); ?>
    </p>
    </div>
  </div>

  <p>
    <?php $data = array(
                    'value' => 'Submit',
                    'name' => 'submit',
                    'class' => 'btn btn-primary'); ?>
    <?php echo form_submit($data); ?>
  </p>

</div>
<?php echo form_close(); ?>
