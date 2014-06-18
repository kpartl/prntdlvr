@echo off
rem set HTTP_PROXY=http://b15209:N3arvahu@10.64.3.193:8080
rem set HTTPS_PROXY=http://b15209:N3arvahu@10.64.3.193:8080
rem set HTTPS_PROXY_REQUEST_FULLURI=false
@php "%~dp0composer.phar" %*
