:: Apache httpd-2.2.21-win32-x86-no_ssl.msi
msiexec /i httpd.msi /passive ALLUSERS=1 SERVERADMIN=admin@localhost SERVERNAME=localhost SERVERDOMAIN=localhost SERVERPORT=80 INSTALLDIR=C:\dev\gitstack\apache SERVICEINTERNALNAME=GitStack SERVICENAME=GitStack INSTALLLEVEL=1 
:: Python python 2.7.2 32bits
msiexec /i python.msi /qn TARGETDIR=C:\dev\gitstack\python ALLUSERS=1
:: Add python to the path
setx path "%path%;C:\dev\gitstack\python"
setx path "%path%;C:\dev\gitstack\python\Scripts"
:: Install django
python django\setup.py install
:: Change the database path in settings.py (sqlite)
:: Change the template dir path
:: Add git to the path
setx path "%path%;C:\dev\gitstack\git\cmd"
:: Copy mod_wsgi 3.3 python 2.7 in apache directory
cp mod_wsgi.so C:\dev\gitstack\apache\modules
echo LoadModule wsgi_module modules/mod_wsgi.so >> C:\dev\gitstack\apache\conf\httpd.conf
:: Add new directory in apache config
mkdir C:\dev\gitstack\apache\conf\gitstack
:: Include any files in the apache gitstack config folder
echo Include conf/gitstack/*.conf >> C:\dev\gitstack\apache\conf\httpd.conf
:: Copy the apache config files
cp main.conf C:\dev\gitstack\apache\conf\gitstack
cp wsgi.conf C:\dev\gitstack\apache\conf\gitstack


:: Change django.wsgi path
:: Copy 
cp C:\dev\gitstack\git\bin\libiconv2.dll C:\dev\gitstack\git\libexec\git-core\
cp C:\dev\gitstack\git\bin\libiconv-2.dll C:\dev\gitstack\git\libexec\git-core\

:: Restart apache service
net stop GitStack
net start GitStack
