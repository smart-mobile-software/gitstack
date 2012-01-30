import sys,os
strToWin = sys.argv[1]
print strToWin
strToUnix = strToWin.replace("\\", "/")
print strToUnix
os.chdir(strToWin)
print os.getcwd()

