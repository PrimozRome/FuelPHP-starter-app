<div class="topbar">
  <div class="fill">
    <div class="container">
      <a class="brand" href="<?=Config::get('base_url');?>">FuelPHP starter</a>
      <ul class="nav">
        <li class="active"><?= Html::anchor('home', 'Home')?></li>
      </ul>
      <?php if($logged_in) { ?>
      <ul class="nav secondary-nav">
        <li class="menu dropdown" data-dropdown="dropdown">
            <a href="#" class="menu"><?php echo $current_user->get_name() ?></a>
            <ul class="menu-dropdown">
                <li><?php echo Html::anchor('users/settings', 'Account settings') ?></li>
                <li><?php echo Html::anchor('users/profile', 'Edit profile') ?></li>
            	<li class="divider"></li>
                <li><?php echo Html::anchor('users/logout', 'Logout') ?></li>
            </ul>
        </li>
      </ul>
      <?php } else { ?>
      <p class="pull-right"><?= Html::anchor('users/signup', 'Signup')?> or <?= Html::anchor('users/login', 'Login')?></p>
      <?php } ?>
    </div>
  </div>
</div>
