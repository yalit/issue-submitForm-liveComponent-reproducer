# Objectives

The target of this is to reproduce the error described in the [following issue](https://github.com/symfony/ux/issues/2512)

## How to

1. clone the repo
2. install composer dependencies
3. run bin/phpunit
    -> there should be a debug containing only 1 key->value in the participants table when it's provided 2 in the submitForm in the test
