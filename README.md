


                      TASK DESCRIPTION 
Basic Laravel Auth: ability to log in as administrator

Use database seeds to create first user with email admin@admin.com and password “password”

CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.

Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website

Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone

Use database migrations to create those schemas above

Store companies logos in storage/app/public folder and make them accessible from public

Use basic Laravel resource controllers with default methods – index, create, store etc.

Use Laravel’s validation function, using Request classes

Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page

Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register	
						
API with authentication (user listing with company details after logged in)	



  APi Documenaion 

  Login Url => http://127.0.0.1:8000/api/login
  -->With Valid email and password make authentication and create a token 
  
  After Successfull Login
  
  {
    "message": "Authenticated User",
    "token": "3|qUyU46ltzVzzLq86vUz49QauJS9NAIfWmGwC8dS8abcd65db"
  }
  
Employee Details with company information  Url => http://127.0.0.1:8000/api/users

-->Successfull authentication with token can access employee infirmation

{
        "id": 1,
        "first_name": "sdsa",
        "last_name": "fsdfsd",
        "company_id": 6,
        "email": "hareeshr@am.amrita.edu",
        "phone": "94968284032",
        "created_at": "2023-10-18T11:20:28.000000Z",
        "updated_at": "2023-10-18T11:20:28.000000Z",
        "company": {
            "id": 6,
            "name": "Hareesh",
            "email": "hareeshr@am.amrita.edu",
            "logo": "logos/DfH9lyOcjoO7pRRhc8Nqf0J1tFBRABwApJJLr8Bl.jpg",
            "website": null,
            "created_at": "2023-10-18T10:21:55.000000Z",
            "updated_at": "2023-10-18T10:21:55.000000Z"
        }
    },
    
    
  curl --location --request GET 'http://127.0.0.1:8000/api/users' \
--header 'Authorization: Bearer 3|qUyU46ltzVzzLq86vUz49QauJS9NAIfWmGwC8dS8abcd65db' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6IkpiVkJWZmk4eWh4N0ppL042WHE2WGc9PSIsInZhbHVlIjoiTm96bDN0TWpEUFpaSU1SOS9mZVRqZ1lRWEFRZUpmdVNCQTdrcmQ2REFoWm53a3B6M0RVQzRyUnlRYk5RVk1JRzFtR2VUWDMrQXcxVWowQVhLWFJxaUNFMGMzMUFzakp4NDlnUnBXZ3preFV4c2taYmRYTjBrQnVMVzA3T29CUkwiLCJtYWMiOiJjNjdkODhkZGM1NjFlZDk3ZDE4OTIxZWEzNmMxOTg0NDRmZjMxMTc3MzhiN2Y5MDM3MTY3ZWIxMWFkM2I0OWZjIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkQ0ZGpBM1BIOFJnRysyODV1a1NCNkE9PSIsInZhbHVlIjoiTzBjbmI4NzJvWXZzUHdEWk80OGRYdHpORFRrbk5Rd0R1SEQvZTdybXNtYW5RKzZ2V04yOGpyelhBYXJWR0RQb2tsWitEeXJ1RHVrWFNGbk1xT0VKVUdFd1lzQVZ5aVM5RHRCYms0bE5ZUVlSVzhIMk15RUNXZTlJcHlKbU5xUlAiLCJtYWMiOiIwZGE4MGFkOGI3NjU4N2Q2YjlhODZhYzYxMzQyNjQyNDcwNTllOTM4YjBmNWRjYzUyNTFmOGUwZGE4ODUzYjFjIiwidGFnIjoiIn0%3D' \
--form 'email="admin@admin.com"' \
--form 'password="password"'
    
    
    
    
