## Islands

### Installation

This application uses Laravel but does not require a Docker file since there is no database. The application runs on the command line.

#### Install Laravel

`composer install`

#### Run on the command line

`php artisan:island`

## Method

Probably over-designed. Bootstraps a service that generates islands and adds a unit test to verify length.

## Files authored by me

`./app/Services/Islands/IslandGenerator.php`
`./app/Services/Islands/IslandChecker.php`
`./app/Console/Commands/Islands/Island.php`
`./app/Providers/Islands/IslandProvider.php`
`./tests/Unit/Islands/IslandGeneratorArrayTest.php`