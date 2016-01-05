# tpaga-php-website-demo
TPAGA PHP WEBSITE DEMO

For testing purposes, this demo uses the API key token "d13fr8n7vhvkuch3lq2ds5qhjnd2pdd2" in the Tpaga sandbox environment. You also can create a Tpaga account at https://sandbox.tpaga.co and change API credentials in the charge function at app/Http/Controllers/Tpaga_charge.php

```php
public function charge(Request $request)
{

	...

	$config= new Tpaga\Configuration();
  $config->setUsername(env('TPAGA_API_KEY','d13fr8n7vhvkuch3lq2ds5qhjnd2pdd2'));
	$apiClient = new tpaga\ApiClient($config);

}
```
You can also use an environment variable called *TPAGA_API_KEY* by creating an .env file to define it in the root of the project:

```
TPAGA_API_KEY='d13fr8n7vhvkuch3lq2ds5qhjnd2pdd2'
```

## Requirements

Composer (You can get it at http://getcomposer.org/).

Laravel requirements: 

	• PHP >= 5.5.9
	• OpenSSL PHP Extension
	• PDO PHP Extension
	• Mbstring PHP Extension
	• Tokenizer PHP Extension

## Getting Started

Download the package and install all its dependencies by typing this line in the project path:

```bash
$ composer install
```
Make sure you have the directories permissions required by [laravel](http://laravel.com/docs/5.1#basic-configuration), specially in storage and public folders. Try this:

```bash
$ sudo chown -R www-data:www-data tpaga-php-demo 

$ sudo find tpaga-php-demo -type d -exec chmod 0755 {} \;

$ sudo find tpaga-php-demo -type f -exec chmod 0644 {} \;

$ sudo chmod 0777 -R tpaga-php-demo/storage

$ sudo chmod 0777 -R tpaga-php-demo/public

```
## Apache

If you require it, create a virtualhost. If you are using apache, create a new file called tpaga-php-demo.com.conf and save it at /etc/apache2/sites-available.

```subl
 <VirtualHost *:80>
     ServerAdmin admin@tpaga-php-demo.com
     ServerName tpaga-php-demo.com
     ServerAlias www.tpaga-php-demo.com
     DocumentRoot /path/to/tpaga-php-demo/public
     ErrorLog ${APACHE_LOG_DIR}/error.log
     CustomLog ${APACHE_LOG_DIR}/access.log combined
     <Directory "/path/to/tpaga-php-demo/public">
  Options Indexes FollowSymLinks
  AllowOverride all
  Require all granted
     </Directory>
 </VirtualHost>
```
Make sure you replace "/path/to" with the path to your project.

Update your host address by adding this line to the file "hosts" in the "/etc" folder .

```
127.0.0.1       tpaga-php-demo.com  www.tpaga-php-demo.com
```

Finally, restart apache service and enable the site.

```bash
$ sudo service apache2 restart

$ sudo a2ensite tpaga-php-demo.com
```
Now you can go to your browser and type tpaga-php-demo.com

## What to expect?

You will see a website from a rapid food place where you can chose among three combo options. After that, you can insert your credit card information and pay for your selection.

![phpweb](/phpweb.png)

## What does the application do?

This demo takes your credit card information and creates a customer, assigns a credit card to that customer and performs a charge to that card in the Tpaga sandbox environment. If you get a successfull transaction you will see the description of your purchase and the transaction id.

## Documentation

Please see https://tpaga.com/docs for extra documentation.

## License

This is an open-sourced software licensed under the [Apache license, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0)