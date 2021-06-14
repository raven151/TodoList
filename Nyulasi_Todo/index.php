<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="UTF-8">
		<title>Todo-app</title>
		<link href="res/style.css" rel="stylesheet" type="text/css">
		<!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

		<header>
		
		<?php
		
            $date = date('d-m-Y');
            $day = date('l');
            echo '<div class="Date">
            Today is '.$day.' and the date is: '.$date.'
            </div>';
            
            
            ?>
		<div class="Navigation">
			<nav>
				<ul class="centerBox">
                    <li><a href=""><img src="icons/chat.png" alt="Chat"></a></li>
					<li><a href=""><img src="icons/friend.jpg" alt="Add person"></a></li>
					<li><a href=""><img src="icons/configure.png" alt="Configure"></a></li>
                   
				</ul>
			</nav>
			</div>
		</header>
		
		
		
		
			<div class="centerBox">
				<main id="content">
				
				          <?php
                    include "res/database.php"; 
                    $db=DatabaseConnection();
                    $sql = "SELECT * FROM tasks";
                    $query = $db-> query($sql);
                    $result = $query->fetchAll( PDO:: FETCH_ASSOC);
                    echo'<table class="tasks">';
                    foreach($result as $record){
                       
                            $id = $record['id'];
                            $task = $record['task'];
                            $category = $record['category'];
                            $important = $record['important'];
                            $done = $record['done'];
                        if($done == 0){
                        
                         echo'<tr>';
				
							
							//echo'<td> <input type="checkbox" id="'.$id.'" name="'.$id.'" value="1"></td>';
							
								
                            
                            if($important == 1){
                                echo'
                         <td style="float:left;"><button class="btn" name ="Done" onclick="Done()"><i class="fa fa-circle-o" aria-hidden="true"></i></button>'.$task.' <p>Important</p></td>';
                                
                            }
                            else{
                                echo'<td style="float:left;"><button class="btn" name ="Done" onclick="Done()"><i class="fa fa-circle-o" aria-hidden="true"></i></button>'.$task.'</td>';
                            }
                            
                            echo'
                                <div style="float:right;">
								<td>'.$category.'</td>
                                </div>
							</tr>
							
						
						';
                        }
                        
                        
                    
                    }
                    echo'<tr id="AddTaskItem"><td style="float:left; text-align:left;"><button class="btn" name ="AddTask" onclick="Adder()"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add task</button></tr>';
                    echo'</table>';
                    
                    
                    ?>
<script>
function Adder() {
  document.getElementById("AddTaskItem").innerHTML = '<tr><td style="float:left; text-align:left;">  <label for="taskNew">Task:</label><input type="text" value="" name="taskNew"></td><td style="float:left; text-align:left;"><label for="importantNew">Important:</label><input type="checkbox" name="importantNew" value="1"></td><td style="float:left; text-align:left;">  <label for="categoryNew">Category:</label><input type="text" value="" name="categoryNew"></td><td style="float:left; text-align:left;"><button class="btn" name ="Save" onclick="Save()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button></td></tr>';
};
                    

</script>
               
<script>
    function Save(){
<?php
    if(isset($_POST['taskNew'])) {$taskNew = $_POST['taskNew'];} else{$taskNew = "New task";}//somehow the $_POST doesn't get the text areas value.
    if(isset($_POST['importantNew'])) {$impNew = 1;} else{$impNew = 0;}
    if(isset($_POST['categoryNew'])) {$categoryNew = $_POST['categoryNew'];}else{$categoryNew = "New category";}//somehow the $_POST doesn't get the text areas value.
    
    
    
    $sql = 'INSERT INTO tasks VALUES (NULL, :task, :category, :important, 0) ';
    $values = [ 'task'=> $taskNew, 'category'=>$categoryNew, 'important'=>$impNew];
    
    $query = $db->prepare($sql);
    $query->execute($values);
    
    ?>
    
    
    
}
</script>
    
                </main>

                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                </body>
                
                </html>
                
                
               
              
             
            