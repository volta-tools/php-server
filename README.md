
# PHP build-in web server extension

When developing in PHP I use the PHP build in webserver. Sometimes multiple instances to test backend and front end separately. If you doe this you will recognize the list with common tasks:

* Navigate to the document root of the specified project. which is basically the same in all projects namely `public` or `src`
* Typing in the command ` php -S localhost `.
* Choosing a port number, and basically these are mostly the same numbers I reuse(8080, 9090 etc.)
* then adding the index.php to be used as the front controller. 
* In some test cases I like different PHP ini files to be loaded to be placed on the command line.
* Sometimes i forget about the process and want to reuse the port which off course give me an error. But the error does not contain the Process ID which I have to look up and kill manually.
* Set specific environment variables for specific project modes before starting the server.

Long story short I use the same set of values for a specific project for a longer period of time. But find my self repeating the same tasks over and over again.

This calls for a script which will do these tasks for me. Ease of use, available in every project. Configurable per project.  