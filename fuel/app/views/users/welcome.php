<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
<h1>Welcome <?= $current_user->get_profile_field('firstname')?>!</h1>
<p>Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
<p><?= Html::anchor('home', 'Learn more &raquo;', array('class'=>'btn primary'))?></p>
</div>