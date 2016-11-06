<section>
<label id="error"></label>
 	 <h2>Регистрация пользователя</h2>
	<form action="" method="post">
 <label>ФИО</label><br><br>
 <input type="text" id="name" name="name" class="validation" value="<?php echo $_POST['name']; ?>"><br><br>
 <label>Email</label><br><br>
 <input type="email" id="email" class="validation"  name="email" value="<?php echo $_POST['email']; ?>"><br><br>

 <label>Выберите область</label><br><br>
 <select id="oblast" name="oblast"  data-placeholder="Choose a country..."  class="chosen-select validation">
 <option value="">---Выберите область---</option>
 <?php $result=UserController::selectInfo();
 
 	foreach ($result as $key):?>
 	 <?php if($key['ter_pid']==NULL): ?>
 	 	<option value="<?= $key['reg_id']; ?>"><?=$key['ter_name']?></option>

 <?php endif; ?>
<?php endforeach; ?>
	</select><br><br>

	<div id="other_select"></div> <br><br>
	<input type="submit" id="submit" name="submit" value="Сохранить">
	</form>
 </section>


	



