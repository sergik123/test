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
		public function selectDistrict()
		{
			
				$result=$_POST['district_id'];
				$info=new SelectDb;
				$info->district($result);
				

		}
		public function addNewUser($name,$email,$territory)
		{
				$info=new SelectDb;
				$info->addUser($name,$email,$territory);
		}
		public function selectEmail($result)
		{
			$info=new SelectDb;
			$arraylist=$info->selectUser($result);
			return $arraylist;
		}
		public function validateError(){
			if(isset($_POST['sel_id'])){
				$res=new UserController;
				$array=$res->selectCity();

			}
			if(isset($_POST['district_id'])){
				if($_POST['district_id']!=""){
					$res=new UserController;
				$array=$res->selectDistrict();
				}else{
					$res=new UserController;
					$array=$res->selectCity();
				}		
			}
	
			if(isset($_POST['submit'])){
				if($_POST['oblast']!=""){
					$result=$_POST['oblast'];
					$res=new SelectDb;
					$oblast=$res->selectedOblast($result);
				}

				$name=$_POST['name'];
				$email=$_POST['email'];
				
				if($_POST['district2']!="Выберите район"){
					$territory=$_POST['district2'];	
				}else{
					$territory="";
				}
				if($name && $email && $oblast && $territory !=""){
					$info=new SelectDb;
					$equal=$info->selectUser($email);
					if($equal){
						foreach ($equal as $value) {				
							if($value['ter_id']==$equal[0]['territory']){
								require_once('view/error.php');
							}
						}
					}else{
						$res=new UserController;
						$array=$res->addNewUser($name,$email,$territory);
						$_POST['name']="";
						$_POST['email']="";
						$_POST['city']="";
						$_POST['district2']="";
						$_POST['oblast']="";
						echo "Спасибо за регистрацию!!";
					}
						
				}else{
					echo "Все поля обязательны для заполнения";
				}
				
			}
		}
	}
	$validate=new UserController;
	echo $validate->validateError();
	
 ?>