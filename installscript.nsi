!include "MUI2.nsh"
!include "EnvVarUpdate.nsh"
Name "GitStack"
!define VERSION "1.4"
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
!insertmacro MUI_PAGE_COMPONENTS
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
Section "GitStack" sectionGitStack
	# Previous GitStack installation
	ClearErrors
	ReadRegStr $0 HKLM "SOFTWARE\Microsoft\Windows\CurrentVersion\Uninstall\GitStack" "UninstallString"
	IfErrors NotInstalled 0 
	messageBox MB_OK "Please uninstall the previous version of GitStack before installing a new one."
	Quit
	NotInstalled:
	
	# Set restore point
	SysRestore::StartRestorePoint "GitStack Installed"
	# Copy files
	SetOutPath "$INSTDIR\app"
	File /r "app\*.*"
	SetOutPath "$INSTDIR\data"
	File /r "data\data.db"
	SetOutPath "$INSTDIR\templates"
	File /r "templates\*.*"
	SetOutPath "$INSTDIR\php"
	File /r "php\*.*"
	SetOutPath "$INSTDIR\gitphp"
	File /r "gitphp\*.*"
	SetOutPath "$INSTDIR\python"
	File /r "python\*.*"
	SetOutPath "$INSTDIR\apache"
	File /r "apache\*.*"
	
	
	SetOutPath "$TEMP\gitstack"
	File /r "installation\*.*"
	
	WriteUninstaller "uninstall.exe"

	# create a directory for the repositories
	createDirectory "$INSTDIR\repositories"
	
	# Register python path
	${EnvVarUpdate} $0 "PATH" "A" "HKLM" "$INSTDIR\python" ; Append  
	${EnvVarUpdate} $0 "PATH" "A" "HKLM" "$INSTDIR\python\Scripts" ; Append  
	${EnvVarUpdate} $0 "PYTHONHOME" "A" "HKLM" "$INSTDIR\python" ; Append  
	${EnvVarUpdate} $0 "PYTHONPATH" "A" "HKLM" "$INSTDIR\python\lib" ; Append  
	
	# Install apache 
	ExecWait '"msiexec" /i $TEMP\gitstack\httpd.msi /passive ALLUSERS=1 SERVERADMIN=admin@localhost SERVERNAME=localhost SERVERDOMAIN=localhost SERVERPORT=80 INSTALLDIR="$INSTDIR\apache" SERVICEINTERNALNAME=GitStack SERVICENAME=GitStack INSTALLLEVEL=1'
	# Apache config
	SetShellVarContext all
	
	# Add a rule for the port 80 in the windows firewall
	ExecWait "netsh advfirewall firewall add rule name=GitStack service=GitStack protocol=TCP dir=in localport=80 action=allow"
		
	# Install Microsoft Visual C++ 2010 SP1 Redistributable Package (x86) required for php
	ExecWait '"$TEMP\gitstack\vcredist.exe" /q'

	# Update the apache configuration files
	ExecWait '"$TEMP\gitstack\rewriteapacheconfig.bat" $INSTDIR $TEMP' $0
	
	# Install apache service
	ExecWait '"$INSTDIR\apache\bin\httpd.exe" -k install -n "GitStack"'


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
	
	# Start the apache service
	ExecWait "net start GitStack"
	
	# End the restore point
	SysRestore::FinishRestorePoint
	
SectionEnd
LangString DESC_sectionGitStack ${LANG_ENGLISH} "Install GitStack user interface and web server."

# Installation of msysgit
Section "Git (recommended)" sectionGit
	SetOutPath "$INSTDIR\git"
	File /r "git\*.*"
	# Fix portable git
	SetOutPath "$INSTDIR\git\libexec\git-core"
	File "git\bin\libiconv2.dll"
	File "git\bin\libiconv-2.dll"
	# Set the path to portable git
	${EnvVarUpdate} $0 "PATH" "A" "HKLM" "$INSTDIR\git\cmd" ; Append  
SectionEnd
LangString DESC_sectionGit ${LANG_ENGLISH} "Install Git (msysgit). Unchecking this option is discouraged. GitStack will work only with git installed on your system. Please read our documentation if you would like to install your own version of Git."

# Register the sections descriptions
!insertmacro MUI_FUNCTION_DESCRIPTION_BEGIN
  !insertmacro MUI_DESCRIPTION_TEXT ${sectionGitStack} $(DESC_sectionGitStack)
  !insertmacro MUI_DESCRIPTION_TEXT ${sectionGit} $(DESC_sectionGit)
!insertmacro MUI_FUNCTION_DESCRIPTION_END


##############################################
# Uninstall section
##############################################
 
Section "Uninstall"
	# Start restore point
	SysRestore::StartUnRestorePoint "GitStack Uninstalled"
	DeleteRegKey HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\GitStack"
	# Uninstall apache
	ExecWait "net stop GitStack"
	ExecWait '"$INSTDIR\apache\bin\httpd.exe" -k uninstall -n "GitStack"'
	# remove the firewall rule
	ExecWait "netsh advfirewall firewall delete rule name=GitStack"
	
	# Remove GitStack installation path
	RMDir /r "$INSTDIR\app"
	RMDir /r "$INSTDIR\git"
	RMDir /r "$INSTDIR\templates"
	RMDir /r "$INSTDIR\python"
	RMDir /r "$INSTDIR\apache"
	RMDir /r "$INSTDIR\php"
	RMDir /r "$INSTDIR\gitphp"

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
 