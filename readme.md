# Personal Finance app
# smartCoin

## to do front-end:
* design the next step window
* click on the next display the next step
* click on category button (hide the other categories, display the name and logo of the selected category)
- make each category a color
* make the add category window
* click on the add-category div take us to the add category window


* transaction history page

* statistics page

* settings page 

## to do backend:
- connect to the database
- login, signup, logout (create user session)
- add a category
- get the categories from the db
- add a transaction
- get the transactions from the database

## database

### users table
- id
- firstname
- lastname
- username
- email
- password

### category table
- id
- name
- type 
- logo
- color
- description

### transactions table
- id
- category-id
- account-id
- date
- amount
- description


### accounts table
- id
- user-id
- name
- balance
- currency

