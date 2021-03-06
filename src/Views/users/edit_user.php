<h1><?php echo lang('Auth.edit_user_heading');?></h1>
<p><?php echo lang('Auth.edit_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

	<p>
		<?php echo form_label(lang('Auth.edit_user_fname_label'), 'first_name');?> <br />
		<?php echo form_input($firstName);?>
	</p>

	<p>
		<?php echo form_label(lang('Auth.edit_user_lname_label'), 'last_name');?> <br />
		<?php echo form_input($lastName);?>
	</p>

	<p>
		<?php echo form_label(lang('Auth.edit_user_company_label'), 'company');?> <br />
		<?php echo form_input($company);?>
	</p>

	<p>
		<?php echo form_label(lang('Auth.edit_user_phone_label'), 'phone');?> <br />
		<?php echo form_input($phone);?>
	</p>

	<p>
		<?php echo form_label(lang('Auth.edit_user_password_label'), 'password');?> <br />
		<?php echo form_input($password);?>
	</p>

	<p>
		<?php echo form_label(lang('Auth.edit_user_password_confirm_label'), 'password_confirm');?><br />
		<?php echo form_input($passwordConfirm);?>
	</p>

	<?php if ($ionAuth->isAdmin()): ?>

		<h3><?php echo lang('Auth.edit_user_groups_heading');?></h3>
		<?php foreach ($groups as $group):?>
			<label class="checkbox">
			<?php
			$gID     = (int)$group['id'];
			$checked = null;
			$item    = null;
			foreach ($currentGroups as $grp)
			{
				if ($gID === (int)$grp->id)
				{
					$checked = ' checked="checked"';
					break;
				}
			}
			?>
			<input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
			<?= esc($group['name']) ?>
			</label>
		<?php endforeach?>

	<?php endif ?>

	<?php echo form_hidden('id', $user->id);?>

	<p><?php echo form_submit('submit', lang('Auth.edit_user_submit_btn'));?></p>

<?php echo form_close();?>
