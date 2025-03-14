### Hexlet tests and linter status:
[![Actions Status](https://github.com/AntonKorob/php-project-45/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/AntonKorob/php-project-45/actions)

<!-- бейджа CodeClimate -->
<a href="https://codeclimate.com/github/AntonKorob/php-project-45/maintainability"><img src="https://api.codeclimate.com/v1/badges/7c077c3cac503af316f8/maintainability" /></a>

<!-- Demo -->
<a href="https://asciinema.org/a/l40Lrk3midkLmNEOmgZErGnY7">Demo</a>

## Описание проекта

<p>"Brain Games" - это набор мини-игр, запускаемых из консоли. Эти игры построены по принципу популярных мобильных приложений для прокачки мозга. Каждая игра задает вопросы, на которые нужно дать правильные ответы. После трех правильных ответов считается, что игра пройдена. Неправильные ответы завершают игру и предлагают пройти ее заново.</p>

## Минимальные требования

- PHP 7.4+
- Composer

## Установка

1. Клонируйте репозиторий: git clone https://github.com/AntonKorob/php-project-45.git
2. Перейдите в директорию проекта:
   cd php-project-45
3. Установите зависимости:
   make install

## Запуск игр

- Игра: "Проверка на четность"
  make brain-even

- Игра: "Калькулятор"
  make brain-calc

- Игра: "НОД"
  make brain-gcd

- Игра: "Арифметическая прогрессия"
  make brain-progression

- Игра: "Простое ли число?"
  make brain-prime