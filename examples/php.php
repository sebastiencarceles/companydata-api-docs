<?php

// Companies

$ch = curl_init('https://www.companydata.co/api/v1/companies?q=mollat&page=2&per_page=5');
curl_setopt($ch, CURLOPT_USERPWD, "your_api_key:");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);

$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
curl_close($ch);

$headers = substr($response, 0, $header_size);
$body = substr($response, $header_size);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

print($http_status . "\n"); // should be 200
print_r(json_decode($body)); // parsed results: array of hash

// Pagination info:

foreach (explode("\r\n", $headers) as $hdr) {
  print($hdr . "\n");
  /* Prints all the headers, including:
  * X-Pagination-Limit-Value
  * X-Pagination-Total-Pages
  * X-Pagination-Current-Page
  * X-Pagination-Next-Page
  * X-Pagination-Prev-Page
  * X-Pagination-First-Page
  * X-Pagination-Last-Page
  * X-Pagination-Out-Of-Range
  */
}

// Company

$ch = curl_init('https://www.companydata.co/api/v1/companies/sarl-mollat');
curl_setopt($ch, CURLOPT_USERPWD, "your_api_key:");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

print($http_status . "\n"); // should be 200
print_r(json_decode($response)); // parsed results: hash

// Autocomplete

$ch = curl_init('https://www.companydata.co/api/v1/companies/autocomplete?q=mollat');
curl_setopt($ch, CURLOPT_USERPWD, "your_api_key:");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

print($http_status . "\n"); // should be 200
print_r(json_decode($response)); // parsed results: array of hash

?>

