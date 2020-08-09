@ECHO OFF
ECHO === Taking down containers ===
START /wait /B docker-compose down -v
ECHO === Thanks for using our system ===
PAUSE
