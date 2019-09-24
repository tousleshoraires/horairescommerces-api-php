# Authentication for TLH API

The endpoint is explained in the [Swagger documentation](https://ws.horaires-commerces.fr/api/doc#operations-tag-authentication).

Getting the token is easy thanks to a proper method : _authenticate()_.

It accepts no parameter as the path is alwars the same. It uses the credentials provided in the controller.

## Response

The response is an object TokenResponse. It has three properties :

* token: string of the token to use in the requests
* user: array containing the basic information of the user (id and username)
* expiresIn: number of seconds of validity of the token

## Example

```
<?php

require_once __DIR__.'/../vendor/autoload.php';

use TLH\HorairesCommercesApi\Client as ApiClient;

$clientId = 'myClientId';
$secretKey = 'thi$is$€cret';

$client = new ApiClient($clientId, $secretKey);

$request = $client->authenticate();

var_dump($request);
```
