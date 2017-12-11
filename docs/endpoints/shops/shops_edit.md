
## POST /shops/:id

Edit a Shop matching the id if and only if the shop has not been claimed before.

### Resource URL
_https://ws.horaires-commerces.fr/rest/v3/shops/:id_

### Resource Information
Response formats | JSON
Requires authentication? | Yes

### Parameters
| Name | Required | Description | Example |
|---|---|---|---|
| id | Yes | ID of the Shop | 123 |
| access_token  | Yes | Access token of the client |  |
| name  | No | Name of the shop |  |
| address  | No | Address of the shop |  |
| address2  | No | Completion of the shop |  |
| zipcode  | No | Zipcode of the city |  |
| city  | No | City |  |
| phone  | No | Phone number of the shop | +33 3 21 23 45 67 |
| internet  | No | Website, starting by http:// or https:// | https://website.tld |
| category  | No | ID of Category |  |
| hours  | No | Array with the hours | [1 => [['09:00', '12:00'], ['14:00', '19:00']], 2 => [], 3 => [], 4 => [], 5 => [], 6 => [], 7 => []] |
| networks  | No | Array with the networks | ['facebook' => null|string, 'twitter' => null|string, 'googleplus' => null|string] |

### Opening Hours
The hours is an array. The key is the day of the week in Europe. Sunday is number 7.
You cannot modify a single day. You have to specify all the opening hours of a week even if only Tuesday has changed.

#### Array of opening hours
Example for 09:00-12:00, 14:00-19:00 from Monday to Thursday, 09:00-12:00,14:00-21:00 on Friday and 09:00-19:00 on Saturday.
[
    1 => [
        ['09:00', '12:00'],
        ['14:00', '19:00']
    ],
    2 => [
        ['09:00', '12:00'],
        ['14:00', '19:00']
    ],
    3 => [
        ['09:00', '12:00'],
        ['14:00', '19:00']
    ],
    4 => [
        ['09:00', '12:00'],
        ['14:00', '19:00']
    ],
    5 => [
        ['09:00', '12:00'],
        ['14:00', '21:00']
    ],
    6 => [
        ['09:00', '19:00']
    ],
    7 => []
]

### Example Request
_POST https://ws.horaires-commerces.fr/rest/v3/shops/123 --data "access_token=ACCESS_TOKEN&name=new+name"_

### Example Response
```
{"id":"123","name":"Commerce exemple","mall_id":null,"internet":"","facebook":null,"twitter":null,"phone":"+33 3 12 34 56","rdv_only":"non","h24_open":"non","statut":"ouvert","noindex":"0","id_redirection":null,"meta_title":null,"meta_description":null,"departement":{"number":"50","name":"MANCHE"},"url":"https:\/\/www.horaires-commerces.fr\/50,manche\/barneville-carteret\/123-commerce-example","category":{"id":"50","name":"Camping","slug":"camping"},"location":{"address":"2 rue Guillaume le Conqu\u00e9rant","address2":"","city":{"name":"BARNEVILLE CARTERET","zipcode":"50270"},"departement":{"number":"50","name":"MANCHE","url":"50,manche"},"coordinates":{"latitude":null,"longitude":null}},"coordinates":{"latitude":null,"longitude":null}}
```

### Response
The response is the same as the GET /shops/:id method.
