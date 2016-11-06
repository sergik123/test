<?php 
	class SelectDb
	{
	
		public function allInfo()
		{
			$link =  mysqli_connect('localhost', 'root', '','userdb');
			 $result_array=array();
			 $table_name='t_koatuu_tree';
			 $sql_select_user="SELECT * FROM $table_name";
			 $res=mysqli_query($link,$sql_select_user);
			 while($r=$res->fetch_assoc()) {
				array_push($result_array, $r);
			}
			return $result_array;
		}
		public function city($result)
		{
				$link = mysqli_connect('localhost', 'root', '','userdb');
				 $result_array=array();
				 $table_name='t_koatuu_tree';
				 $sql_select_user="SELECT * FROM $table_name WHERE reg_id=$result";
				 $res=mysqli_query($link,$sql_select_user);
				 while($r=$res->fetch_assoc()) {
					array_push($result_array, $r);
				}
				echo json_encode($result_array);
		}
		public function createTable()
		{
			$link = mysqli_connect('localhost', 'root', '','userdb');
			$table_name='user_info';
			$sql_tbl="CREATE TABLE IF NOT EXISTS $table_name (`id_users` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(300) NOT NULL,
			`email` text NOT NULL,
			`territory` text NOT NULL,
			PRIMARY KEY (`id_users`)) ENGINE=MYISAM CHARSET=utf8 AUTO_INCREMENT=1;";
			mysqli_query($link,$sql_tbl);
		}
		public function addUser($name,$email,$territory)
		{
			$link = mysqli_connect('localhost', 'root', '','userdb');
			$table_name='user_info';
			$sql_insert_user="INSERT INTO $table_name (name, email, territory) VALUES('$name','$email','$territory')";
			$res= mysqli_query($link,$sql_insert_user);
	
			mysqli_close($link);
		}
		public function selectedOblast($result)
		{
				$link = mysqli_connect('localhost', 'root', '','userdb');
				 $result_array=array();
				 $table_name='t_koatuu_tree';
				 $sql_select_user="SELECT `ter_name` FROM $table_name WHERE reg_id=$result AND ter_type_id=0";
				 $res=mysqli_query($link,$sql_select_user);
				 while($r=$res->fetch_assoc()) {
					array_push($result_array, $r);
				}
				return $result_array[0]['ter_name'];
		}
		public function selectUser($email)
		{

			$link = mysqli_connect('localhost', 'root', '','userdb');
			 $result_array=array();
			$table_name='user_info';
			
			$sql_select_user="SELECT * FROM $table_name WHERE email=\"$email\"";
			$res= mysqli_query($link,$sql_select_user);
			
			while($r=$res->fetch_assoc()) {
				array_push($result_array, $r);
			}
			if($res){
				return $result_array;	
			}else{
				return 0;
			}
			
		}
	
	}
	
		$create=new SelectDb();
		$create->createTable();
 ?>