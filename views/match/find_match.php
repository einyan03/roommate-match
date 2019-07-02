<h1>Find My Match</h1>
<br>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3" style="background-color:lavender;"><h4>Accomodation Fees</h4></div>
    <div class="col-sm-3" style="background-color:lavenderblush;"><h4>No. of Roommates</h4></div>
    <div class="col-sm-3" style="background-color:lavender;"><h4>Location</h4></div>
    <div class="col-sm-3" style="background-color:lavenderblush;"><h4>Duration of Stay</h4></div>
  </div>

  <div class="row">
    <div class="col-sm-3">
      <ul>
        <?php foreach ($m_profiles as $profile) : ?>
          <?php if($profile->accom_fees == $this_profile->accom_fees) :?>
            <li>
              <a href="<?php echo base_url(); ?>match/match_details/<?php echo $profile->user_id; ?>">
                <?php echo $profile->user_firstname; ?> <?php echo $profile->user_lastname; ?></a><br>
              <?php echo $profile->user_program; ?>, <?php echo $profile->user_semester; ?><br>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="col-sm-3">
      <ul>
        <?php foreach ($m_profiles as $profile) : ?>
          <?php if($profile->num_roommates == $this_profile->num_roommates) :?>
            <li>
              <a href="<?php echo base_url(); ?>match/match_details/<?php echo $profile->user_id; ?>">
                <?php echo $profile->user_firstname; ?> <?php echo $profile->user_lastname; ?></a><br>
              <?php echo $profile->user_program; ?>, <?php echo $profile->user_semester; ?><br>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="col-sm-3">
      <ul>
        <?php foreach ($m_profiles as $profile) : ?>
          <?php if($profile->location == $this_profile->location) :?>
            <li>
              <a href="<?php echo base_url(); ?>match/match_details/<?php echo $profile->user_id; ?>">
                <?php echo $profile->user_firstname; ?> <?php echo $profile->user_lastname; ?></a><br>
              <?php echo $profile->user_program; ?>, <?php echo $profile->user_semester; ?><br>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="col-sm-3">
      <ul>
        <?php foreach ($m_profiles as $profile) : ?>
          <?php if($profile->stay_duration == $this_profile->stay_duration) :?>
            <li>
              <a href="<?php echo base_url(); ?>match/match_details/<?php echo $profile->user_id; ?>">
                <?php echo $profile->user_firstname; ?> <?php echo $profile->user_lastname; ?></a><br>
              <?php echo $profile->user_program; ?>, <?php echo $profile->user_semester; ?><br>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
