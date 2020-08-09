@ECHO OFF
ECHO === Running containers ===
START /B /wait docker-compose up -d
ECHO === Installing PHP packages ===
START /B /wait docker exec lirmi_laravel_php composer install
ECHO === Installing JS packages ===
START /B /wait docker exec lirmi_laravel_php npm install
ECHO === Compiling JS and CSS ===
START /B /wait docker exec lirmi_laravel_php npm run dev
ECHO === Generating Laravel App Key ===
START /B /wait docker exec lirmi_laravel_php php artisan key:generate
ECHO === Database migration ===
START /B /wait docker exec lirmi_laravel_php php artisan migrate
ECHO === Cache cleaning ===
START /B /wait docker exec lirmi_laravel_php php artisan cache:clear
ECHO === System up and running! Have fun ===
PAUSE