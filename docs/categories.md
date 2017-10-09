# Categories

## GET /categories

Returns the list of categories available on the website.

### Resource URL
_https://ws.horaires-commerces.fr/rest/v3/categories_

### Resource Information
Response formats | JSON
Requires authentication? | Yes

### Parameters
| Name | Required | Description |
|---|---|---|
| access_token  | Yes | Access token of the client |

### Example Request
_GET https://ws.horaires-commerces.fr/rest/v3/categories?access_token=ACCESS_TOKEN_

### Example Response
```
[{"id":"188","name":"Alimentation","subcategories":[{"id":"5","name":"Restaurant"}, ...]}, ...]
```
