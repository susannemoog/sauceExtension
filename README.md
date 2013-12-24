sauceExtension
==============

Codeception Extension to support automated testing via sauce labs.

Adds test name, build and status information to saucelabs overview.


Installation
--------------

+ Copy the folder extensions to your project
+ Add the extension in your codeception.yml as shown in the example.codeception.yml
+ Configure your username and access key
+ Include the extension in your _bootstrap.php (include('extensions/sauce/SauceExtension.php');)

```_bootstrap.php
 include('extensions/sauce/SauceExtension.php');
```

+ Make sure you are using saucelabs as selenium server in your acceptance.suite.yml

```yml
class_name: WebGuy
modules:
    enabled: [WebDriver]
    config:
        WebDriver:
            host: 'username:accesskey@ondemand.saucelabs.com'
            port: 80
            restart: true
            url: 'http://www.example.com/'
            browser: firefox
            wait: 3
            capabilities:
              unexpectedAlertBehaviour: 'accept'
              platform: 'Windows 8.1'
              version: '25'
```