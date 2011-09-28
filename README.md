This is a serialized blog for all you breakfast people.

The blog is designed to be loaded up via command line (`php -a`)

Performing a "simple":  
`$data = unserialize(file_get_contents('data.php'));`  
modify the object on the fly, and then  
`file_put_contents('data.php',serialize($data));`  
and you're all set!

This blog is meant for people who:

* don't want a database.
* are good with the php cli and php.
* *are most likely are crazy.*
