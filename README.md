## php-watson-conversation-api #![php 5.4](https://img.shields.io/badge/php-5.4-blue.svg)

A helper to connect to the Watson conversation API through curl.
Currently in proccess of development.

## How to use
```php
<?php
include 'watson-api/watson.php';

$watson = new watson_api();
$watson->set_credentials(USERNAME, PASSWORD);

//Make Request 
$natural_text="Turn the lights on watson";
$workspace_id="32uue0s-ajke-fdsdf2343-223rf43-2dghhjy5";
// Be sure to use your own workspace id

$data_array = $watson->send_watson_conv_request($natural_text, $workspace_id);
print_r($data_array);
```
Once the request has been made, you will receive a array with the relevent information.
