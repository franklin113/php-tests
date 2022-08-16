docker run --rm --interactive --tty \
  --volume $PWD:/usr/src/app \
  -w /usr/src/app \
  php:8.1 php ./my_sql_tests.php