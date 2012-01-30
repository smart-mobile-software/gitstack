echo LoadModule wsgi_module modules/mod_wsgi.so >> "%1\apache\conf\httpd.conf"
:: Include any files in the apache gitstack config folder
echo Include conf/gitstack/*.conf >> "%1\apache\conf\httpd.conf"