<?php
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once("$document_root/model/SelectDb.php");

	class UserController
	{
		public function selectInfo()
		{
			$info=new SelectDb;
			$arraylist=$info->allInfo();
			return $arraylist;
		}
		public function selectCity()
		{
			
				$result=$_POST['sel_id'];
				$info=new SelectDb;
				$info->city($result);
		}
		public function addNewUser($name,$email,$territory)
		{
				$info=new SelectDb;
				$info->addUser($name,$email,$territory);
		}
		public function selectEmail($result)
		{
			$info=new SelectDb;
			//$result=$_POST['email'];
			$arraylist=$info->selectUser($result);
			return $arraylist;
		}
	}

	if(isset($_POST['sel_id'])){
		UserController::selectCity();
	}
	
	if(isset($_POST['submit'])){
		if($_POST['oblast']!=""){
			$result=$_POST['oblast'];
			$oblast=SelectDb::selectedOblast($result);
		}

		$name=$_POST['name'];
		$email=$_POST['email'];
		$territory=$oblast.','.$_POST['city'].','.$_POST['district'];
	
		if($name && $email && $oblast && $territory !=" "){
			$info=new SelectDb;
			$equal=$info->selectUser($email);
			if($equal){
				foreach ($equal as $value) {
					echo "<h4>Пользователь с таким Email уже существует</h4>";
					echo "<ul>";
					echo "<li>";
					echo "Имя пользователя: ".$equal[0]['name'];
					echo "</li>";
					echo "<li>";
					echo "email: ".$equal[0]['email'];
					echo "</li>";
					echo "<li>";
					echo "Выбранная территория : ".$equal[0]['territory'];
					echo "</li>";
					echo "</ul>";
				}
			}else{
				UserController::addNewUser($name,$email,$territory);
				$_POST['name']="";
				$_POST['email']="";
				$_POST['city']="";
				$_POST['district']="";
				$_POST['oblast']="";
				echo "Спасибо за регистрацию!!";
			}
				
		}else{
			echo "Все поля обязательны для заполнения";
		}
		
	}
 ?>