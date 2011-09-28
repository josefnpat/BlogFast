This is a serialized blog for all you breakfast people.

The blog is designed to be loaded up via command line (`php -a`)

Performing a "simple":
`$data = unserialize(file_get_contents('data.php'));`
modufy the object on the fly, and then
`file_put_contents('data.php',serialize($data));`
and push the data to the server, and you're all set!

This blog is meant for people who:
* Don't want a database
* Are good with the php cli and php
* Most likely are crazy.
