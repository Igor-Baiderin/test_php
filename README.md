# Тестовое задание

Напишите скрипт, который перечисляет папку с текстовыми файлами в разметке Markdown и формирует панель инструментов статьи в виде таблицы, как показано на скриншоте 'table.png' (с фильтрами и поиском). Когда вы нажимаете кнопку «Изменить», вы переходите к текстовому редактору для статьи. Примеры файлов статей с расширением .md прилагаются.

Ограничение по времени: не более 5 часов (что сделано, то сделано).

Технические требования: PHP7, ES6, решение должно быть представлено в виде Docker-контейнера.

Реализация:
- Создан скрипт формирования таблицы согласно заданию
- Колонка статус и номер записи статичны, поскольку непонятно откуда их брать
- Кнопка UNPUBLISH относиться к вышесказанному, действие на нее не повешено 
- Фильтрация организована средаствами JS
- Редактор статей для простоты сделан штатными средствами HTML
- Запись изменений в файл и закрузка чере API на бекэнде.
- По времени не уложился, извините, все-таки я привык немного к другому стеку.

# Итого

Задание выполнено, единственно без уточнающих консультаций, но была цель при постановки задачи оценить качество кода, что и представлено, согласно в с функционалом

## Запускаем Docker

docker-compose up -d

Доступ в браузере: localhost:8080

# Для быстрой проверки из каталога проверки запустите php -S localhost:8000
