# Resources

> A company is serialized like this:

```json
{
  "id": 3690840,
  "name": "SARL MOLLAT",
  "slug":"sarl-mollat",
  "source_url": "https://www.data.gouv.fr/fr/datasets/base-sirene-des-entreprises-et-de-leurs-etablissements-siren-siret",
  "headquarter_in": "Pleaux",
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
  "geolocation": "45.1496754, 2.1292462",
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
    }
    # Eventually more financial years here
  ]
}
```

A `Company` has the following fields:

Field | Type | Optional | Description
----- | ---- | -------- | -----------
id | integer | No | Unique ID
name | string | No | Legal name
slug | string | No | Unique name (generated)
smooth_name | string | No | Smooth name (generated)
source_url | string | Yes | Main data source
headquarter_in | string | Yes | City where the headquarter is located
legal_form | string | Yes | Legal form
staff | string | Yes | Estimation of the employees count range
specialities | string | Yes | Specialities
presentation | string | Yes | Presentation
logo_url | string | Yes | URL of the logo
registration_1 | string | Yes | First registration number (in France: SIREN)
registration_2 | string | Yes | Second registration number (in France: NIC)
activity_code | string | Yes | Activity code (in France: APE)
activity | string | Yes | Activity
address_line_1 | string | Yes | Address first line
address_line_2 | string | Yes | Address second line
address_line_3 | string | Yes | Address third line
address_line_4 | string | Yes | Address fourth line
address_line_5 | string | Yes | Address fifth line
cedex | string | Yes | Special zipcode
zipcode | string | Yes | Zipcode
city | string | Yes | City
department_code | string | Yes | Department code
department | string | Yes | Department
region | string | Yes | Region
founded_at | string | Yes | Date of creation
geolocation | string | Yes | latitude, longitude
country | string | Yes | Country
quality | string | Yes | "headquarter" or "branch"
revenue | string | Yes | Estimation of the revenue
financial_years | array | Yes | Items of kind `Financial year`

A `Financial year` represents a year (more or less) of activity for a `Company`. It has the following fields:

Field | Type | Optional | Description
----- | ---- | -------- | -----------
year | string | Yes | Year of reference
currency | string | No | Currency
revenue | integer | No | Revenue
income | integer | No | Income
staff | integer | No | Staff
duration | integer | No | Duration in months
closing_date | string | No | Closing date
