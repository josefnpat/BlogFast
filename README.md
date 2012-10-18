A serialized blog for all you breakfast people.
===============================================

[<img width=200px src="http://i.imgur.com/sgG03.png" />](http://i.imgur.com/sgG03.png)

The blog is designed to be loaded up via command line (`php -a`)

Performing a "simple":  
`$data = unserialize(file_get_contents('db'));`  
modify the object on the fly, and then  
`file_put_contents('db',serialize($data));`  
and you're all set!

Example
-------
Here we change the blog name to "Butts' blog" and add a new post.

    $ php -a
    Interactive shell
    
    php > $data = unserialize(file_get_contents('db')); // Load
    php > $new_post = new stdClass();
    php > $new_post->title = "A very compelling blog post";
    php > $new_post->body = "A very well written and researched article.";
    php > $data->posts[time()] = $new_post; // The index is the time of the post.
    php > // The timestamp argument will still show these posts, regardless of server's time.
    php > $data->name = "Butts' blog";
    php > asort($data->posts); //Be sure to sort the posts by time!
    php > print_r($data); // What does it look like?
    stdClass Object
    (
        [name] => Butts' blog
        [tagline] => Your blog's tagline.
        [posts] => Array
            (
                [1317320468] => stdClass Object
                    (
                        [title] => A very compelling blog post
                        [body] => A very well written and researched article.
                    )
    
                [1359990213] => stdClass Object
                    (
                        [title] => This is a test
                        [body] => This won't show, unless you have the exact time!
                    )

                [1861941600] => stdClass Object
                    (
                        [title] => Come with me if you want to live. 
                        [body] => A T-800 is sent back in time to kill Sarah Connor in The Terminator.
                    )
    
            )
    
    )
    php > file_put_contents('db',serialize($data)); // Save

This blog is meant for people who
---------------------------------

* don't want a database.
* are good with the php cli and php.
* *are most likely crazy.*

Features
--------

* Syntax Highlighing ([Implementation](http://shjs.sourceforge.net/))
* RSS Feed ([Implementation](http://www.ajaxray.com/blog/2008/03/08/php-universal-feed-generator-supports-rss-10-rss-20-and-atom/))
* Nice CSS
* Individual page view
* Only shows posts that have happend.