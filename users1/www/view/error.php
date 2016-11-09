<?php if(isset($_POST['submit'])): ?>

<h4>Пользователь с таким Email уже существует</h4>
<ul>
	<li> Имя пользователя: <?=$equal[0]['name']?></li>
	<li> email: <?=$equal[0]['email']?></li>
	<li>Выбранная территория : <?=$value['ter_address']?></li>
</ul>
<?php endif; ?>