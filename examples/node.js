// ----------- WITH REQUEST ----------- //

const request = require("request"); // npm install request

// Companies

var url = 'https://your_api_key:@www.companydata.co/api/v1/companies?q=mollat&page=2&per_page=5';

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

// Company

var url = 'https://your_api_key:@www.companydata.co/api/v1/companies/sarl-mollat';

request({url: url}, function (error, response, body) {
  console.log(response.statusCode); // should be 200
  console.log(JSON.parse(body)); // parsed results: hash
});

// Autocomplete

request({url: 'https://www.companydata.co/api/v1/companies/autocomplete?q=mollat'}, function (error, response, body) {
  console.log(response.statusCode); // should be 200
  console.log(JSON.parse(body)); // parsed results: array of hash
});


// ----------- WITH AXIOS ----------- //

const axios = require("axios"); // npm install axios

axios.get("https://www.companydata.co/api/v1/vats/FR58828022053", {
  auth: {
    username: "your_api_key",
    password: ""
  }
}).then(function (response) {
  console.log(response);
})
.catch(function (error) {
  console.log(error);
});
