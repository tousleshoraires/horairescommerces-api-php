# Search

## GET /search

Returns a collection of Shops and Groups matching a specific search term.

### Resource URL
_https://ws.horaires-commerces.fr/rest/v3/search_

### Resource Information
Response formats | JSON
Requires authentication? | Yes

### Parameters
| Name | Required | Description |
|---|---|---|
| access_token  | Yes | Access token of the client |
| s  | Yes | Term for the search |
| count  | Optional | The number of elements to return |

### Example Request
_GET https://ws.horaires-commerces.fr/rest/v3/search?access_token=ACCESS_TOKEN&s=SEARCH_TERM_

### Example Response
```
{"shops":{"total":"354","list":[{"id":"245199","name":"BUT Orgeval","address":"1170 Route des Quarante Sous RN13-Les Glaisi\u00e8res","address2":null,"city":{"name":"ORGEVAL","zipcode":"78630"},"phone":"+33 8 26 25 25 25","departement":{"number":"78","name":"YVELINES"},"url":"https:\/\/www.horaires-commerces.fr\/78,yvelines\/orgeval\/245199-but-orgeval","coordinates":{"latitude":"48.9274700","longitude":"1.9847400"},"category":{"id":"98","name":"Ameublement"}},...]},"groups":{"list":[{"id":"126","name":"BUT","logo":"photos\/groupe\/but.jpg","nb_shops":"354"}]}}
```
