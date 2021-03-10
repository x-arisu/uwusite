# UwU Site
A modular, hackable, and expandable website and blog with mainly PHP and HTML/CSS.

[![](https://projectuwu.com/images/uwusite_example.png)](https://projectuwu.com/images/uwusite_example.png)

UwU Site in use:
https://projectuwu.com

#### Why?
I was redesigning my site, but I couldn't quite find something that fit my needs and my idea of simplicity so I made this.

#### Simplicity _(kinda)_
I wanted to make a site that was somewhat simple to manage with just files. That way I can move stuff around and change what I need all with using stuff I already know.

That's why the posts with UwU Site are made with HTML rather than markdown. I want to give the user as much freedom as they to make their site the way they want it.

#### Setup and usage
- Should work fine with any web server that support PHP.

- In the config folder you will see a nav and banner php files. You can edit these to make them what you would like.

- File naming scheme. The index searches for files that start with 3 numbers and have an underscore. 
`001_WhateverYouWant`
From here you can make your post however you like.
If you're working with the blog, you will notice that the title and timestamp lines have PHP.  You will need to change the post_info.php in the folder of the article you are writing.

- Multiple posts: Making more than one post on a page is very easy. All you need to do is copy a template or what you have for the 001 post and paste it as 002, then edit it accordingly. 
Remember, it does go from highest to lowest, so you may have to reorder it.

- Page titles are managed manually in the index.php. The only exception to this is for blog articles, the page title is set to the article title.

- Blog configuration: Other than the page title, the only other thing you need to change in the blog's index.php is the article path.
For this you just need to change the articles path to reflect your current folder setup.

- Anything else such as css changes, favicon changes, font changes you can find the relevant files in the files folder.

#### Bugs, Issues, Improvements
Feel free to make a bug report, submit improvements, or request features.
