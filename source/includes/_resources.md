# Resources

A company has several representations, depending on the context:

- When you need to autocomplete a company name, you receive a [`LightCompany`](#lightcompany), which contains only a few fields
- When you perform a search, you receive a collection of [`Company`](#company), which contains the most important fields of a company
- When you fetch a given company, you get a [`FullCompany`](#fullcompany), containing all the data we have about the company

The `FullCompany` also comes with items of kind `FinancialYear`, giving more detailled data about the financial activity of the company.

## Company

> A company is serialized like this:

```json
{
    "id": 1689102,
    "name": "ANALYSE IMAGE INTELLI ARTIFIC",
    "slug": "analyse-image-intelli-artific",
    "legal_form": "SAS, société par actions simplifiée",
    "staff": "20 à 49 salariés",
    "presentation": "Recherche, developpement systeme reconnaissance image par moyens informatiques",
    "logo_url": "https://companydata.s3.eu-west-2.amazonaws.com/BkOJRrnBf.jpg%3Foh%3D25d02c0a7ebf0df13406460cd37683a3%26oe%3D5B247D36",
    "activity": "Activités de pré-presse",
    "address": "ANALYSE IMAGE INTELLI ARTIFIC, 37 AU 39, 37 RUE DE LA BIENFAISANCE, 75008 PARIS 8",
    "founded_at": "1991-08-01",
    "country": "France",
    "quality": "headquarter",
    "smooth_name": "Analyse Image Intelli Artific",
    "headquarter_id": 1745669,
    "branch_ids": [123456789],
}
```

A `Company` has the following fields:

Field | Type | Optional | Description
----- | ---- | -------- | -----------
id | integer | No | Unique ID
name | string | No | Legal name
slug | string | No | Unique name (generated)
smooth_name | string | No | Smooth name (generated)
legal_form | string | Yes | Legal form
staff | string | Yes | Estimation of the employees count range
specialities | string | Yes | Specialities
presentation | string | Yes | Presentation
logo_url | string | Yes | URL of the logo
activity | string | Yes | Activity
address | string | Yes | Address (address components joined with a coma)
founded_at | string | Yes | Date of creation
country | string | Yes | Country
quality | string | Yes | "headquarter" or "branch"
headquarter_id | integer | Yes | Unique ID of the headquarter if the company is a branch, or null if it is already a headquarter
branch_ids | array | No | Array containing the unique IDs of the branches if the company is a headquarter, or the other branches if the company is a branch

## FullCompany

> A full company is serialized like this:

```json
{
    "id": 1689102,
    "name": "ANALYSE IMAGE INTELLI ARTIFIC",
    "slug": "analyse-image-intelli-artific",
    "legal_form": "SAS, société par actions simplifiée",
    "staff": "20 à 49 salariés",
    "presentation": "Recherche, developpement systeme reconnaissance image par moyens informatiques",
    "logo_url": "https://companydata.s3.eu-west-2.amazonaws.com/BkOJRrnBf.jpg%3Foh%3D25d02c0a7ebf0df13406460cd37683a3%26oe%3D5B247D36",
    "activity": "Activités de pré-presse",
    "address": "ANALYSE IMAGE INTELLI ARTIFIC, 37 AU 39, 37 RUE DE LA BIENFAISANCE, 75008 PARIS 8",
    "founded_at": "1991-08-01",
    "country": "France",
    "quality": "headquarter",
    "smooth_name": "Analyse Image Intelli Artific",
    "headquarter_id": 1745669,
    "branch_ids": [123456789],
    "source_url": "https://www.data.gouv.fr/fr/datasets/base-sirene-des-entreprises-et-de-leurs-etablissements-siren-siret",
    "registration_1": "382789154",
    "registration_2": "00053",
    "activity_code": "1813Z",
    "address_line_1": "ANALYSE IMAGE INTELLI ARTIFIC",
    "address_line_2": "",
    "address_line_3": "37 AU 39",
    "address_line_4": "37 RUE DE LA BIENFAISANCE",
    "address_line_5": "",
    "cedex": "",
    "zipcode": "75008",
    "city": "PARIS 8",
    "department_code": "75",
    "department": "Paris",
    "region": "Île-de-France",
    "geolocation": "48.876498,2.314889",
    "revenue": "8308219",
    "vat_number": "FR91382789154",
    "prefix": "Mr",
    "first_name": "Alain",
    "last_name": "Thierry",
    "email": "marketing@a2ia.com",
    "phone": "+33 1 44 42 00 80",
    "website": "https://www.a2ia.com",
    "facebook": "https://facebook.com/A2iASoftware",
    "linkedin": "http://www.linkedin.com/company/a2ia",
    "twitter": "https://www.twitter.com/a2ia",
    "crunchbase": "https://crunchbase.com/organization/a2ia",
    "financial_years": [
        {
            "year": "2016",
            "currency": "€",
            "revenue": 8308219,
            "income": 2096451,
            "staff": 51,
            "duration": 12,
            "closing_date": "2016-12-31"
        },
        {
            "year": "2015",
            "currency": "€",
            "revenue": 8812526,
            "income": 3043311,
            "staff": 50,
            "duration": 12,
            "closing_date": "2015-12-31"
        },
        {
            "year": "2014",
            "currency": "€",
            "revenue": 6873829,
            "income": 1468080,
            "staff": null,
            "duration": 12,
            "closing_date": "2014-12-31"
        },
        {
            "year": "2013",
            "currency": "€",
            "revenue": 5848519,
            "income": 1525080,
            "staff": null,
            "duration": 12,
            "closing_date": "2013-12-31"
        }
    ]
}

```

A `FullCompany` has the following fields:

Field | Type | Optional | Description
----- | ---- | -------- | -----------
id | integer | No | Unique ID
name | string | No | Legal name
smooth_name | string | No | Smooth name (generated)
slug | string | No | Unique name (generated)
source_url | string | Yes | Main data source
legal_form | string | Yes | Legal form
staff | string | Yes | Estimation of the employees count range
specialities | string | Yes | Specialities
presentation | string | Yes | Presentation
logo_url | string | Yes | URL of the logo
registration_1 | string | Yes | First registration number (in France: SIREN)
registration_2 | string | Yes | Second registration number (in France: NIC)
vat_number | string | Yes | VAT number (verified with https://ec.europa.eu)
activity | string | Yes | Activity
activity_code | string | Yes | Activity code (in France: APE)
address | string | Yes | Address (address components joined with a coma)
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
prefix | string | Yes | Prefix of the contact
first_name | string | Yes | First name of the contact
last_name | string | Yes | Last name of the contact
phone | string | Yes | Phone number of the contact
email | string | Yes | Email address of the contact
headquarter_id | integer | Yes | Unique ID of the headquarter if the company is a branch, or null if it is already a headquarter
branch_ids | array | No | Array of the unique IDs of the branches if the company is a headquarter, or the other branches if the company is a branch
website | string | Yes | Main website URL
facebook | string | Yes | Facebook page
twitter | string | Yes | Twitter page
linkedin | string | Yes | LinkedIn page
crunchbase | string | Yes | Crunchbase page
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

## LightCompany

> A light company is serialized like this:

```json
{
    "id": 3690840,
    "smooth_name": "Sarl Mollat",
    "name": "SARL MOLLAT",
    "city": "PLEAUX",
    "country": "France",
    "website_url": "https://www.companydata.co/companies/sarl-mollat",
    "api_url": "https://www.companydata.co/api/v1/companies/sarl-mollat"
}
```

A `LightCompany` has the following fields:

Field | Type | Optional | Description
----- | ---- | -------- | -----------
id | integer | No | Unique ID
smooth_name | string | No | Smooth name (generated)
name | string | No | Legal name
city | string | Yes | City
country | string | Yes | Country
website_url | string | Yes | URL to see the company details on the website
api_url | string | Yes | URL to use to access company details through the API
