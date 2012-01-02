<div class="topbar">
  <div class="fill">
    <div class="container">
      <a class="brand" href="<?=Config::get('base_url');?>">FuelPHP starter</a>
      <ul class="nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <?php if($logged_in) { ?>
      <p class="pull-right">Logged in as <a href="users"><?= $current_user->username ?></a>, <a href="users/logout">logout</a>.</p>
      <?php } else { ?>
      <p class="pull-right"><?= Html::anchor('users/signup', 'Signup')?> or <?= Html::anchor('users/login', 'Login')?></p>
      <?php } ?>
    </div>
  </div>
</div>
