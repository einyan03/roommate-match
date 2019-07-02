<?php if($this->session->flashdata('myprofile_updated')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('myprofile_updated'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('credentials_updated')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('credentials_updated'); ?>
  </div>
<?php endif; ?>

<h1>My Profile</h1>
</br>

<table class="table table-striped">
  <tbody>
    <tr>
      <td>First Name: </td>
      <td><?php echo $info->firstname; ?> </td>
    </tr>
    <tr>
      <td>Last Name: </td>
      <td><?php echo $info->lastname; ?> </td>
    </tr>
    <tr>
      <td>Email Address: </td>
      <td><?php echo $info->email; ?> </td>
    </tr>
    <tr>
      <td>Phone: </td>
      <td><?php echo $info->phone; ?> </td>
    </tr>
    <tr>
      <td>Program of Study: </td>
      <td><?php echo $info->program; ?> </td>
    </tr>
    <tr>
      <td>Current Semester: </td>
      <td><?php echo $info->semester; ?> </td>
    </tr>
  </tbody>
</table>

<p>
  <a href="<?php echo base_url(); ?>profiles/edit_myprofile/<?php echo $info->id; ?>">Edit my profile
  </a>
</p>

<!--p>
<a href="<?php echo base_url(); ?>profiles/update_credentials/<?php echo $info->id; ?>">Update my credentials
  </a>
</p>
