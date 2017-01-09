<?php
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
 $watson->set_credentials("29417e54-78c7-41a3-a15a-4bd415abad5e", "ilaLlwikzB2v");


 // define variables and set to empty values
 $textLID = "";
 $textLIDErr = "";
 $textLang = "";
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    if (empty($_POST["textLID"])) {
      $textLIDErr = "Text is required (at least 3 words)";
    } else {
      $textLID = test_input($_POST["textLID"]);

      $textLang = $watson->send_watson_conv_request($textLID, "4cf813b0-d9a8-4dfa-81f9-1e348395a5a3");
	  
	  echo $textLang['output']['text'][0];


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
