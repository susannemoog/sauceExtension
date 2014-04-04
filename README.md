Codeception: sauceExtension
============================

Codeception Extension to support automated testing via sauce labs.

Adds test name, build and status information to saucelabs overview.


Installation
--------------

+ Add the psychomieze/sauceextension composer package to the project's composer.json.
+ Execute composer to update your environment.
+ Add the extension in the codeception.dist.yml as shown in the example.codeception.dist.yml
+ Add the SauceLabs username and access key as shown in the example.codeception.yml
+ Make sure to use SauceLabs as the selenium server in the acceptance.suite.yml

```yml
class_name: WebGuy
modules:
    enabled:
        - WebDriver
    config:
      WebDriver:
        url: 'http://www.example.com/'
        port: 80
        wait: 1
        browser: firefox
        restart: true
        capabilities:
          unexpectedAlertBehaviour: 'accept'
          platform: 'Windows 8.1'
          version: '25'
```

Note: A full working Codeception example is enabled in this package. Create and/or update the **codeception.yml** and **acceptance.suite.yml** within the tests/ directory with your SauceLabs **username** and **accesskey**.

Note: This package uses the *dist* feature of Codeception. Configuration information that is safe to distribute to other developers go in a file with *dist* in the name. Secret files are ignored by the repo and only available locally.

| Secret | Public |
|:-------:|:-------------:|
| codeception.yml | codeception.dist.yml |

Refer to this documentation [here](http://codeception.com/docs/02-GettingStarted#Configuration) for further explanation.
