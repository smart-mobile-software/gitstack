# TODO : REPLACE Apache Version

!include "MUI2.nsh"
!include "EnvVarUpdate.nsh"
Name "GitStack"
!define VERSION "1.2"
OutFile "GitStack ${VERSION}.exe"
#InstallDir "$PROGRAMFILES\GitStack"
InstallDir "C:\GitStack"
BrandingText " "
RequestExecutionLevel highest
ShowInstDetails nevershow

###############################################################
# Design
##############################################################
; MUI Settings / Icons
!define MUI_ICON "${NSISDIR}\Contrib\Graphics\Icons\orange-install.ico"
!define MUI_UNICON "${NSISDIR}\Contrib\Graphics\Icons\orange-uninstall.ico"
 
; MUI Settings / Header
!define MUI_HEADERIMAGE
!define MUI_HEADERIMAGE_RIGHT
!define MUI_HEADERIMAGE_BITMAP "${NSISDIR}\Contrib\Graphics\Header\orange-r.bmp"
!define MUI_HEADERIMAGE_UNBITMAP "${NSISDIR}\Contrib\Graphics\Header\orange-uninstall-r.bmp"
 
; MUI Settings / Wizard
!define MUI_WELCOMEFINISHPAGE_BITMAP "${NSISDIR}\Contrib\Graphics\Wizard\orange.bmp"
!define MUI_UNWELCOMEFINISHPAGE_BITMAP "${NSISDIR}\Contrib\Graphics\Wizard\orange-uninstall.bmp"

########################################
# Pages
########################################
!insertmacro MUI_PAGE_WELCOME
!insertmacro MUI_PAGE_LICENSE "license.txt"
!insertmacro MUI_PAGE_DIRECTORY

/*
Var REPOSITORIES_DIR

PageEx directory
	DirText "Select where you would like to store your git repositories" "Repositories folder" "Browse..." "Select a folder to store your repositories"
	DirVar $REPOSITORIES_DIR
PageExEnd*/
!insertmacro MUI_PAGE_INSTFILES
!define MUI_FINISHPAGE_RUN 
!define MUI_FINISHPAGE_RUN_TEXT "Launch GitStack"
!define MUI_FINISHPAGE_RUN_FUNCTION "LaunchLink"
!insertmacro MUI_PAGE_FINISH
 
;Languages
!insertmacro MUI_LANGUAGE "English"
 
Function LaunchLink
  ExecShell "" "$SMPROGRAMS\GitStack\GitStack.lnk"
FunctionEnd

