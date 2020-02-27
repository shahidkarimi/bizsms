# bizsms.pk SMS Serivice

# How to install

To install follow these steps

1- Install `composer install shahidkarimi/bizsms`

2- Publish vendor `php artisan vendor:publish`

3- Change config `config/bizsms.php` with your bizsms.pk credentials


# Confgiure

1- Add this to config/app.php `BizsmsServiceProvider::class`

2- Add this alias `bizsms => BizsmsServiceProvider::class`

# How to use?
## 1- By Global Function

`bizsms::send('0346123456', 'SMS Body');`

## 2- By adding SmsNotifiable Trait to User.php
The easiest way to send sms to a user is just using the SmsNotifiable Trait in user user class as 

```
class User extends Authenticatable
{
    use SmsNotifiable;
}
```

Sending SMS
`$user->notifyBySms("Hello sir");`

