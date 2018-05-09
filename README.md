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
| [![Build Status](https://api.travis-ci.org/gerardo-junior/tap.api.svg?branch=master)](https://travis-ci.org/gerardo-junior/tap.api)  |  [![Build Status](https://api.travis-ci.org/gerardo-junior/tap.api.svg?branch=develop)](https://travis-ci.org/gerardo-junior/tap.api) |

## Come on, do your tests

##### But what will you need?

- [docker](https://docs.docker.com/install/)
- [docker-compose](https://docs.docker.com/compose/)

or 

- [docker toolbox](https://docs.docker.com/toolbox/)

##### Okay, how to put it to up?

```bash
git clone https://github.com/gerardo-junior/tap.api.git
cd tap.api

cp config.example.ini config.ini # and configure!
docker-compose up
```

Open 0.0.0.0:1234 in your browser

## Used packages:

- [redound/phalcon-rest](https://packagist.org/packages/redound/phalcon-rest): ^2.0.0
- [league/fractal](https://packagist.org/packages/league/fractal): ^0.13.0
- [cboden/ratchet](https://packagist.org/packages/cboden/ratchet): ^0.4.1
- [zircote/swagger-php](https://packagist.org/packages/zircote/swagger-php): ^2.0
- [spatie/twitter-streaming-api](https://packagist.org/packages/spatie/twitter-streaming-api): ^1.4

for development environment:

- [codeception/codeception](https://packagist.org/packages/codeception/codeception): ^2.1
- [overtrue/phplint](https://packagist.org/packages/overtrue/phplint): ^1.1
- [brainmaestro/composer-git-hooks](https://packagist.org/packages/brainmaestro/composer-git-hooks): ^2.4
- [phalcon/devtools](https://packagist.org/packages/phalcon/devtools): ^3.2


### License  
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
