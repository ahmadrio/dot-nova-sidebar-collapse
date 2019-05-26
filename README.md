# DOT Nova Sidebar Collapse

I'm create from laravel-Nova v2 and this support Laravel Nova v2++

### Install:

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer install opanegro/dot-nova-sidebar-collapse
```

To publish the views nova override navigation and config file run:

```bash
php artisan vendor:publish --tag=dot-nova-sidebar-collapse-views
```

```bash
php artisan vendor:publish --tag=dot-nova-sidebar-collapse-config
```

Then you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php

use Opanegro\DotNovaSidebarCollapse\DotNovaSidebarCollapse;

// ...

public function tools()
{
    return [
        // ...
        new DotNovaSidebarCollapse(),
    ];
}
```

Add `$category` and `$icon` in file `app/Nova/User.php`:

`$icon` just add one in `resources`

```php
class User extends Resource
{
    public static $category = 'Management Users';
    
    /** optional */
    public static $icon = '[...svg icon...]';
}
```

You can add `svg icon` from [zondicons](http://www.zondicons.com/icons.html)

Usage the svg icon:

- download zondicons and open `*.svg` icon in browser
- `[right click]` in browser and choose `inspect element`
- copy tag svg to variable `$icon`
- add class in `<svg class="sidebar-icon">`
- add fill in `<path fill="var(--sidebar-icon)">`

### Inspiration By:

- Group and categorise your nova resources - [alexbowers](https://github.com/alexbowers/nova-categorise-resources)

### Credit By:

- [DOT Indonesia](https://www.dot.co.id/)
