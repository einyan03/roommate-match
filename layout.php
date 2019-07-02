<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roommate-Match</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Roommate-Match</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <?php if($this->session->userdata('logged_in')) : ?>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
              Welcome, <?php echo $this->session->userdata('username'); ?> <span class="caret"></span>
            </a>

          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo base_url('Users/logout'); ?>">Log Out</a>
            </li>
          </ul>
        </li>

      <?php else : ?>
        <li><a href="<?php echo base_url('users/login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
        <li><a href="<?php echo base_url('users/signup'); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <?php endif; ?>
    </ul>

    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
      <?php if($this->session->userdata('logged_in')) : ?>
        <li><a href="<?php echo base_url('profiles/myprofile'); ?>">My Profile</a></li>
        <li><a href="<?php echo base_url('profiles/mymatchprofile'); ?>">My Accomodation Preferences</a></li>
        <li><a href="<?php echo base_url('match/find_match'); ?>">Find Match</a></li>
      <?php endif; ?>
    </ul>

  </div>
</nav>

<div class="container">
  <div>
    <?php $this->load->view($main_content); ?>
  </div>
</div>

</body>
</html>
