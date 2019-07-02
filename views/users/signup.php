<h1>Sign Up Form</h1>
</br>

<!--Display Errors-->
<?php echo validation_errors('<p class="text-error">'); ?>
 <?php echo form_open('users/signup'); ?>
<!--Field: First Name-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
      <p>
      <?php echo form_label('First Name:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                    'name'        => 'firstname',
                    'value'       => set_value('firstname')
                  );
      ?>
      <?php echo form_input($data); ?>
    </p>
    </div>

    <div class="col-sm-2">
      <p>
      <?php echo form_label('Last Name:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                    'name'        => 'lastname',
                    'value'       => set_value('lastname')
                  );
      ?>
      <?php echo form_input($data); ?>
    </p>
    </div>

    <div class="col-sm-2">
      <p>
      <?php echo form_label('Email Address:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                    'name'        => 'email',
                    'value'       => set_value('email')
                  );
      ?>
      <?php echo form_input($data); ?>
    </p>
    </div>

    <div class="col-sm-2">
      <p>
      <?php echo form_label('Phone:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                    'name'        => 'phone',
                    'value'       => set_value('phone')
                  );
      ?>
      <?php echo form_input($data); ?>
    </p>
    </div>

    <div class="col-sm-2">
      <p>
      <?php echo form_label('Program of Study:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                    'name'        => 'program',
                    'placeholder' => 'e.g., Computing',
                    'value'       => set_value('program')
                  );
      ?>
      <?php echo form_input($data); ?>
    </p>
    </div>

    <div class="col-sm-2">
      <p>
      <?php echo form_label('Current Semester:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                    'name'        => 'semester',
                    'placeholder' => 'e.g., 1st semester',
                    'value'       => set_value('semester')
                  );
      ?>
      <?php echo form_input($data); ?>
    </p>
    </div>

    <div class="col-sm-2">
      <p>
      <?php echo form_label('Username:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                    'name'        => 'username',
                    'value'       => set_value('username')
                  );
      ?>
      <?php echo form_input($data); ?>
    </p>
    </div>

    <div class="col-sm-2">
      <p>
      <?php echo form_label('Password:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                    'name'        => 'password',
                    'value'       => set_value('password')
                  );
      ?>
      <?php echo form_password($data); ?>
    </p>
    </div>

    <div class="col-sm-2">
      <p>
      <?php echo form_label('Confirm Password:'); ?>
    </div>
    <div class="col-sm-9">
      <?php
      $data = array(
                    'name'        => 'password2',
                    'value'       => set_value('password2')
                  );
      ?>
      <?php echo form_password($data); ?>
    </p>
    </div>
  </div>


</br>

<p>
<!--Submit Buttons-->
<?php $data = array("value" => "Sign Up",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>

    <?php echo form_submit($data); ?>
</p>
</div>
<?php echo form_close(); ?>
