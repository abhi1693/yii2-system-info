System/Server Information Helper
--------------------------------

Provides information about your system/server. It automatically detects the type of system that you are using and 
provides you with appropriate information.
 
## Supported OS

- Windows

## Methods

- getHostname

## Installation

Add System-Info to the require section of your **composer.json** file:

```php
{
    "require": {
        "abhi1693/system-info": "*"
    }
}
```

And run following command to download extension using **composer**:

```bash
$ php composer.phar update
```

## Usage

```php
// Get the class to work with the current operating system
$system = SystemInfo::getInfo();

// Captain Obvious was here
$system::getHostname();
```
