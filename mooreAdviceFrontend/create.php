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
					 
					  
					   <button type="submit" onclick="createTask()" class="btn btn-primary">Create Task</button>
					</form>';
					
					$out=include("layout/layout.php");
					$content = str_replace("change", "$form",$out);
					echo $content;





?>
  <script>
function createTask(){

	  let taskname=$("#taskname").val();
	   let description=$("#description").val();
	    let date=$("#date").val();
			//alert(taskname);
	 $.ajax({
		type:"POST",
		url:"http://127.0.0.1:8000/api/task",
		data: { 
			 taskname:taskname,
			 taskdescription:description,
			 completion_date:date
			 
			
			},
			success: function(data) { 
			
			  window.location.href = "http://localhost/mooreAdviceFrontend/index.php";
			},
		 error: function (error) {
                console.log(error);
            }
	});
}

  </script>
</html>