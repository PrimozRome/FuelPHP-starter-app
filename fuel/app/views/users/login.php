<div class="hero-unit">
	<?php echo Form::open(array()); ?>
	<fieldset>
		<legend>Login form</legend>
	
		<?php if (isset($_GET['destination'])): ?>
			<?php echo Form::hidden('destination',$_GET['destination']); ?>
		<?php endif; ?>
	
		<?php if (isset($login_error)): ?>
			<div class="error"><?php echo $login_error; ?></div>
		<?php endif; ?>
		
		<div class="clearfix <?php if ($val->errors('email')) echo 'error'; ?>" style="margin-bottom:6px;">
			<label for="email">Email or Username:</label>
			<div class="input">
				<?php if ($val->errors('email')): ?>
				<?php echo Form::input('email', Input::post('email'), array('class'=>'error')); ?>
				<span class="help-inline"><?php echo $val->errors('email')->get_message('You must provide a username or email'); ?></span>
				<?php else: ?>
				<?php echo Form::input('email', Input::post('email')); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="clearfix <?php if ($val->errors('password')) echo 'error'; ?>">
			<label for="password">Password:</label>
			<div class="input">
				<?php if ($val->errors('password')): ?>
				<?php echo Form::password('password'); ?>
				<span class="help-inline"><?php echo $val->errors('password')->get_message(':label cannot be blank'); ?></span>
				<?php else: ?>
				<?php echo Form::password('password', array('class'=>'error')); ?>
				<?php endif; ?>
			</div>
		</div>		
		<div class="clearfix">
			<label for="">&nbsp;</label>
			<div class="input"><?php echo Form::submit(array('value'=>'Login', 'name'=>'submit', 'class'=>'btn primary')); ?></div>
		</div>
	
	</fieldset>
	<?php echo Form::close(); ?>
</div>

