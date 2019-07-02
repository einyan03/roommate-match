<h1>Edit My Profile</h1>
</br>

<!--Display Errors-->
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('profiles/edit_myprofile/'.$this_profile->id.''); ?>
<!--Field: First Name-->
<p>
<?php echo form_label('First Name:'); ?>
<?php
$data = array(
              'name'        => 'firstname',
              'value'       => $this_profile->firstname
            );
?>
<?php echo form_input($data); ?>
</p>
<!--Field: Last Name-->
<p>
<?php echo form_label('Last Name:'); ?>
<?php
$data = array(
              'name'        => 'lastname',
              'value'       => $this_profile->lastname
            );
?>
<?php echo form_input($data); ?>
</p>

<p>
<?php echo form_label('Email Address:'); ?>
<?php
$data = array(
              'name'        => 'email',
              'value'       => $this_profile->email
            );
?>
<?php echo form_input($data); ?>
</p>

<p>
<?php echo form_label('Phone:'); ?>
<?php
$data = array(
              'name'        => 'phone',
              'value'       => $this_profile->phone
            );
?>
<?php echo form_input($data); ?>
</p>

<p>
<?php echo form_label('Program of Study:'); ?>
<?php
$data = array(
              'name'        => 'program',
              'placeholder' => 'e.g., Fine Arts',
              'value'       => $this_profile->program
            );
?>
<?php echo form_input($data); ?>
</p>

<p>
<?php echo form_label('Current Semester:'); ?>
<?php
$data = array(
              'name'        => 'semester',
              'placeholder' => 'e.g., 2nd semester',
              'value'       => $this_profile->semester
            );
?>
<?php echo form_input($data); ?>
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Update Profile",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
