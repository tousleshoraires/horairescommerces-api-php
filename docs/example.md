# Categories

```
<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/autoload.php';

use TLH\HorairesCommercesApi\Client as ApiClient;

$clientId = 'testclient';
$secretKey = 'secretkey';

$client = new ApiClient($clientId, $secretKey);

$request = $client->post('/oauth/request_token', ['client_id' => $clientId]);
// var_dump($request);
```
