This is a serialized blog for all you breakfast people.

The blog is designed to be loaded up via command line (`php -a`)

Performing a "simple":  
`$data = unserialize(file_get_contents('data.php'));`  
modify the object on the fly, and then  
`file_put_contents('data.php',serialize($data));`  
and you're all set!

Example
-------
Here we change the blog name to "Butts' blog" and add a new post.

    $ php -a
    Interactive shell
    
    php > $data = unserialize(file_get_contents('data.php')); // Load
    php > $new_post = new stdClass();
    php > $new_post->title = "A very compelling blog post";
    php > $new_post->body = "A very well written and researched article.";
    php > $new_post->published = 1;
    php > $data->posts[time()] = $new_post; // Notice how time is declared by the index.
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
                        [published] => 1
                    )
    
                [1315602148] => stdClass Object
                    (
                        [title] => Hello World
                        [body] => <pre class="sh_php">echo "hello world";</pre>This is a simple demonstration of a post.
                        [published] => 1
                    )
    
            )
    
    )
    php > file_put_contents('data.php',serialize($data)); // Save


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
* Publish flag