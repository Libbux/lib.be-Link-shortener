The lib.be link shortener is a scalabe & reliable URL shortening engine. It comes with a pre-built front-end page (``index.php``), to demonstrate interaction with the engine, and what can be done with a little AJAX. Feel free to use this page with your own projects.

## Installation
There are two ways in which the lib.be link shortener can be installed and configured. There is the Quick-And-Dirty method, and the Full-Installation method. The Quick-And-Dirty method will get you up and running in minutes, but you will miss out on learning how the engine works, and how you can interact with it. The full guide will give you the knowledge you need to interact with the plugin in a rich way.

### Quick and dirty
The quick and dirty installation of the lib.be engine will get you up and running in minutes, with a nice looking AJAX enabled front end page. All you have to do is change the values in the ``config.php`` file. This approach is best if you are looking for a quick and small solution, but lacks full customization. If you are looking for a learning experience, skip to the "Full" installation section.

#### Step 1 (Database configuration):
1. Open ``config.php`` in your favorite text editor. Give it a quick skim - it's heavily commented, you might even be able to figure it out yourself.
2. Locate the lines in ``config.php`` that begin like this:
``
12  $db_host = "localhost";
13	$db_user = "libbe";
14	$db_pass = "super_secret_password";
15	$db_name = "my_url_shortener";
``
These are the most important values - if they're not configured correctly, the engine will not work! The first one we need to change is ``$db_host``. As the comments in ``config.php`` explain, this variable sets the hostname (or IP, either will work) of the database server on which the database the engine stores its data in resides. If you have paid for web hosting with a MySQL server, your account will probably give you an IP. Copy and paste that IP into the file, inside the quoations in front of ``$db_host`` on line 12 of ``config.php``. The above section of code should now look like this (let's assume my database server IP is 12.34.567.890):
``
12	$db_host = "12.34.567.890";
13	$db_user = "libbe";
14	$db_pass = "super_secret_password";
15	$db_name = "my_url_shortener";
``
The next thing we need to configure is the username we want to use to log on to the database server with. Your web hosting provider should also give you this information, most likely in the same place you found your database server's IP. Update line 13 of ``config.php`` so it looks like this (if my username was TheLibbster):
``
13	$db_user = "TheLibbster";
``
Next, we need to fill in the password for the username that we just filled in. There is a pretty good chance that this will be right beside the username and IP of your database server on your web host's website... Imagine that! Update line 14 of ``config.php`` so it looks like this (assuming my password is password1):
``
14	$db_pass = "password1";
``
You should never use password as your password, but password1 is much more secure (sarcasm!). Finally, to complete the database server configuration, we need to fill out the name of the database we wish to use with the engine. If you have not already created a database on your database server, now is a good time to do so. Create a database and give it a name, but don't do anything else. I would recommend either the MyISAM or InnoDB (probably the better choice) storage engine for our use. Once you have created the database, upload the ``libbe.sql`` file. If you are using PHPMyAdmin, this should be fairly smooth and work quite well. Once the SQL file has been imported, take a look at the database. It should have one table called ``urls``. This is the only table the engine uses. It should be empty. If it isn't for some reason, truncate the table now. We're now ready to fill in the ``$db_name`` value in ``config.php``. Update line 15 of ``config.php`` so it looks like this (assuming my database name is my_url_shortener):
 ``
 15	$db_name = "my_url_shortener";
``

#### Step 2 (Other configuration):
There are a couple other things which can be configured very easily with the lib.be URL shortening engine:

* Base URL (obviously!)
* Whether or not the "http://" is shown in your shortened URLs
* The character set from which your shortened URL is generated
* OGP (Open Graph Protocol) information such as:
	* Site name
	* Site description
	* About site
* E-mail contact link information (email recipient, subject, etc.)

These configuration settings are all very easy to change within the ``config.php`` file. The file is quite heavily commented, thouroughly explaining what each line does and how to change it. Here is a quick overview of the variables which you need to change to change each setting:

* Base URL: ``$base_url``
* Whether or not the "http://" is shown in your shortened URLs: ``$show_protocol``
* The character set from which your shortened URL is generated: ``$short_charset``
* OGP (Open Graph Protocol) information such as:
	* Site name: ``$site_name``
	* Site description: ``$site_descrip``
	* About site: ``$about_info``
* E-mail contact link information:
	* E-mail recipient: ``$contact_email``
	* E-mail subject (useful for e-mail filters): ``$contact_subject``

### Full
Give me a sec!

## Author
* [Jonathan Libby] (http://www.thelibbster.com) (http://github.com/TheLibbster)

## Copyright
Copyright (c) 2012-2013 Jonathan Libby

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
