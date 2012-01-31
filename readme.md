GitStack Development environment setup
---------------

##Introduction

Most of theses steps could have been automated as a .bat file. However, we prefer when you know exactly what happens on your system. 

We recommend to install everything in `C:\dev\gitstack` folder. If you don’t, you should modify the configuration files accordingly.  

##Install git

(If you already have msysgit on your system, we still recommend to perform the following steps to be able to build the complete project).  

Create a c:/dev/gitstack folder  
Download portablegit 1.7.8 from :  
http://msysgit.googlecode.com/files/PortableGit-1.7.8-preview20111206.7z  
Unzip portable git  
copy the unziped portable git folder to c:/dev/gitstack  
rename the portable git folder to “git”.   
open a command line  

    C:\Users\Administrator> copy C:\dev\gitstack\git\bin\ibiconv2.dll C:\dev\gitstack\git\libexec\git-core\  
    C:\Users\Administrator> copy C:\dev\gitstack\git\bin\ibiconv-2.dll C:\dev\gitstack\git\libexec\git-core\ 
 
Add git to the windows “path” environment variable :
;C:\dev\gitstack\git\cmd

Now, if you close and open a new command line and type “git”, it should get some info on how to use git.  

    C:\Users\Administrator>git version
    git version 1.7.8.msysgit.0

Make sure you are using the right version of git (not another one installed on your system without the dlls).

##Download application source code

open a command line  
type :  

    C:\Users\Administrator> cd c:\dev\gitstack\ 
    C:\dev\gitstack> git init  
    C:\dev\gitstack> git remote add origin git://github.com/smart-mobile-software/gitstack.git  
    C:\dev\gitstack> git pull origin master  

##Install Python/Django

    C:\dev\gitstack> cd installation
    C:\dev\gitstack\installation> msiexec /i python.msi /qn TARGETDIR="c:\dev\gitstack\python" ALLUSERS=1

Add in your windows “path” environment variable: 

    C:\dev\gitstack\python;C:\dev\gitstack\python\Scripts

Close your current command line and start a new one.

    C:\Users\Administrator> cd c:\dev\gitstack\installation\django\
    C:\dev\gitstack\installation\django>python setup.py install

##Install Apache

    C:\dev\gitstack\installation\django> cd ..
    C:\dev\gitstack\installation> msiexec /i httpd.msi /passive ALLUSERS=1 SERVERADMIN=admin@localhost SERVERNAME=localhost SERVERDOMAIN=localhost SERVERPORT=80 INSTALLDIR="c:\dev\gitstack\apache" SERVICEINTERNALNAME=GitStack SERVICENAME=GitStack INSTALLLEVEL=1

If you launch your browser to http://localhost/ you should get a “it works” message.

Copy the apache wsgi module (to enable python support)

    C:\dev\gitstack\installation> copy mod_wsgi.so ..\apache\modules
Modify the apache config file to load the wsgi module.
Edit : `C:\dev\gitstack\apache\conf\httpd.conf`  
Add theses two lines the end of the file : 

    LoadModule wsgi_module modules/mod_wsgi.so
    Include conf/gitstack/*.conf 

On the command line, create a gitstack configuration directory and add some config files :

    C:\dev\gitstack\installation> mkdir C:\dev\gitstack\apache\conf\gitstack
    C:\dev\gitstack\installation> copy main.conf ..\apache\conf\gitstack
    C:\dev\gitstack\installation> copy wsgi.conf ..\apache\conf\gitstack
Create a directory for the repositories

    C:\dev\gitstack\installation> mkdir C:\dev\gitstack\repositories
Create a directory to store the database

    C:\dev\gitstack\installation> mkdir C:\dev\gitstack\data
Restart apache

    C:\dev\gitstack\installation> net stop GitStack
    C:\dev\gitstack\installation> net start GitStack

##Launch the application
    C:\dev\gitstack\installation> cd ..\app
    C:\dev\gitstack\installation> python manage.py runserver 8000
    Django version 1.3.1, using settings 'app.settings'
    Development server is running at http://127.0.0.1:8000/
    Quit the server with CTRL-BREAK.

Launch the GitStack user interface from your web browser :
http://localhost:8000/gitstack/

You are ready to go !

