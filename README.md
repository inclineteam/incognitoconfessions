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

-   Create an environt file `.env`
-   Copy `.env.example`'s content and paste it in the environment file
-   Run `npm install` to install dependencies
-   Run `npm run dev` to start laravel
-   Run `php artisan serve` to start the localhost

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

## Authors

-   Percival Ian Muico
-   Ishmael Cascabel
-   John Aeron Sencil

## Version History

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