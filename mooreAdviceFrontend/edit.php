<?php


			$form='<form action="#">
					  <div class="form-group">
						<label for="taskname">Task Name</label>
						<input type="text" class="form-control" placeholder="Enter Task Name" id="taskname">
					  </div>
					  <div class="form-group">
						<label>Task Description:</label>
						<textarea class="form-control" placeholder="Enter task description" id="description"></textarea>
					  </div>
					  <div class="form-group">
						<label>Completion Date</label>
						<input type="date" class="form-control" placeholder="Enter Task Name" id="date">
					  </div>
					 
					  
					   <button type="submit" onclick="updateTask()" class="btn btn-primary">UPATE Task</button>
					</form>';
					
					$out=include("layout/layout.php");
					$content = str_replace("change", "$form",$out);
					echo $content;





?>
  <script>
  const currentURL = window.location.href;
 let val=currentURL.split("?");
  let id=val[1];
 
  
  selectTaskById(id);

function selectTaskById(id){
	
	
	 $.ajax({
		type:"GET",
		url:`http://127.0.0.1:8000/api/task/${id}`,
		
		success: function(data) { 
		   appendData(data);
		 
		},
		 error: function (error) {
                console.log(error);
            }
	
		
	});
	
}
function appendData(data){
	
	$('#taskname').val(data['taskname']);
	$('#description').val(data['taskdescription']);
	$('#date').val(data['completion_date']);
	  updateTask(data);
}

function updateTask(data){
	
	 let url=`http://127.0.0.1:8000/api/task/${data['id']}`;
	 $.ajax({
		type:"PUT",
		url:url,
		data: { 
			 taskname:data['taskname'],
			 taskdescription:data['taskdescription'],
			 completion_date:data['completion_date']
			 
			
			},
			success: function(data) { 
				//alert('update');
			 // window.location.href = "http://localhost/mooreAdviceFrontend/index.php";
			},
		 error: function (error) {
                console.log(error);
            }
	});
}
  </script>
</html>