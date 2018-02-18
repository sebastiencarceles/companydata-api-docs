require "net/http"
require "uri"
require "json"

uri = URI.parse("https://www.companydata.co/api/v1/companies?q=mollat&page=2&per_page=5")
http = Net::HTTP.new(uri.host, uri.port)
request = Net::HTTP::Get.new(uri.request_uri)
request.basic_auth("your.domain@doamin.com", "your_api_key")
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

uri = URI.parse("https://www.companydata.co/api/v1/companies/sarl-mollat")
http = Net::HTTP.new(uri.host, uri.port)
request = Net::HTTP::Get.new(uri.request_uri)
request.basic_auth("your.domain@doamin.com", "your_api_key")
http.use_ssl = true
response = http.request(request)

puts response.code # should be 200
puts JSON.parse(response.body) # parsed result: hash

