To run the project, after composer install && npm install, 
run 'php artisan serve --port 8001'
in another terminal run 'npm run dev'
now open the backend part of the project, after 'composer install'
run 'php artisan serve', and then setting up your project database on .env.
In another terminal, run 'php artisan storage:link'
after that 'php artisan migrate && php artisan db:seed'

to login use:
email:admin@gmail.com
password:admin123
