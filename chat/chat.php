<?php
	// require('config/config.php');
	require('classes/Chat.class.php');
	session_start();
	$chat = new Chat;
		switch ($_POST['acao']){
		case 'inserer':
			$chat->excluir();
			$chat->setName($_SESSION['prenom']);
			$chat->setMessages(filter_input(INPUT_POST, 'messages'));
			if($chat->inserer()){
				printf('<p class="ativo">[%s] - %s</p>', $chat->getName(), $chat->getMessages());
			}
		break;
		
		case 'atualiser':
			foreach($chat->lister() as $v){
				$ativo = ($v['name'] == $_SESSION['prenom']) ? ' class="ativo"' : '';
				printf('<p%s>[%s] - %s</p>', $ativo, $v['name'] ,$v['messages']);
			}
		break;
	}
	?>