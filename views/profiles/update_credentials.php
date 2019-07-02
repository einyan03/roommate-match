<h1>Update My credentials</h1>
</br>

<!--Display Errors-->
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('profiles/update_credentials/'.$info->id.''); ?>
<!--Field: First Name-->
<p>
<?php echo form_label('Username:'); ?>
<?php echo form_textarea($info->username); ?>

</p>
<!--Field: Password-->
<p>
<?php echo form_label('Current Password:'); ?>
<?php
$data = array(
              'name'        => 'current_password',
              'value'       => set_value('password')
            );
?>
<?php echo form_password($data); ?>
</p>

<p>
<?php echo form_label('New Password:'); ?>
<?php
$data = array(
              'name'        => 'password1',
              'value'       => set_value('password1')
            );
?>
<?php echo form_password($data); ?>
</p>

<!--Field: Password2-->
<p>
<?php echo form_label('Confirm Password:'); ?>
<?php
$data = array(
              'name'        => 'password2',
              'value'       => set_value('password2')
            );
?>
<?php echo form_password($data); ?>
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Update Credentials",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
