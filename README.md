# Incognito-Confessions

A laravel test build by Incline Start-up Agency. Testing Git and framework functions.

## Description

A laravel starter for future team project. Anyone is open to use this laravel template for personal and commercial use.

## Getting Started

### Dependencies

-   Composer
-   Node
-   XAMPP

### Installation

-   Create an environment file `.env`
-   Copy `.env.example`'s content and paste it in the environment file
-   Run `npm install` to install dependencies

### Authentication

-   For sending email (Gmail), you need to enable 2-factor verification and create an app password
-   Add this on "smtp" inside `config/mail.php`

```
'driver' => env('MAIL_DRIVER', 'smtp'),
'from' => ['address' => '<gmail-address>', 'name' => 'Do Not Reply'],
'sendmail' => '/usr/sbin/sendmail -bs',
```

-   Then add your gmail address, and app password inside the `.env`

```
MAIL_USERNAME=<gmail-address>
MAIL_PASSWORD=<app-password>
MAIL_FROM_ADDRESS=<gmail-address>
```

-   Then run these 2 commands

```
php artisan config:cache
php artisan config:clear
```

-   Create GitHub, Google, and Facebook client id, and secret. Follow this format for each provider inside `config/services.php`

```
'<provider>' => [
    'client_id' => env('<PROVIDER>_CLIENT_ID'),
    'client_secret' => env('<PROVIDER>_CLIENT_SECRET'),
    'redirect' => 'http://localhost:8000/auth/callback/<provider>',
],
```

### Recaptcha
-   Go to google's recaptcha and create a new project there for captcha and obtain your secret key and site key

-   Then add secret key and site key inside the `.env`

```
NOCAPTCHA_SECRET=<secret-key>
NOCAPTCHA_SITEKEY=<site-key>
```

-   Then run this command

```
php composer install
```

-   Then youre ready to go

### Database

-   Change the name of the database inside the `.env` or create a database called incognito_confessions on your mysql database

#### Example

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=incognito_confessions
DB_USERNAME=root
DB_PASSWORD=admin
```

-   Execute these commands once done

```
php artisan migrate

php artisan migrate:refresh 

php artisan migrate:refresh --seed // optional
```

-   Then you are all set to go just execute these commands in two different terminals to run the project

```
npm run dev
php artisan serve
```
## Authors

-   Percival Ian Muico
-   Ishmael Cascabel
-   John Aeron Sencil

## Version History
-   0.6
    -   Added security ( #Recaptcha )
    
-   0.5
    -   Create, Update, and Delete Confessions

-   0.4
    -   Authentication
    -   Added Home Dashboard and Confessions Page
    -   Search bar
-   0.3
    -   Added card components
    -   Changed default landing page
-   0.2
    -   Laravel framework installation
    -   Tailwind CSS installation
    -   Landing page initial commit
-   0.1
    -   Initial build

## License

This project is licensed under the General Public License - see the LICENSE.md file for details

## Acknowledgments

Inspiration, code snippets, etc.

-   [Ishmael Casky](https://github.com/IshmaelCasky)
-   [John Aeron Sencil](https://github.com/iamaeron)
-   [Harold Martin Patacsil](https://github.com/yskooo)