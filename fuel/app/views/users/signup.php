<div class="hero-unit">
	<?php echo Form::open(array()); ?>
	<fieldset>
		<legend>Signup</legend>
	
		<div class="clearfix <?php if ($val->errors('firstname')) echo 'error'; ?>" style="margin-bottom:6px;">
			<label for="email">Firstname:</label>
			<div class="input">
				<?php if ($val->errors('firstname')): ?>
				<?php echo Form::input('firstname', Input::post('firstname'), array('class'=>'error')); ?>
				<span class="help-inline"><?php echo $val->errors('firstname')->get_message('Enter your name'); ?></span>
				<?php else: ?>
				<?php echo Form::input('firstname', Input::post('firstname') ?: Arr::get($user_hash, 'name')); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="clearfix <?php if ($val->errors('lastname')) echo 'error'; ?>">
			<label for="email">Lastname:</label>
			<div class="input">
				<?php if ($val->errors('lastname')): ?>
				<?php echo Form::input('lastname', Input::post('lastname'), array('class'=>'error')); ?>
				<span class="help-inline"><?php echo $val->errors('lastname')->get_message('Enter your last name'); ?></span>
				<?php else: ?>
				<?php echo Form::input('lastname', Input::post('lastname')); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="clearfix <?php if ($val->errors('email')) echo 'error'; ?>" style="margin-bottom:6px;">
			<label for="email">Email (Username):</label>
			<div class="input">
				<?php if ($val->errors('email')): ?>
				<?php echo Form::input('email', Input::post('email'), array('class'=>'error')); ?>
				<span class="help-inline"><?php echo $val->errors('email')->get_message('You must provide a username or email'); ?></span>
				<?php else: ?>
				<?php echo Form::input('email', Input::post('email') ?: Arr::get($user_hash, 'email')); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="clearfix <?php if ($val->errors('password')) echo 'error'; ?>" style="margin-bottom:6px;">
			<label for="password">Password:</label>
			<div class="input">
				<?php if ($val->errors('password')): ?>
				<?php echo Form::password('password'); ?>
				<span class="help-inline"><?php echo $val->errors('password')->get_message(':label cannot be blank'); ?></span>
				<?php else: ?>
				<?php echo Form::password('password'); ?>
				<?php endif; ?>
			</div>
		</div>		
		<div class="clearfix <?php if ($val->errors('password_confirm')) echo 'error'; ?>">
			<label for="password">Confirm password:</label>
			<div class="input">
				<?php if ($val->errors('password_confirm')): ?>
				<?php echo Form::password('password_confirm'); ?>
				<span class="help-inline"><?php echo $val->errors('password_confirm')->get_message('Passwords do not match'); ?></span>
				<?php else: ?>
				<?php echo Form::password('password_confirm'); ?>
				<?php endif; ?>
			</div>
		</div>		
		<div class="clearfix">
			<label for="">&nbsp;</label>
			<div class="input">
				<?php echo Form::submit(array('value'=>'Signup', 'name'=>'submit', 'class'=>'btn primary')); ?>
				<?php echo Html::anchor('home', 'Cancel', array('class' => 'btn')); ?>
			</div>
		</div>
	
	</fieldset>
	<?php echo Form::close(); ?>
</div>