#############################################
# Install section
#############################################
Section
	# Set restore point
	SysRestore::StartRestorePoint "Installed GitStack"
	# Copy files
	SetOutPath "$INSTDIR\app"
	File /r "app\*.*"
	SetOutPath "$INSTDIR\data"
	File /r "data\data.db"
	SetOutPath "$INSTDIR\git"
	File /r "git\*.*"
	SetOutPath "$INSTDIR\templates"
	File /r "templates\*.*"
	
	SetOutPath "$TEMP\gitstack"
	File /r "installation\*.*"
	
	WriteUninstaller "uninstall.exe"
	
	# Install python
	ExecWait '"$TEMP\gitstack\installpython.bat" $INSTDIR'
	# Remove python start menu
	SetShellVarContext all
	RMDir /r "$SMPROGRAMS\Python 2.7"
	
	# Register python path
	${EnvVarUpdate} $0 "PATH" "A" "HKLM" "$INSTDIR\python" ; Append  
	${EnvVarUpdate} $0 "PATH" "A" "HKLM" "$INSTDIR\python\Scripts" ; Append  
	ExecWait '"$TEMP\gitstack\djangoinstall.bat" "$INSTDIR" "$TEMP"' $0
	
	# Install apache
	ExecWait '"msiexec" /i $TEMP\gitstack\httpd.msi /passive ALLUSERS=1 SERVERADMIN=admin@localhost SERVERNAME=localhost SERVERDOMAIN=localhost SERVERPORT=80 INSTALLDIR="$INSTDIR\apache" SERVICEINTERNALNAME=GitStack SERVICENAME=GitStack INSTALLLEVEL=1'
	# Remove apache start menu
	RMDir /r "$SMPROGRAMS\Apache HTTP Server 2.2"
	# Add a rule for the port 80 in the windows firewall
	ExecWait "netsh advfirewall firewall add rule name=GitStack service=GitStack protocol=TCP dir=in localport=80 action=allow"
	
	# Set the path to portable git
	${EnvVarUpdate} $0 "PATH" "A" "HKLM" "$INSTDIR\git\cmd" ; Append  
	
	# Copy mod_wsgi 3.3 python 2.7 in apache directory
	SetOutPath "$INSTDIR\apache\modules"
	File "installation\mod_wsgi.so"
	
	# add a loadmodule wsgi to the apache config file
	ExecWait '"$TEMP\gitstack\apacheaddinstructions.bat" $INSTDIR'
	
	# Add a configuration directory to apache
	CreateDirectory "$INSTDIR\apache\conf\gitstack"
	
	# Create a directory for the repositories
	CreateDirectory "$INSTDIR\repositories"
	
	# Copy the apache config files specific to gitstack
	SetOutPath "$INSTDIR\apache\conf\gitstack"
	File "installation\main.conf"
	File "installation\wsgi.conf"

	# Update the apache configuration files
	ExecWait '"$TEMP\gitstack\rewriteapacheconfig.bat" $INSTDIR $TEMP' $0

	
	# Fix portable git
	SetOutPath "$INSTDIR\git\libexec\git-core"
	File "git\bin\libiconv2.dll"
	File "git\bin\libiconv-2.dll"
	
	
	# restart apache service
	ExecWait "net stop GitStack"
	ExecWait "net start GitStack"
	
	
	
	# Add an entry in Add/Remove folder
	WriteRegStr HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\GitStack" "DisplayName" "GitStack"
	WriteRegStr HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\GitStack" "UninstallString" "$\"$INSTDIR\uninstall.exe$\""
	WriteRegStr HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\GitStack" "Publisher" "Smart Mobile Software"
	WriteRegStr HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\GitStack" "DisplayVersion" ${VERSION}
	
	# Clean up the temp directory
	RMDir /r "$TEMP\GitStack"
	
	# Start menu shortcuts
	createDirectory "$SMPROGRAMS\GitStack"
	createShortCut "$SMPROGRAMS\GitStack\GitStack.lnk" "http://localhost/gitstack/" "" ""
	
	# End the restore point
	SysRestore::FinishRestorePoint
	
SectionEnd

##############################################
# Uninstall section
##############################################
 
Section "Uninstall"
	# Start restore point
	SysRestore::StartUnRestorePoint "Uninstalled GitStack"
	DeleteRegKey HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\GitStack"
	# Uninstall apache
	ExecWait "net stop GitStack"
	ExecWait '"$INSTDIR\apache\bin\httpd.exe" -k uninstall -n "GitStack"'
	ExecWait '"wmic" product where name="Apache HTTP Server 2.2.22" call uninstall'
	# remove the firewall rule
	ExecWait "netsh advfirewall firewall delete rule name=GitStack"
	
	# Uninstall python
	ExecWait '"wmic" product where name="Python 2.7.2" call uninstall'
	# Remove GitStack installation path
	RMDir /r "$INSTDIR\app"
	RMDir /r "$INSTDIR\git"
	RMDir /r "$INSTDIR\templates"
	RMDir /r "$INSTDIR\python"
	Delete "$INSTDIR\uninstall.exe"
	
	# Remove the added environment variables
	${un.EnvVarUpdate} $0 "PATH" "R" "HKLM" "$INSTDIR\python"   
	${un.EnvVarUpdate} $0 "PATH" "R" "HKLM" "$INSTDIR\python\Scripts"  
	${un.EnvVarUpdate} $0 "PATH" "R" "HKLM" "$INSTDIR\git\cmd"  
	
	# Remove Start Menu launcher
	delete "$SMPROGRAMS\GitStack\GitStack.lnk"
	# Try to remove the Start Menu folder - this will only happen if it is empty
	RMDir "$SMPROGRAMS\GitStack"
	
	# Finish restore point
	SysRestore::FinishRestorePoint
SectionEnd
 