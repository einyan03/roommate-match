<h1>Edit My Match Profile</h1>
</br>

<!--Display Errors-->
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('profiles/edit_matchprofile/'.$info->id.''); ?>
<!--Field: First Name-->
<p>
<?php echo form_label('Accomodation Fees:'); ?>
<?php
$option = array(
              '6,000-8,000 kc'         => '6,000-8,000 kc',
              '8,000-10,000 kc'        => '8,000-10,000 kc',
              '10,000-15,000 kc'       => '10,000-15,000 kc'
            );
?>
<?php echo form_dropdown('accomodation', $option); ?>
</p>

<p>
<?php echo form_label('No. of Roommates:'); ?>
<?php
$option = array(
              'Only 1 person'     => 'Only 1 person',
              '1-3 persons'       => '1-3 persons',
              '3-5 persons'       => '3-5 persons'
            );
?>
<?php echo form_dropdown('roommates', $option); ?>
</p>

<p>
<?php echo form_label('Location:'); ?>
<?php
$option = array(
              'Walking distance to school'                       => 'Walking distance to school',
              'Close to City Center'                             => 'Close to City Center',
              'Anywhere that is close to any public transports'  => "Anywhere that is close to any public transport"
            );
?>
<?php echo form_dropdown('location', $option); ?>
</p>

<p>
<?php echo form_label('Duration of Stay:'); ?>
<?php
$option = array(
              '6 months'     => '6 months',
              '1 years'      => '1 years',
              '2 years'      => '2 years',
              '3 years'      => '3 years'
            );
?>
<?php echo form_dropdown('stay', $option); ?>
</p>

<?php $data = array("value" => "Update",
                      "name" => "submit",
                      "class" => "btn btn-primary"); ?>

<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
