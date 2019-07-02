<?php if($this->session->flashdata('created_mprofile')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('created_mprofile'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('updated_mprofile')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('updated_mprofile'); ?>
  </div>
<?php endif; ?>

<h1>My Accomodation Preferences</h1>
</br>

<?php if($info->m_created == 0) : ?>
  <p>You don't have a profile to find a roommate yet.<p>
  <p>
    <a href="<?php echo base_url(); ?>profiles/create_matchprofile/<?php echo $info->id; ?>">
      Create my match profile
    </a>
  </p>
<?php else : ?>
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>Accomodation: </td>
        <td><?php echo $details->accom_fees; ?> </td>
      </tr>
      <tr>
        <td>No. of Roommates: </td>
        <td><?php echo $details->num_roommates; ?> </td>
      </tr>
      <tr>
        <td>Location: </td>
        <td><?php echo $details->location; ?> </td>
      </tr>
      <tr>
        <td>Duration of Stay: </td>
        <td><?php echo $details->stay_duration; ?> </td>
      </tr>
    </tbody>
  </table>

  <p>
    <a href="<?php echo base_url(); ?>profiles/edit_matchprofile/<?php echo $info->id; ?>">
      Edit my match profile
    </a>
  </p>

<?php endif; ?>
