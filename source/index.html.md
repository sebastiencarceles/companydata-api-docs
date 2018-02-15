---
title: Companydata.co - API Reference

language_tabs: # must be one of https://git.io/vQNgJ
  - shell
  - ruby
  - python
  - javascript

toc_footers:
  - <a href='https://www.companydata.co/' target='_blank'>Sign up for a developer key</a>
  - <a href='https://github.com/lord/slate' target='_blank'>Documentation powered by Slate</a>

includes:
  - company
  - financial_year
  - errors

search: true
---

# Introduction

[Companydata.co](https://www.companydata.co) is a platform to get all the data you need about companies. Check it out.

The following documentation shows how to use the API to enrich your system with company data.

We have language bindings in Shell (with `cURL`), Ruby and Python! You can view code examples in the dark area to the right, and you can switch the programming language of the examples with the tabs in the top right.

# Authentication

> To authorize, use this code:

```ruby

TODO
```

```python

TODO
```

```shell
# With shell, you can just pass the correct header with each request
curl -u your.email@domain.com:your_api_key "any_endpoint_here"
```

> Make sure to replace `your.email@domain.com` with the email you used to register and `your_api_key` with your API key.

Companydata.co API uses an API key to allow access to the API. You will find your API key on your [account page](https://www.companydata.co/users/edit), once registered.

This is a basic authentication, so Companydata.co API expects for your email and the API key to be included in all API requests to the server in a header that looks like the following:

`Authorization: Basic GdtYWlsLmNvbTo4SHA5dk44MWZrOXFuaURGWU=`

Where `GdtYWlsLmNvbTo4SHA5dk44MWZrOXFuaURGWU=` is the string `"your.email@domain.com:your_api_key"` encoded in base 64.

<aside class="notice">
You must replace <code>your.email@domain.com</code> with the email you used to register and <code>your_api_key</code> with your personal API key.
</aside>

# Pagination

For endpoints that use pagination, you can use the parameter `page` to get a given page (the first page is 1, not 0). Default is `1`.

You can also use the parameter `per_page` to tell how many items you want per page. Default is `10`.

Note that `page` and `per_page` are optional.

Pagination infos are returned in the response headers:

* `X-Pagination-Limit-Value`: number of items per page
* `X-Pagination-Total-Pages`: total pages count
* `X-Pagination-Current-Page`: current page
* `X-Pagination-Next-Page`: next page number, if any
* `X-Pagination-Prev-Page`: previous page number, if any
* `X-Pagination-First-Page`: `true` when it is the first page, `false` otherwise
* `X-Pagination-Last-Page`: `true` when it is the last page, `false` otherwise
* `X-Pagination-Out-Of-Range`: `true` when the requested page is out of range, `false` otherwise

# Companies

## Search for companies

```ruby
TODO
```

```python
TODO
```

```shell
curl -u your.email@domain.com:your_api_key "https://www.companydata.co/api/v1/companies?q=company"
```

```javascript
TODO
```

> Replace `company` by any company name or partial company name you would like to search for.

> The above command returns JSON structured like this:

```json
[
  {
    "id": 3690840,
    "name": "SARL MOLLAT",
    "slug":"sarl-mollat",
    "source_url": "https://www.data.gouv.fr/fr/datasets/base-sirene-des-entreprises-et-de-leurs-etablissements-siren-siret",
    "headquarter_in": "Paris",
    "founded_in": "2001",
    "legal_form": "Société à responsabilité limitée (sans autre indication)",
    "staff": "9-10 employees",
    "specialities": "Company specialities",
    "presentation": "Company short presentation",
    "logo_url": "http://logo.if/any.png",
    "registration_1": "438036931",
    "registration_2": "00014",
    "activity_code": "6820A",
    "activity": "Location de logements",
    "address_line_1": "45 Rue d'Empradel",
    "address_line_2": "",
    "address_line_3": "",
    "address_line_4": "",
    "address_line_5": "",
    "cedex": "",
    "zipcode": "15700",
    "city": "PLEAUX",
    "department_code": "15",
    "department": "Cantal",
    "region": "Auvergne-Rhône-Alpes",
    "founded_at": "2001-05-07",
    "geolocation": "45.1496754,2.1292462",
    "country": "France",
    "quality": "headquarter",
    "revenue": "De 5 millions à moins de 10 millions d'euros",
    "smooth_name": "Sarl Mollat",
    "financial_years": [
      {
        "year": "2015",
        "currency": "€",
        "revenue": 58758,
        "income": 56820,
        "staff": 10,
        "duration": 12,
        "closing_date": "2015-12-31",
      },
      {
        "year": "2014",
        "currency": "€",
        "revenue": 63146,
        "income": 11887,
        "staff": 9,
        "duration": 12,
        "closing_date": "2014-12-31",
      },
      {
        # Eventually more financial years here
      }
    ]
  },
  {
    # Another company
  },
  {
    # Yet another company
  }
]
```

This endpoint retrieves companies.

### HTTP Request

`GET https://www.companydata.co/api/v1/companies`

### Query Parameters

Parameter | Default | Optional | Description
--------- | ------- | -------- | -----------
q | none | No | The search term
page | 1 | Yes | The wanted page
per_page | 10 | Yes | The items count per page

### Response

A list of items of kind [Company](#company). A `Company` may contain a list of [Financial years](#financial-year).

## Get a Specific Kitten

```ruby
require 'kittn'

api = Kittn::APIClient.authorize!('meowmeowmeow')
api.kittens.get(2)
```

```python
import kittn

api = kittn.authorize('meowmeowmeow')
api.kittens.get(2)
```

```shell
curl "http://example.com/api/kittens/2"
  -H "Authorization: meowmeowmeow"
```

```javascript
const kittn = require('kittn');

let api = kittn.authorize('meowmeowmeow');
let max = api.kittens.get(2);
```

> The above command returns JSON structured like this:

```json
{
  "id": 2,
  "name": "Max",
  "breed": "unknown",
  "fluffiness": 5,
  "cuteness": 10
}
```

This endpoint retrieves a specific kitten.

<aside class="warning">Inside HTML code blocks like this one, you can't use Markdown, so use <code>&lt;code&gt;</code> blocks to denote code.</aside>

### HTTP Request

`GET http://example.com/kittens/<ID>`

### URL Parameters

Parameter | Description
--------- | -----------
ID | The ID of the kitten to retrieve

## Delete a Specific Kitten

```ruby
require 'kittn'

api = Kittn::APIClient.authorize!('meowmeowmeow')
api.kittens.delete(2)
```

```python
import kittn

api = kittn.authorize('meowmeowmeow')
api.kittens.delete(2)
```

```shell
curl "http://example.com/api/kittens/2"
  -X DELETE
  -H "Authorization: meowmeowmeow"
```

```javascript
const kittn = require('kittn');

let api = kittn.authorize('meowmeowmeow');
let max = api.kittens.delete(2);
```

> The above command returns JSON structured like this:

```json
{
  "id": 2,
  "deleted" : ":("
}
```

This endpoint deletes a specific kitten.

### HTTP Request

`DELETE http://example.com/kittens/<ID>`

### URL Parameters

Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete

