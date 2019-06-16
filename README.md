.htaccess validation with PHP
=============================

###### Proof of concept *...it works!*

Validate .htaccess-files with PHP. 



<br />

---

### Idea behind it...

The *idea* behind this script is to allow changing the .htaccess over the website (e.g. CMS) without losing control over the server.
If you made a typo or an error, the server is sending a "Internal server error" (500) and you cannot correct the .htaccess over the website anymore! This script will *automatically* write the old content back, if you are producing an internal server error. So you will be safe.

Do not lose control anymore! :-)



<br />

---

### Autor

Aurel *'[dipser](http://github.com/dipser)'* Hermand
