Codeception: sauceExtension
============================

Codeception Extension to support automated testing via sauce labs.

Adds test name, build and status information to saucelabs overview.


Installation
--------------

+ Copy the folder extensions to your codeception project
+ Add the extension in your codeception.yml as shown in the example.codeception.yml
+ Configure your username and access key
+ Include the extension in your _bootstrap.php (require_once __DIR__ . '/../extensions/sauce/SauceExtension.php';)

```_bootstrap.php
 require_once __DIR__ . '/../extensions/sauce/SauceExtension.php';
```

+ Make sure you are using saucelabs as selenium server in your acceptance.suite.yml

```yml
class_name: WebGuy
modules:
    enabled:
        - WebDriver
    config:
      WebDriver:
        url: 'http://ww.example.com/'
        port: 80
        wait: 1
        browser: firefox
        restart: true
        capabilities:
          unexpectedAlertBehaviour: 'accept'
          platform: 'Windows 8.1'
          version: '25'
```
Note: A full example is enabled in this package. Just add your user name and key config to the codeception.yml.
