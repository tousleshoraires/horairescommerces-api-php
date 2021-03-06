# Shops

## GET /shops/:id

Returns a Shop matching the id if and only if the client has the right to access it.

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

### Example Request
_GET https://ws.horaires-commerces.fr/rest/v3/shops/123?access_token=ACCESS_TOKEN&s=SEARCH_TERM_

### Example Response
```
{"id":"123","name":"Commerce exemple","mall_id":null,"internet":"","facebook":null,"twitter":null,"phone":"+33 3 12 34 56","rdv_only":"non","h24_open":"non","statut":"ouvert","noindex":"0","id_redirection":null,"meta_title":null,"meta_description":null,"departement":{"number":"50","name":"MANCHE"},"url":"https:\/\/www.horaires-commerces.fr\/50,manche\/barneville-carteret\/123-commerce-example","category":{"id":"50","name":"Camping","slug":"camping"},"location":{"address":"2 rue Guillaume le Conqu\u00e9rant","address2":"","city":{"name":"BARNEVILLE CARTERET","zipcode":"50270"},"departement":{"number":"50","name":"MANCHE","url":"50,manche"},"coordinates":{"latitude":null,"longitude":null}},"coordinates":{"latitude":null,"longitude":null}}
```

### Response
The networks node is empty if there no known social networks for the shop.

- id
- name
- url
- phone
- id_redirection: if not null, this shop will redirect to this ID
- internet
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
- group: (optional)
    - id
    - name
    - slug : slug parameter to be transmitted for new shops
    - nb_shops
- networks:
    - facebook: facebook page
    - twitter: twitter account
    - googleplus: google+ page
    - instagram: instagram page
    - pinterest: pinterest page
