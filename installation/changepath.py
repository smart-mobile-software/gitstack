import re, os, sys
# example 
# python changepath.py "C:\GitStack\" "C:\GitStack\apache\conf\gitstack" "C:\GitStack\app"
# Argument 1 : GitStack installation path (installdir\ ) (to not forget the leading path !!)
# Argument 2 : GitStack apache config directory (installdir/apache/conf/gitstack)
# Argument 2 : GitStack application directory (installdir/app)


#files to replace :
# settings.py
# django.wsgi
# wsgi.conf
# gitphp.conf (for apache)
# gitphp.conf.php
# installation.bat
# special :
# in settings.py GIT_PATH
# main.conf GIT
# settings.ini template

# replace the content of a file
def replacePathFile(filename, pattern, replace):
    # open source and destination
    new_config_file = open(filename + "tmp","a") 
    old_config_file = open(filename,"r")
    # for each line remove the tabular
    for line in old_config_file:
        line = line.replace(pattern,replace)
        new_config_file.write(line)
    # close files
    new_config_file.close()
    old_config_file.close()
    # replace old config by new config
    os.remove(filename)
    os.rename(filename + "tmp", filename)


strFromWin = "C:\\dev\\gitstack"
strFromUnix = "C:/dev/gitstack"
#strToWin = "C:\\Programs\\GitStack"
strToWin = sys.argv[1]
strToUnix = strToWin.replace("\\", "/")

# Change to the apache config directory
os.chdir(sys.argv[2])


# replace program path
replacePathFile(strToUnix + "/apache/conf/httpd.conf",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/apache/conf/gitstack/wsgi.conf",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/apache/conf/gitstack/main.conf",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/apache/conf/gitstack/gitphp.conf",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/php/php.ini",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/app/gitstack/config_template/listen_template.conf",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/app/gitstack/config_template/settings.ini",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/php/php.ini",strFromWin, strToWin)
replacePathFile(strToUnix + "/gitphp/config/gitphp.conf.php",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/gitphp/config/gitphp.repositorieslocation.conf.php",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/app/app/settings.py",strFromUnix, strToUnix)
replacePathFile(strToUnix + "/app/app/wsgi.py",strFromUnix, strToUnix)






