# PHP Built-in Web Server Automation Script

When working with PHP, I often utilize the built-in web server for development purposes. Sometimes, I need to run multiple instances to test backend and frontend separately. If you're familiar with this process, you'll recognize the common tasks involved:

* Navigating to the project's document root, typically named public or src.
* Executing the command php -S localhost.
* Selecting a port number, often reusing familiar numbers like 8080 or 9090.
* Specifying the index.php file as the front controller.
* Occasionally, I require different PHP ini files to be loaded via command line for specific test cases.
* Forgetting to terminate previous instances and encountering errors when attempting to reuse ports, necessitating manual lookup and termination of Process IDs. 
* Setting specific environment variables tailored to project modes before server startup.

In essence, I find myself repeating the same set of tasks for each project, which prompts the need for a script to automate these processes. This script should offer ease of use, be readily available within each project, and configurable on a per-project basis.


## Installation

At present, there isn't an installer accessible. However, one will be provided in the near future. For now, manually copy the file named `php-server` to `usr/local/bin` directory and ensure that the file has executable permissions for all users.

```bash
sudo cp ./php-server /usr/local/bin/
sudo chmod a+x /usr/local/bin/php-server 
```

Check the installation by executing the script on the command line:

```bash
php-server --help
```


## Configuration

The configuration options are loaded using the following cascading steps:

### 1. Script defaults
The script has default values for all the options

### 2. Current user
The script will look for a configuration file `.php-server-conf` in the home folder of the current user. The file is expected in the *.ini format (https://en.wikipedia.org/wiki/INI_file). See below for an example with comments.
 

## Configuration File Example

```ini

;
; Set settings system wide
;
php-server[verbose] = true
php-server[host] = localhost
php-server[port] = 8080
php-server[root] = "public"
php-server[file] = "index.php"
; php-server[php-conf] =
 
; All entries in the env[] array will be set in the environment
; and will exist during web the servers process.
;
env[APP_ENV] = staging
env[APP_DB_USERNAME] = "user_name"
env[APP_DB_PASSWORD] = "password"


;  
; Overwrite settings per project bases
;
; Use these settings when the working directory of the php-server
; matches the value of the section.
;
[/path/to/project]
php-server[verbose] = false
php-server[host] = 127.0.0.1
php-server[port] = 8181
php-server[root] =
php-server[file] = index.php
; php-server[php-conf] =

env[APP_ENV] = development
env[APP_DB_USERNAME] = root
env[APP_DB_PASSWORD] =
 
```
