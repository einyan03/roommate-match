<h1>Details of Your Match</h1>

<p>From here, you can now reach out to your potential match to further evaluate with the
  personal information and accomodation preferences provided below, and potentially become
  roommmates.</p>
<p>Please make sure to keep your status and satisfaction with your match recorded on
  <a href="<?php echo base_url('match/satisfactory_report'); ?>">Satisfatory Report.</a></p>

</br>

<table class="table table-striped">
  <thead>
    <h3>Personal Information</h3>
  </thead>
  <tbody>
    <?php foreach ($this_details as $detail) : ?>
      <tr>
        <td>First Name: </td>
        <td><?php echo $detail->user_firstname; ?> </td>
      </tr>
      <tr>
        <td>Last Name: </td>
        <td><?php echo $detail->user_lastname; ?> </td>
      </tr>
      <tr>
        <td>Email Address: </td>
        <td><?php echo $detail->user_email; ?> </td>
      </tr>
      <tr>
        <td>Phone: </td>
        <td><?php echo $detail->user_phone; ?> </td>
      </tr>
      <tr>
        <td>Program of Study: </td>
        <td><?php echo $detail->user_program; ?> </td>
      </tr>
      <tr>
        <td>Current Semester: </td>
        <td><?php echo $detail->user_semester; ?> </td>
      </tr>
   <?php endforeach; ?>
  </tbody>
</table>

</br>

<table class="table table-striped">
  <thead>
    <h3>Accomodation Preferences</h3>
  </thead>
  <tbody>
    <?php foreach ($this_details as $detail) : ?>
      <tr>
        <td>Accomodation Fees: </td>
        <td><?php echo $detail->accom_fees; ?> </td>
      </tr>
      <tr>
        <td>No. of Roommates: </td>
        <td><?php echo $detail->num_roommates; ?> </td>
      </tr>
      <tr>
        <td>Location: </td>
        <td><?php echo $detail->location; ?> </td>
      </tr>
      <tr>
        <td>Duaration of Stay: </td>
        <td><?php echo $detail->stay_duration; ?> </td>
      </tr>
   <?php endforeach; ?>
  </tbody>
</table>

<ul class="pager">
  <li class="previous"><a href="<?php echo base_url('match/find_match'); ?>">Back</a></li>
  <li class="next"><a href="<?php echo base_url('match/satisfactory_report'); ?>">Satisfatory Report</a></li>
</ul>
