# Building Containers
Here is a list of containers used in this project.
- [ffmpeg-php](#ffmpeg-php)
### ffmpeg-php
```./ffmpeg-tests/Dockerfile```

This is the dockerfile that is used to build the `ffmpeg-php` container. It is based on the `php:latest` image, and installs ffmpeg. Install by running the below command inside that directory.
```
docker build -t ffmpeg-php .
```
____

# Docker Script Setup
Most of the tests can be run via docker containers. Here are a few commands that are 
often used in this repo-

### Install Composer Dependancies
```
docker run --rm --interactive --tty \
  --volume $PWD:/usr/src/app \
  -w /usr/src/app \
  composer install
```
This is essentially the same as running `composer install` on your local machine.

### Run script that uses FFmpeg ( with composer dependancies already installed )
```
docker run --rm -it \ 
  --name ffmpeg-test \
  -v "$PWD":/usr/src/app \
  -w /usr/src/app \
  ffmpeg-php \
  php test.php
```

This is essentially saying- 
Run the ffmpeg-php container, mount the current directory to the container, and run the test.php script.

# test
