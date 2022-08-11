docker run --rm --interactive --tty \
  --volume $PWD:/usr/src/app \
  -w /usr/src/app \
  composer install
docker run --rm -it --name ffmpeg-test -v "$PWD":/usr/src/app -w /usr/src/app ffmpeg-php php test.php