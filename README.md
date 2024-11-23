# Starter Kit for Laravel Project

## Installation

### Laravel
Require this package in your composer.json and update composer. This will download the package.


    composer require susheelbhai/larameet

## Configuration

Update ASSET_URL in .env file

  ```
  ASSET_URL=http://127.0.0.1:8000/storage
  ```

Please install btoadcasting by using the following command before moving further

  ```
  php artisan install:broadcasting
  ```

### install Laravel Reverb
>install and build the Node dependencies required for broadcasting
>run below commant to create build
  ```
  npm run build
  ```
>copy build file from public folder to public_html folder and public_html/storage
        

### Vendor Publish

Publish all the required files using the following command 

  ```
  php artisan vendor:publish --tag="larameet" --force 
  ```  


### Migrate database

Migrate  databse tables and seed with the following commands

  ```
  php artisan migrate  
  ```

### Add code in channel.php
  ```
  use App\Models\User;
  use Illuminate\Support\Facades\Broadcast;

  Broadcast::channel('chat.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id || User::find($id)->id;
  });
  ```
  copy & paste above code to route/channel.php file


### License

This Laravel Starter Kit Package is developed by susheelbhai for personal use software licensed under the [MIT license](http://opensource.org/licenses/MIT)
