<?php
	// require('config/config.php');
	require('classes/Chat.class.php');
	$chat = new Chat;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Chat</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript"	src="js/jquery.min.js"></script>
<script type="text/javascript"	src="js/chat.js"></script>

</head>
<body>


<div id="painel" >
<?php 
session_start();
	foreach($chat->lister() as $v){
				$ativo = ($v['name'] == $_SESSION['prenom']) ? ' class="ativo"' : '';
				printf('<p%s>[%s] - %s</p>', $ativo, $v['name'], $v['messages']);
			}
?>
</div>

<form action="" method="post" id="frm-msg">

	<fieldset>
		<label> 
	<span>Messages</span>
	<textarea name="messages" id="messages" cols="10" rows="5" style='width:280px; height:40px;'></textarea>
	<input type="hidden" name="name"	id="name" value="<?php echo $_SESSION['prenom']?>"/>
    <input type="button"  id="submit" class="bouton" title="envoyer" />
        </label> 

	</fieldset>
</form>
</body>
</html>
