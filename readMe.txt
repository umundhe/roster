Greetings,

This is working prototype you can use to form any size of team with different salary cap and with different score limit.

1.You can control size of team by specifying rules in data you can provide in JSON in data folder.

2. 5 Different sample test data provided to test various condition.

3. You can run this using following URLs . In 2nd URL you can change name of the test and run it for other tests.
http://localhost/Roster/index.php
http://localhost/Roster/index.php?test=test1

4. All Error messages are maintained in config and can be easily changed without code changes.

5. Since its working prototype it has been file driven we can extend it to use any backend database for data.

6. Class diagram attached along with code.

7. PHP Relection used to generate documentation on the fly .  Link for documentation included on UI.

Installation Steps
- Copy Roster directory to document root of apache. No special libraries are required.
- Once copied you should be able to access the project using following end point by replacing localhost with virtual host
http://localhost/Roster/index.php








