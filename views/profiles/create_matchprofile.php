<h1>Create My Match Profile</h1>
</br>

<!--Display Errors-->
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('profiles/create_matchprofile/'.$info->id.''); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
      <p>
        <?php echo form_label('Accomodation:'); ?>
    </div>
    <div class="col-sm-10">
      <?php
      $option = array(
                    '6,000-8,000 kc'         => '6,000-8,000 kc',
                    '8,000-10,000 kc'        => '8,000-10,000 kc',
                    '10,000-15,000 kc'       => '10,000-15,000 kc');
      ?>
      <?php echo form_dropdown('accomodation', $option); ?>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <p>
        <?php echo form_label('No. of Roommates:'); ?>
    </div>
    <div class="col-sm-10">
      <?php
      $option = array(
                    'Only 1 person'     => 'Only 1 person',
                    '1-3 persons'       => '1-3 persons',
                    '3-5 persons'       => '3-5 persons');
      ?>
      <?php echo form_dropdown('roommates', $option); ?>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <p>
        <?php echo form_label('Location:'); ?>
    </div>
    <div class="col-sm-10">
      <?php
      $option = array(
        'Walking distance to school'                       => 'Walking distance to school',
        'Close to City Center'                             => 'Close to City Center',
        'Anywhere that is close to any public transports'  => "Anywhere that is close to any public transport");
      ?>
      <?php echo form_dropdown('location', $option); ?>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <p>
        <?php echo form_label('Duration of Stay:'); ?>
    </div>
    <div class="col-sm-10">
      <?php
      $option = array(
                    '6 months'     => '6 months',
                    '1 years'      => '1 years',
                    '2 years'      => '2 years',
                    '3 years'      => '3 years');
      ?>
      <?php echo form_dropdown('stay', $option); ?>
      </p>
    </div>
  </div>

  <?php $data = array("value" => "Create",
                        "name" => "submit",
                        "class" => "btn btn-primary"); ?>

  <p>
      <?php echo form_submit($data); ?>
  </p>
</div>

<?php echo form_close(); ?>
