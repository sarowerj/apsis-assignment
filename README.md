## Task Manager

Task manager application is built for apsis assignment. Please don't use for production level useses.

To run this application create a new database and set database configuration in `.env` file.

Then run below commands.

```
php artisan migrate
```

```
php artisan serve
```

To check the Scheduler, run below command.

```
php artisan schedule:run
```

You can find the sample database in public folder.

Enjoy

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
