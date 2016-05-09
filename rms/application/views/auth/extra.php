<? $title = "Find extra"; include('jq_header.php'); ?> 
<body>
	<div data-role="page">
		<div data-role="header">
			<a href="/admin/" data-transition="slide" data-icon="home">Home</a>
			<h1>Extra finder</h1>
		</div>
		<div data-role="content">
			<div data-theme="a" data-form="ui-body-a" class="ui-body ui-body-a ui-corner-all">

<h1>People</h1>

<? if(!empty($message)) { ?><div id="infoMessage" style="background-color: #d4e0d4; padding:20px; margin:20px;"><?php echo $message; ?></div><? } ?>

<form id="tasks" name="tasks" method="post" action="/auth/extra">
	
<table cellpadding="0">
	<tr>
		<th><?php echo 'Username';?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th>Phone</th>
		<th>Comment</th>
		<th>BU</th>
		<th>Group</th>
		<th>SMS</th>
		<th>Email</th>
	</tr>
	<?php foreach ($users as $user):?>
		<? if($user->active == 1) { ?>
		<tr>
			<td style="border:1px solid #ccc; padding:5px;"><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?></td>
            <td style="border:1px solid #ccc; padding:5px;"><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td style="border:1px solid #ccc; padding:5px;"><?php echo htmlspecialchars($user->phone,ENT_QUOTES,'UTF-8');?></td>
			<td style="border:1px solid #ccc; padding:5px;"><?php echo htmlspecialchars($user->comment,ENT_QUOTES,'UTF-8');?></td>
			<td style="border:1px solid #ccc; padding:5px;">
				<?php foreach ($user->bus as $bu):?>
					<?=htmlspecialchars($bu->name)?><br />
                <?php endforeach?>
			</td>
			<td style="border:1px solid #ccc; padding:5px;">
				<?php foreach ($user->groups as $group):?>
					<?=htmlspecialchars($group->name)?><br />
                <?php endforeach?>
			</td>
			<td style="border:1px solid #ccc; padding:5px;"><input type="checkbox" name="sms-<?=$user->id?>" id="" class="" /></td>
			<td style="border:1px solid #ccc; padding:5px;"><input type="checkbox" name="email-<?=$user->id?>" id="" class="" /></td>
		</tr>
		<? } ?>
	<?php endforeach;?>
</table>
<p>Message: </p>
<textarea name="txtmessage">Hello! Je cherche quelqu'un/e pour le/s shift/s suivant/s :
{shifts ici} 
Attention, ne PAS répondre à ce SMS ou à cet email, ca ne marchera PAS! 
Me répondre directement sur mon numéro: <?=$current_user->phone?> et/ou mon email <?=$current_user->email?>
</textarea>
<input type="submit" name="Send" value="Send">
</form>
	</div><!-- /content -->
</div>
</div><!-- /page -->
<? include('jq_footer.php'); ?>