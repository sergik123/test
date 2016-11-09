	
$( document ).ready(function() {
 		$("#oblast").chosen(); 
 		
	$("#oblast").change(function(){
		$("#city_chosen").remove();
		$("#district_chosen").remove();
		$('.lbl_user').remove();
		$('#city').remove();
		$('#district').remove();
		$('#other_select br').remove();
		$("#district3_chosen").remove();
		$('#district3').remove();
		$("#district2_chosen").remove();
		$('#district2').remove();
		document.getElementById('other_select').innerHTML = '';
		

		 var select=document.createElement('select');
		
		 $(select).append('<option>Выберите город</option>');
		 var select2=document.createElement('select');
		$(select2).append('<option>Выберите район</option>');
		 	//$('#obl').innerHTML=txt;
		$.post(

		  "../controller/UserController.php",
		  {
		    sel_id:$("#oblast option:selected").val()
		  },
		  onAjaxSuccess
		);
		 
		function onAjaxSuccess(data)
		{
			var res = JSON.parse(data);

		  for(var i=0; i<res.length;i++){
		  	if(res[i].ter_type_id==1){

		  		city(res[i].ter_name,res[i].ter_id);

		  	}
		  	if(res[i].ter_type_id==2){
		  		district(res[i].ter_name,res[i].ter_id);

		  	}
		  	if(res[i].reg_id==85){
		  		if(res[i].ter_type_id==3){
		  			district(res[i].ter_name,res[i].ter_id);

		  		}
			  	if(res[i].ter_type_id==0){
			  		city(res[i].ter_name,res[i].ter_id);
			  	}
		  	}
		  	if(res[i].reg_id==80){
		  		if(res[i].ter_type_id==3){
					district(res[i].ter_name,res[i].ter_id);
		  		}
			  	if(res[i].ter_type_id==0){
			  		city(res[i].ter_name,res[i].ter_id);
			  	}
		  	}
		  }
		  	 $('#other_select').append('<label class="lbl_user">Выберите город</label></br></br>');
		  	$('#other_select').append(select);
		  	$('#other_select').append('</br></br><label class="lbl_user">Выберите район</label></br></br>');
		  	$('#other_select').append(select2);
		  	$("#city").chosen({width: "30%"}); 
		  	$("#district").chosen({width: "30%"}); 
		  }

		function city(res,id){
		  	var option=document.createElement('option');
		  		option.innerHTML=res;
		  		option.value=id;
		  		select.append(option);
		  		select.setAttribute("class","chosen-select");
		  		select.setAttribute("id","city");
		  		select.setAttribute("name","district2");
		  		select.setAttribute("onChange","result(this)");
		}

		function district(res,id){
			var option=document.createElement('option');
		  		option.innerHTML=res;
		  		option.value=id;
		  		select2.append(option);
		  		select2.setAttribute("class","chosen-select");
		  		select2.setAttribute("id","district");
		  		select2.setAttribute("name","district2");
		  		select2.setAttribute("onChange","distr(this)");
		}
		
	

	
	});

	$(".validation ").change(function(){
		var Regname = new RegExp("^.*[^A-zА-яЁё ].*$");
		var name=$("#name").val();
		var email=$("#email").val();
		var oblast=$("#oblast option:selected").val();
		var error=false;
		if(name==" "){
			error=true;
			alert('Поле ФИО должно быть заполнено');
			$('#submit').prop('disabled', true);
		}else if(Regname.test(name)){
			error=true;
			// $("#error").innerHTML='В поле ФИО должны быть только буквы';
			 	alert('В поле ФИО должны быть только буквы');
			 	$('#submit').prop('disabled', true);
			 }
		else if(email==" "){
			 //$("#error").innerHTML='Поле email должно быть заполнено';
			 error=true;
			alert('Поле email должно быть заполнено');
			$('#submit').prop('disabled', true);
		}else if(oblast==" "){
			// $("#error").innerHTML='Необходимо выбрать область';
			error=true;
			alert('Необходимо выбрать область');
			$('#submit').prop('disabled', true);
		}else{
			$('#submit').prop('disabled', false);
			error=false;
		}
	});
	
});


