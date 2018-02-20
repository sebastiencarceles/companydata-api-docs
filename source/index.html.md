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
  - resources
  - errors

search: true
---

# Introduction

[Companydata.co](https://www.companydata.co) is a platform to get all the data you need about companies. Check it out.

The following documentation shows how to use the API to enrich your system with company data.

We have language bindings in Shell (with `cURL`), Ruby and Python3 and Javascript (with Node.js)! You can view code examples in the dark area to the right, and you can switch the programming language of the examples with the tabs in the top right.

# Authentication

> To authorize, use this code:

```ruby
require "net/http"
require "uri"
require "json"

uri = URI.parse("any_endpoint_here")
http = Net::HTTP.new(uri.host, uri.port)
request = Net::HTTP::Get.new(uri.request_uri)
request.basic_auth("your.email@domain.com", "your_api_key")
http.use_ssl = true
response = http.request(request)
```

```python
import requests # with Python3

response = requests.get('any_endpoint_here', auth=('your.email@domain.com', 'your_api_key'))
```

```shell
# With shell, you can just pass the correct header with each request
curl -u your.email@domain.com:your_api_key "any_endpoint_here"
```

```javascript
const request = require("request"); // npm install request

var username = 'your.email@domain.com',
    password = 'your_api_key',
    url = 'https://' + username + ':' + password + '@any_endpoint_here';
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
require "net/http"
require "uri"
require "json"

uri = URI.parse("https://www.companydata.co/api/v1/companies?q=company")
http = Net::HTTP.new(uri.host, uri.port)
request = Net::HTTP::Get.new(uri.request_uri)
request.basic_auth("your.email@domain.com", "your_api_key")
http.use_ssl = true
response = http.request(request)

puts response.code # should be 200
puts JSON.parse(response.body) # parsed results: array of hash

# Pagination info:
puts response["X-Pagination-Limit-Value"]
puts response["X-Pagination-Total-Pages"]
puts response["X-Pagination-Current-Page"]
puts response["X-Pagination-Next-Page"]
puts response["X-Pagination-Prev-Page"]
puts response["X-Pagination-First-Page"]
puts response["X-Pagination-Last-Page"]
puts response["X-Pagination-Out-Of-Range"]
```

```python
import requests # with Python3

response = requests.get('https://www.companydata.co/api/v1/companies?q=company&page=2&per_page=5', auth=('your.email@domain.com', 'your_api_key'))
print(response.status_code) # should be 200
print(response.json()) # parsed results: array of hash

# Pagination info:
print(response.headers['X-Pagination-Limit-Value'])
print(response.headers['X-Pagination-Total-Pages'])
print(response.headers['X-Pagination-Current-Page'])
print(response.headers['X-Pagination-Next-Page'])
print(response.headers['X-Pagination-Prev-Page'])
print(response.headers['X-Pagination-First-Page'])
print(response.headers['X-Pagination-Last-Page'])
print(response.headers['X-Pagination-Out-Of-Range'])
```

```shell
curl -u your.email@domain.com:your_api_key "https://www.companydata.co/api/v1/companies?q=company"
```

```javascript
const request = require("request"); // npm install request

var username = 'your.email@domain.com',
    password = 'your_api_key',
    url = 'https://' + username + ':' + password + '@www.companydata.co/api/v1/companies?q=company&page=2&per_page=5';

request({url: url}, function (error, response, body) {
  console.log(response.statusCode); // should be 200
  console.log(JSON.parse(body)); // parsed results: array of hash

  // Pagination infos:
  console.log(response.headers['x-pagination-limit-value']);
  console.log(response.headers['x-pagination-total-pages']);
  console.log(response.headers['x-pagination-current-page']);
  console.log(response.headers['x-pagination-next-page']);
  console.log(response.headers['x-pagination-prev-page']);
  console.log(response.headers['x-pagination-first-page']);
  console.log(response.headers['x-pagination-last-page']);
  console.log(response.headers['x-pagination-out-of-range']);
});
```

> Replace `company` by any company name or partial company name you would like to search for.
> You will receive an array of hash, each hash representing a `Company`.

This endpoint retrieves companies.

### HTTP Request

`GET https://www.companydata.co/api/v1/companies?q=<COMPANY_NAME>`

This endpoint is paginated and requires authentication.

### Query Parameters

Parameter | Default | Optional | Description
--------- | ------- | -------- | -----------
q | none | No | The search term
page | 1 | Yes | The wanted page
per_page | 10 | Yes | The items count per page

### Response

A list of items of kind [Company](#resources).

## Get a specific company

```ruby
require "net/http"
require "uri"
require "json"

uri = URI.parse("https://www.companydata.co/api/v1/companies/identifier")
http = Net::HTTP.new(uri.host, uri.port)
request = Net::HTTP::Get.new(uri.request_uri)
request.basic_auth("your.email@domain.com", "your_api_key")
http.use_ssl = true
response = http.request(request)

puts response.code # should be 200
puts JSON.parse(response.body) # parsed result: hash
```

```python
import requests # with Python3

response = requests.get('https://www.companydata.co/api/v1/companies/identifier', auth=('your.email@domain.com', 'your_api_key'))
print(response.status_code) # should be 200
print(response.json()) # parsed results: array of hash
```

```shell
curl -u your.email@domain.com:your_api_key "https://www.companydata.co/api/v1/companies/identifier"

```

```javascript
var username = 'your.email@domain.com',
    password = 'your_api_key',
    url = 'https://' + username + ':' + password + '@www.companydata.co/api/v1/companies/identifier';

request({url: url}, function (error, response, body) {
  console.log(response.statusCode); // should be 200
  console.log(JSON.parse(body)); // parsed results: hash
});
```

> Replace `identifier` with any known identifier.
> You will receive a hash representing a `Company`.

This endpoint retrieves a specific company.

### HTTP Request

`GET https://www.companydata.co/api/v1/companies/<IDENTIFIER>`

This endpoint requires authentication.

### URL Parameters

Parameter | Optional | Description
--------- | -------- | -----------
IDENTIFIER | No | The ID of the company to retreive. It can be an integer id, a `slug`, a `name` or a `smooth name`. Note that only the integer id and the `slug` are actually unique.

### Response

An item of kind [Company](#company).

# Autocomplete

```ruby
require "net/http"
require "uri"
require "json"

uri = URI.parse("https://www.companydata.co/api/v1/companies/autocomplete?q=company")
http = Net::HTTP.new(uri.host, uri.port)
request = Net::HTTP::Get.new(uri.request_uri)
http.use_ssl = true
response = http.request(request)

puts response.code # should be 200
puts JSON.parse(response.body) # parsed results: array of hash
```

```python
import requests # with Python3

response = requests.get('https://www.companydata.co/api/v1/companies/autocomplete?q=company')
print(response.status_code) # should be 200
print(response.json()) # parsed results: array of hash
```

```shell
curl "https://www.companydata.co/api/v1/companies/autocomplete?q=company"
```

```javascript
const request = require("request"); // npm install request

request({url: 'https://www.companydata.co/api/v1/companies/autocomplete?q=company'}, function (error, response, body) {
  console.log(response.statusCode); // should be 200
  console.log(JSON.parse(body)); // parsed results: hash
});
```

> Replace `company` by any company name or partial company name you would like to search for.
> You will receive an array of hash, each hash representing a `LightCompany`.

A subpart of the API can be used **without authentication** to autocomplete API names, for example to create an autocomplete input field:

![autocomplete](images/autocomplete.gif)

### HTTP Request

`GET https://www.companydata.co/api/v1/companies/autocomplete?q=<COMPANY_NAME>`

This endpoint is not paginated and returns 10 items. It does not require authentication.

### Query Parameters

Parameter | Default | Optional | Description
--------- | ------- | -------- | -----------
q | none | No | The search term

### Response

A list of items of kind [LightCompany](#lightcompany).


