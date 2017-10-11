# Search

## GET /search

Returns a collection of Shops and Groups matching a specific search term.

### Resource URL
_https://ws.horaires-commerces.fr/rest/v3/search_

### Resource Information
Response formats | JSON
Requires authentication? | Yes

The phone number and the search term are exclusive. Either of them is mandatory. The term has priority on the phone number,
meaning that if you are filling both variables, it will search only on the search term.
The country is not exclusive.
For coordinates search, the radius is set to 1000 meters.

### Parameters
| Name | Required | Description | Example |
|---|---|---|---|
| access_token  | Yes | Access token of the client |  |
| s  | Yes | Term for the search | darty lille |
| count  | Optional | The number of elements to return, maximum 100 | 30 |
| phone  | Optional | The phone number of the desired shops | 0123456789 |
| country  | Optional | The iso code of the country to look into | fr |
| coordinates  | Optional | Array of coordinates of the desired shop | ['lat' => '48.6408416', 'lng' => '2.3259213'] |

### Example Request
_GET https://ws.horaires-commerces.fr/rest/v3/search?access_token=ACCESS_TOKEN&s=SEARCH_TERM_

### Example Response
```
{"shops":{"total":"354","list":[{"id":"245199","name":"BUT Orgeval","phone":"+33 8 26 25 25 25","departement":{"number":"78","name":"YVELINES"},"url":"https:\/\/www.horaires-commerces.fr\/78,yvelines\/orgeval\/245199-but-orgeval","category":{"id":"98","name":"Ameublement"},"location":{"address":"1170 Route des Quarante Sous RN13-Les Glaisi\u00e8res","address2":null,"city":{"name":"ORGEVAL","zipcode":"78630"},"departement":{"number":"78","name":"YVELINES","url":"78,yvelines","slug":"yvelines"},"coordinates":{"latitude":"48.9274700","longitude":"1.9847400"}},"coordinates":{"latitude":"48.9274700","longitude":"1.9847400"}},...]},"groups":{"list":[{"id":"126","name":"BUT","logo":"photos\/groupe\/but.jpg","nb_shops":"354"}]}}
```

### Response
| Name | Description | Example |
|---|---|---|
| shops  | Array of the response for Shops | ['total', 'list'] |
| groups  | Array of the response for Shops | ['total', 'list'] |

### Shop array for list key
- id
- name
- url
- phone
- location:
    - address
    - address2
    - city:
        - name
        - zipcode
    - departement:
        - number
        - name
        - url
    - coordinates:
        - latitude
        - longitude
- category:
    - id
    - name

### Group array for list key
- id
- name
- logo
- nb_shops
