# SlashdotLabs site beta

Main site is built with Wordpress while the user and admin dashboards are built with Laravel.

## Site setup

After pulling the project, to setup the dashboard, change directory to dashboard ```cd dashboard```.
Run the following for dependencies:

```npm run install``` for js dependencies
```npm run dev``` to build mix files for codebase template

```composer install``` for php dependencies

### Wordpress side
You have to create your own ``wp-config.php`` from the sample file and put your own database
 credentials.

## Running the project on the browser
You can either use artisan server ```php artisan serve``` or run it from your server public_html
or htdocs.
