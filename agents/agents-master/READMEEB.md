          # Запуск проекта с использованием Docker

1. Для успешной сборки и запуска проекта:

./docker/docker-setup.sh build

Эта команда забилдит проект, так что ее нужно лишь написать единожды

2. Для запуска всех контейнеров

./docker/docker-setup.sh up

Эта команда запускает все контейнеры, можно писать постоянно, вместо docker-compose up -d

3. Для накатывания миграций и загрузки дампа

./docker/docker-setup.sh init

Эта команда сначала создает бд, если такая есть то дропает и потом создает, далее накатывает миграции и загружает дамп

4. Открытие проекта

Теперь ваш проект должен быть полностью настроен и 
доступен по локальному адресу http://localhost:8000.

Логин: admin
Пароль: test


***Чтобы скачивались станции****
update public.sale_railway_station SET station_type=2 WHERE station_name_short LIKE '%АЛМАТ%' OR station_name_short LIKE '%НУР-СУЛТА%'

            # Ошибка в npm  
            Module not found: Error: Can't resolve '/var/www/html/resources/js/app.js' in '/var/www/html'

-> решение сменить в файле webpack.mix.js

mix.js('public/js/app.js', 'public/js')
.postCss('public/css/app.css', 'public/css', []);

mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');

ошибка в том, что изначально указана директория resources,  в которой нету app.js и app.css
не найдены данные папки по данной директорий, они находятся в public
        #как установить tinymce

1)заходим в контейнер php 
2)запускаем команду composer require tinymce/tinymce и после npm install
3)добавить в webpack.min.js
mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
4)и следующая команда npx mix

