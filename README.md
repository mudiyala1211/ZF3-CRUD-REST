# ZF3-CRUD-Api-Rest

Simple user CRUD Rest API with Zend Framework 3 and MySQL DB

## DB Schema File

```
	data/schema.sql
```

## Executing Rest APIs using CURL

```
User List
	$ curl -v -X GET http://127.0.0.1:8080/api/user

Adding User
	$ curl -d "username=reyan&fullname=Reyansh Beemineni&email=reyan@gmail.com&phoneno=9448985881&address=Sai Smaran Apartment, Bangalore" -v -X POST http://127.0.0.1:8080/api/user

User Details
	$ curl -v -X GET http://127.0.0.1:8080/api/user/1

Update User
	$ curl -d "username=reyansh&fullname=Reyansh Beemineni&email=reyan@gmail.com&phoneno=9448985881&address=Sai Smaran Apartment, Bangalore" -v -X PUT http://127.0.0.1:8080/api/user/4

Delete User
	$ curl -v -X DELETE http://127.0.0.1:8080/api/user/4
```
