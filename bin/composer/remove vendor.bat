@echo off
cd ../..
rmdir /S /Q "./vendor"
del "./composer.lock"
pause