<?php
          
			$table= "<table class=\"table\">
						  <thead>
							<tr>
							  <th scope=\"col\">S/N</th>
							  <th scope=\"col\">Task Name</th>
							  <th scope=\"col\">Task Description</th>
							  <th scope=\"col\">Completion Date</th>
							  <th scope=\"col\">Edit</th>
							  <th scope=\"col\">Delete</th>
							</tr>
						  </thead>
						  <tbody id=\"body\">
							
							 
							</tr>
							
						  </tbody>
						</table>";
			
			 $out=include("layout/layout.php");
			 $content = str_replace("change", "$table",$out);
		     echo $content;
			
?>	
  <Style>
	.hid{
		display:none;
	}
  </Style>
 <script>
 
 document.addEventListener("DOMContentLoaded", function() {
	
	selectTask();
	
});

function selectTask(){
	
	
	 $.ajax({
		type:"GET",
		url:"http://127.0.0.1:8000/api/task",
		/*headers: {
                    'Content-Type':'application/json',
                    'Access-Control-Allow-Origin':'*',
                    'Access-Control-Allow-Methods':'GET'
                
            },*/
		success: function(data) { 
		   createTable(data);
		},
		 error: function (error) {
                console.log(error);
            }
	
		
	});
	
}
function createTable(myArray) {
console.log(myArray);
 let result = " ";
   for(let i=0; i<myArray.length; i++){
		let c= i;
		c++;
    result +="<tr>";
			result +="<td>" + c +"</td>";
			result +="<td>"+myArray[i]['taskname']+"</td>";
			result +="<td>"+myArray[i]['taskdescription']+"</td>";
			result +="<td>"+myArray[i]['completion_date']+"</td>";
			
result += "<td onclick='edit(this)'><span class='hid'>" + myArray[i]['id'] + "/</span><span><a href='edit.php?" + myArray[i]['id'] + "'>Edit</a></span></td>";

			result +="<td onclick='del(this)'><span class='hid'>"+myArray[i]['id']+"/"+"</span><span>Delete</span></td>";
			
			//result +=myArray[i]['id'];
		
	  result += "</tr>"; 
		
	}
$("#body").append(result);
    console.log(result);
}

function del(e){
	
	var text = $(e).text();
	text=text.split("/");
	let val=text[0];
	let url=`http://127.0.0.1:8000/api/task/${val}`
	
	$.ajax({
    type: "DELETE",
    url: url,
    success: function(data) {
		 window.location.href = "index.php";
    },
    error: function(error) {
      console.log(error);
    }
  });
	
}
function edit(e){
	
	var text = $(e).text();
	text=text.split("/");
	let val=text[0];
	//alert('Deletion successful');
	
}
  </script>

</html>