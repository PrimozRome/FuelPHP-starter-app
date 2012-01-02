<h2>Viewing #<?php echo $user->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $user->email; ?></p>
<p>
	<strong>Slug:</strong>
	<?php echo $user->username; ?></p>
<p>
	<strong>Summary:</strong>
	<?php echo $user->password; ?></p>

<?php echo Html::anchor('admin/users/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/users', 'Back'); ?>