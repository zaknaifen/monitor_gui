@echo off

for /f "skip=1 usebackq delims==" %%i in (`wmic logicaldisk where "mediatype='12'" get caption`) do (
call :doit %%i )
goto :eof

:doit
set driveletter=%1
if {%driveletter%}=={} goto :EOF
for /f "usebackq delims== tokens=2" %%x in (`wmic logicaldisk where "DeviceID='%driveletter%'" get FreeSpace /format:value`) do set FreeSpace=%%x
for /f "usebackq delims== tokens=2" %%x in (`wmic logicaldisk where "DeviceID='%driveletter%'" get Size /format:value`) do set Size=%%x
set FreeMB=%FreeSpace:~0,-10%
set SizeMB=%Size:~0,-10%
set /a Percentage=100 * FreeMB / SizeMB
echo %driveletter% %FreeMB% GB out of  %SizeMB% GB Total - %Percentage% percent free)