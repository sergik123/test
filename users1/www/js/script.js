var t=3;
function result(obj){

		 $("#district_chosen").remove();
		$('#district').remove();
		$('.lbl_user').remove();
		 $('#other_select br').remove();
		$("#city").change(function(){
			 $("#district2_chosen").remove();
			 $('#district2').remove();


		});
		 var select3=document.createElement('select');
		 $(select3).append('<option>Выберите район</option>');

		 $(select3).append('</br></br>');

		$.post(

		  "controller/UserController.php",
		  {
		    district_id:obj.value
		  },
		  onAjaxSuccess
		);
		 
		function onAjaxSuccess(data)
		{
			var res = JSON.parse(data);

		  for(var i=0; i<res.length;i++){
		  	if(res[i].ter_name!="Выберите район"){
		  		district(res[i].ter_name,res[i].ter_id);
		  		$('#other_select').append(select3);
		  	}
		  	
		  }
		  	$("#district2").chosen({width: "30%"}); 		  
		  }

		function district(res,id){
			var option=document.createElement('option');
		  		option.innerHTML=res;
		  		option.value=id;
		  		select3.append(option);
		  		select3.setAttribute("class","chosen-select");
		  		select3.setAttribute("id","district2");
		  		select3.setAttribute("name","district2");
		  		select3.setAttribute("onChange","result(this)");

		
		$('#other_select').append(select3);
		}

	}
	
	function distr(obj){
		
		//t+=1;
		 $("#city_chosen").remove();
		$('#city').remove();
		$('.lbl_user').remove();
		 $('#other_select br').remove();

		
		 $("#district").change(function(){
		 	
			   $("#district3_chosen").remove();
			   $('#district3').remove();
			   $("#district4_chosen").remove();
			   		$("#district4").remove();
			   
			   		$("#district5_chosen").remove();
			   		$("#district5").remove();
			   t=3;
		});
		 	
			  $("#district3").change(function(){
		 
			   		$("#district4_chosen").remove();
			   		$("#district4").remove();
			   			   		
			   		t=4;
		});
		
	
		 var select4=document.createElement('select');
		 $(select4).append('<option>Выберите район</option>');
		 $(select4).append('</br></br>');

		$.post(

		  "controller/UserController.php",
		  {
		    district_id:obj.value
		  },
		  onAjaxSuccess
		);
		 
		function onAjaxSuccess(data)
		{
			var res = JSON.parse(data);

		  for(var i=0; i<res.length;i++){
		  		
		  		district(res[i].ter_name,res[i].ter_id);
		  		//$('#other_select').append(select4);

		  }
		  t+=1;
		  	$(".chosen-select").chosen({width: "30%"}); 
		  }

		function district(res,id){
				
			var option=document.createElement('option');
		  		option.innerHTML=res;
		  		option.value=id;
		  		select4.append(option);
		  		select4.setAttribute("class","chosen-select");
		  		select4.setAttribute("id","district"+t);
		  		select4.setAttribute("name","district2");
		  		select4.setAttribute("onChange","distr(this)");
		
		$('#other_select').append(select4);
		
		}
	}

