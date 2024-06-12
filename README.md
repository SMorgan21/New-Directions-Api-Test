## New Directions API Test

I've set up a simple API that will eventually allow users to hit an and endpoint to gain an access token which would then allow them
to hit another endpoint to get a list of all the users associated with their specific company.

I have set up sanctum for the authentication and have created a seeders to seed the tables with some dummy data.
I also set up policies to ensure that only the user that is associated with the company can access the applicants associated with that company.

I have not yet set up the front end, but, my plan was to use a simple log in form that would hit the login endpoint and then store the token in local storage.
I would then use the token to hit the users endpoint and display the users in a table with columns for County, DBS Check and Position applied for, implementing datatables.js to allow for better filtering of the data.
