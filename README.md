# JellyPlot - First steps
Welcome to JellyPlot
This documentation have been made in order to help developers. If you are an administrator please go to the  _JellyPlot - Help Center_. 
Any doubt or inquire will be resolved contact us directly in [support@jellyplot.com](mailto:support@jellyplot.com) or using your admin report system.

## JellyPlot Core and Technology 

This Planner is based in [Laravel](https://laravel.com) a Full Open Source PHP framework. 
Before start configuration please read the [Laravel Documentation](https://laravel.com/docs/) in order to understand the Laravel Projects Structure.

This are most essencial things you need to be familiar:
- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Installation
To install JellyPlot you need to have Docker installed in your environment

    //Clone the repository
    $ git clone https://github.com/ldvloper/jellyplot.git

    //Go to the folder 
    $ cd jellyplot
    
    //Configure a Bash alias that allows you to execute Sail's commands more easily
    $ alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
    
    //Execute Sail commands by simply typing sail
    $ sail up

    //Install composer dependecies 
    $ sail composer install
    $ sail composer update

    //Run the database migrations
    $ sail artisan migrate | sail debug migrate
    
    //Run the node_modules
    $ sail npm install
    $ sail npm run dev 


## Configuration
### Environment 
Take a look the **.env.example** file and use it as a model. Copy the file to the root directory and rename it to **.env**. 
You need to change your ServerName, DB connexion, SMTP email service, etc.

    APP_NAME=Jellyplot
    APP_COMPANY="Jellyplot©"
    
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost
    
    APP_ADMIN_NAME="Administrator"
    APP_ADMIN_EMAIL="admin@jellyplot.com"
    APP_ADMIN_PSW="admin"
    
    APP_FORTIFY_REGISTER=true
    APP_FORTIFY_EMAIL_VERIFICATION=true
    APP_FORTIFY_PASSWORD_RESET=true
    APP_FORTIFY_UPDATE_PROFILE_INFORMATION=true
    APP_FORTIFY_UPDATE_PASSWORDS=true
    APP_FORTIFY_CONFIRM_PASSWORD=false
    
    LOG_CHANNEL=stack
    LOG_LEVEL=debug
    
    DB_CONNECTION=pgsql
    DB_HOST=pgsql
    DB_PORT=5432
    DB_DATABASE=jellyplot
    DB_USERNAME=root
    DB_PASSWORD=
    
    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DRIVER=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=database
    SESSION_LIFETIME=120
    
    MEMCACHED_HOST=127.0.0.1
    
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    
    MAIL_MAILER=smtp
    MAIL_HOST=
    MAIL_PORT=587
    MAIL_USERNAME=
    MAIL_PASSWORD=""
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=
    MAIL_FROM_NAME="${APP_NAME}"
    
    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false
    
    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=mt1
    
    MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
    
    OAUTH_APP_ID=
    OAUTH_APP_SECRET=
    OAUTH_REDIRECT_URI=
    OAUTH_SCOPES=
    OAUTH_AUTHORITY=
    OAUTH_AUTHORIZE_ENDPOINT=
    OAUTH_TOKEN_ENDPOINT=
    
    APP_PRIMARY_COLOR="7f63e5"
    APP_PRIMARY_LIGHT_COLOR="7938f2"
    APP_SECONDARY_COLOR="333333"
    
    APP_PRIMARY_COLOR_SIMPLE="indigo"
    APP_SECONDARY_COLOR_SIMPLE="gray"
    
    APP_ICON="img/favicon.png"
    APP_ICON_CLASS="h-24"
    APP_ICON_STYLE=""


### Spaces Configuration
Laravel Jetstream Teams is a powerful tool. Jellyplot use it as a Department management and section 


### Test the Planner

When the JellyPlot Planning is configured please test your system before deploy to the server you can use our artisan commands*

*Available Soon

## Contributing

Thank you for considering contributing to the JellyPlot Planner! If you need more information please contact the repo owner.

## Security Vulnerabilities

If you discover a security vulnerability within Jellyplot, please send an e-mail to the actual administrator via [luigelo@ldvloper.com](mailto:luigelo@ldvloper.com). All security vulnerabilities will be promptly addressed.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
