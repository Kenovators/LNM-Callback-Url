# LNM-Callback-Url
Callback url sample for LNM implemented in android application.

The CallbackURL refers to a hosted script that will receive all transactions related to your application from the Mpesa servers. The script will then store records for successful transactions in a table which can provide you with search capabilities to find specific payments or more in-depth data about your product.

To host the script:
 1. Buy a hosting service/plan and domain..
 2. Create a subdomain(optional)
 3. Host the script in the subdomain or public directory
 4. Create a MySQL database and add a user with all permissions
 5. Open the hosted script and change the following:
 - server (Usually 'localhost')
 - dbUser (User with permissions to the database)
 - dbPassword (Password of the user)
 - dbName (Name of the created database)
 
For a quickstart on implementing LNM in android, refer to https://github.com/Kenovators/LNM-Tutorial

## Test Purposes
What if you don't have a hosting plan and are just testing? 
Don't worry, use the default CallbackURL provided by Safaricom.
If you would like to get your own request-bin to test out the CallbackURL go to http://mpesa-requestbin.herokuapp.com and select Create RequestBin. Copy the URL in the Bin URL textbox and use it as your CallbackURL.
