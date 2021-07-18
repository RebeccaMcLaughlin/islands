## Islands

### Installation

This application uses Laravel but does not require a Docker file since there is no database. The application runs on the command line.

#### Install Laravel

`composer install`

Then copy the .env.example file to .env

#### Run on the command line

`php artisan:island`

## Method

Probably over-designed. Bootstraps a service that generates islands and adds unit tests to verify length.

Island checker works as follows:
- Perform a depth based traversal of the array
- Determine if previous or next items in the column are 1's if the item is also a 1
- Determine if the previous row of items in the current column are 1's.
- No diagonal match is required
- Mark each island as visited (An empty string or -1 should do) as we traverse the array.
- The number of calls to dfs where an item == 1 (After DFS has combed the array and updated visited nodes) should be the resulting count of islands.

Added both a command and web endpoint that returns json (In hindsight I should have used the API endpoint for this, but it's mostly so there are two ways to access this).

Added a GitHub workflow and unit testing as well as git flow for flavour. As a result this went over two hours, but the setup indicates how I would normally spin up a project on a larger scale. The folders and directory structure are something I'm not entirely keen on since if I were to split a large application up over several sub-directories, I might go for a modular structure such as `Modules/Islands/Controllers, Modules/Islands/Services` etc. It really does depend on the size of the project here.

As a footnote, I also hate the copout at the end of adding a new item to the array just to visually show the island map. I would have rather shown the map in the command line output, line by line and then show the result. In fact, I think I'll do that now.

## Files authored by me

`.github/workflows/develop.yml`
`./app/Console/Commands/Islands/Island.php`
`./app/Http/Controllers/IslandController.php`
`./app/Providers/Islands/IslandProvider.php`
`./app/Services/Islands/IslandChecker.php`
`./app/Services/Islands/IslandGenerator.php`
`./tests/Unit/Islands/ArrayCheckerTest.php`
`./tests/Unit/Islands/IslandGeneratorArrayTest.php`
