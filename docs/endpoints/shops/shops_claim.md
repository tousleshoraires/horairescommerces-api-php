# Claiming a shop

## GET /shops/:id/claim

Claim a Shop matching the id if and only if the shop has not been claimed before.

### Resource URL
_https://ws.horaires-commerces.fr/rest/v3/shops/:id/claim_

### Resource Information
Response formats | JSON
Requires authentication? | Yes

### Parameters
| Name | Required | Description | Example |
|---|---|---|---|
| id | Yes | ID of the Shop | 123 |
| access_token  | Yes | Access token of the client |  |

### Example Request
_POST https://ws.horaires-commerces.fr/rest/v3/shops/123/claim --data "access_token=ACCESS_TOKEN"_

### Example Response
```
{"message":"done"}
```

### Possible message
| code | message | comment |
|---|---|---|
| 200 | done | you claimed the shop successfully |
| 200 | already | you alread have claimed that shop |
| 403 | not posible | the shop is already claimed |
| 404 | object not found | there is no shop for that ID |
