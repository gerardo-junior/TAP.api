# API Rest of twitter analytics panel


```
    [+] AUTOR:        Gerardo Junior
    [+] SITE:         http://gerardo-junior.com
    [+] EMAIL:        me@gerardo-junior.com
    [+] GITHUB:       https://github.com/gerardo-junior/tap.api
    [+] TELEGRAM:     @MrGerardoJunior
```

| master  | develop  |
| :------------: | :------------: |
| [![Build Status](https://api.travis-ci.org/gerardo-junior/TAP.api.svg?branch=master)](https://travis-ci.org/gerardo-junior/TAP.api)  |  [![Build Status](https://api.travis-ci.org/gerardo-junior/TAP.api.svg?branch=develop)](https://travis-ci.org/gerardo-junior/TAP.api) |

## Come on, do your tests

#### But what will you need?

- [docker](https://docs.docker.com/install/)
- [docker-compose](https://docs.docker.com/compose/)

#### Okay, how to put it to up?

First clone of the project
```bash
git clone https://github.com/gerardo-junior/tap.api.git
cd tap.api
```


Copy the configuration file, and edit
```bash
cp config.example.ini config.ini # and configure!
```


ready, now you can use ;)

to access the api:
```bash
docker-compose up
# Wait for message and open http://localhost:1234 in your browser
```

or use the cli
```bash
docker-compose run api php console
```

** For more information about the containers read the [README](http://github.com/gerardo-junior/TAP.api.environment) of api.environment

#### How to delete used images

```bash
docker-compose down --rmi all
```


## Run without docker:

you will need to install:

- [mongodb](https://www.mongodb.com/) 3.6.4
- [php](https://php.net): 7.2.5 
- [apache](https://www.apache.org/): 2.4.33
- [php mongodb driver](https://docs.mongodb.com/ecosystem/drivers/php/): 1.4.3
- [phalcon](https://phalconphp.com/): 3.3.2
- [composer](https://getcomposer.org/): 1.6.5

and configure apache for [/public](/public) folder

## Used packages:

- [redound/phalcon-rest](https://packagist.org/packages/redound/phalcon-rest): ^2.0.0
- [phalcon/incubator](https://packagist.org/packages/phalcon/incubator): "3.3
- [league/fractal](https://packagist.org/packages/league/fractal): ^0.13.0
- [cboden/ratchet](https://packagist.org/packages/cboden/ratchet): ^0.4.1
- [zircote/swagger-php](https://packagist.org/packages/zircote/swagger-php): ^2.0
- [spatie/twitter-streaming-api](https://packagist.org/packages/spatie/twitter-streaming-api): ^1.4

for development environment:

- [codeception/codeception](https://packagist.org/packages/codeception/codeception): ^2.1
- [overtrue/phplint](https://packagist.org/packages/overtrue/phplint): ^1.1
- [brainmaestro/composer-git-hooks](https://packagist.org/packages/brainmaestro/composer-git-hooks): ^2.4
- [phalcon/devtools](https://packagist.org/packages/phalcon/devtools): ^3.2

## Troubleshooting

- Is the port already used by other services?

edit the file [docker-compose.yml](docker-compose.yml)
```yml
# (...)

api: 
  image: gerardojunior/tap.api.environment:stable
  restart: on-failure
  volumes:
    - type: bind
      source: ./
      target: /usr/share/src
  ports:
    - [any door]:80
    - [any door]:8080
  links:
    - mongodb
  depends_on:
    - mongodb

# (...)
```

### License  
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
