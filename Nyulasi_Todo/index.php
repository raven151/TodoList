<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="UTF-8">
		<title>Todo-app</title>
		<link href="res/style.css" rel="stylesheet" type="text/css">
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
                         <td style="float:left;"><input type="checkbox" id="'.$id.'" name="'.$id.'" value="1">'.$task.' <p>Important</p></td>';
                                
                            }
                            else{
                                echo'<td style="float:left;"><input type="checkbox" id="'.$id.'" name="'.$id.'" value="1">'.$task.'</td>';
                            }
                            
                            echo'
                                <div style="float:right;">
								<td>'.$category.'</td>
                                </div>
							</tr>
							
						
						';
                        }
                        
                        
                    
                    }
                    echo'<tr><td style="float:left; text-align:left; border-bottom: none;">Add task<td></tr>';
                    echo'</table>';
                    
                    
                    ?>
				
     
                </main>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                </body>
                
                </html>
                
                
               
              
             
            