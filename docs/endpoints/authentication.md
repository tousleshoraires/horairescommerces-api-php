# Authentication Model for TLH API

## POST /oauth/request_token

Returns a temporary request token for the authentication.

### Resource URL
_https://ws.horaires-commerces.fr/rest/v3/oauth/request_token_

### Resource Information
Response formats | JSON
Requires authentication? | No

### Parameters
| Name | Required | Description |
|---|---|---|
| client_id  | Yes | ID of the client |

### Example Request
_POST https://ws.horaires-commerces.fr/rest/v3/oauth/request_token?client_id=CLIENT_ID_

### Example Response
```
{"code":"REQUEST_TOKEN"}
```

## POST /oauth/access_token

Returns an access token for the authentication.

### Resource URL
_https://ws.horaires-commerces.fr/rest/v3/oauth/access_token_

### Resource Information
Response formats | JSON
Requires authentication? | No

### Parameters
| Name | Required | Description |
|---|---|---|
| code  | Yes | Code obtain during the request token |

### Example Request
_POST https://ws.horaires-commerces.fr/rest/v3/oauth/access_token?code=REQUEST_TOKEN_

### Example Response
```
{"access_token":"ACCESS_TOKEN","expires_in":"EXPIRATION_TIME","token_type":"Bearer","scope":null}
```
