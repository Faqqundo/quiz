# quiz

##Procedura uruchomienia

git clone git@github.com:Faqqundo/quiz.git

cd quiz

composer install

php -S localhost:8080 -t document_root


##Testy jednostkowe:

cd test

phpunit .


##Pokrycie kodu:

cd test

phpunit --coverage-html ../docs .