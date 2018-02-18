import requests # with Python3

response = requests.get('https://www.companydata.co/api/v1/companies?q=mollat&page=2&per_page=5', auth=('your.email@domain.com', 'your_api_key'))
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

response = requests.get('https://www.companydata.co/api/v1/companies/sarl-mollat', auth=('your.email@domain.com', 'your_api_key'))
print(response.status_code) # should be 200
print(response.json()) # parsed results: array of hash