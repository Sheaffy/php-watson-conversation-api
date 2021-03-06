<?php
session_start();
include 'watson-api/watson.php';

?>

 <!DOCTYPE html>
 <html>
 <head>
     <title>PHP Starter Application</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <link rel="stylesheet" href="style.css" />
 </head>
 <body>
 
 <?php



 $watson = new watson_api();
 $watson->set_credentials(YOUR_USERNAME, YOUR_PASSWORD);


 // define variables and set to empty values
 $textLID = "";
 $textLIDErr = "";
 $data_arr = "";
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    if (empty($_POST["textLID"])) {
      $textLIDErr = "Text is required (at least 3 words)";
    } else {
      $textLID = test_input($_POST["textLID"]);

      $data_arr = $watson->send_watson_conv_request($textLID, YOUR_WORKSPACE_ID);
	    $watson->set_context(json_encode($data_arr['context']));
      
      //OUTPUT DIALOG RESPONSE
      echo $data_arr['output']['text'][0];
      echo "<br><br>";
      //OUTUPUT WHOLE DATASET
      echo json_encode($data_arr);




    }
 }
 
 


 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
 ?>
 
     <table>
         <tr>
             <td style='width: 30%;'>
             </td>
             <td>
                 <h2>Watson Conversation</h2>
                 <p><span class="error"></span></p>
                 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                     <textarea name="textLID" rows="5" cols="40"><?php echo $textLID;?></textarea>
                       
                     <span class="error">* <?php echo $textLIDErr;?></span>
                       
  
                     <input type="submit" name="submit" value="Submit">
                 </form>
             </td>
         </tr>
     </table>
 </body>
 </html>
