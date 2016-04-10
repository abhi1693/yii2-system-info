System/Server Information Helper
--------------------------------

[![Dependency Status](https://www.versioneye.com/user/projects/54e337edd1ec573c99000042/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54e337edd1ec573c99000042)
[![Code Climate](https://codeclimate.com/github/abhi1693/yii2-system-info/badges/gpa.svg)](https://codeclimate.com/github/abhi1693/yii2-system-info)
[![Latest Stable Version](https://poser.pugx.org/abhi1693/yii2-system-info/v/stable.svg)](https://packagist.org/packages/abhi1693/yii2-system-info) [![Total Downloads](https://poser.pugx.org/abhi1693/yii2-system-info/downloads.svg)](https://packagist.org/packages/abhi1693/yii2-system-info) [![Latest Unstable Version](https://poser.pugx.org/abhi1693/yii2-system-info/v/unstable.svg)](https://packagist.org/packages/abhi1693/yii2-system-info) [![License](https://poser.pugx.org/abhi1693/yii2-system-info/license.svg)](https://packagist.org/packages/abhi1693/yii2-system-info)

Provides information about your system/server. It automatically detects the type of system that you are using and 
provides you with appropriate information.

DONATE
------

Any contribution helps us to improve [Yii2 System Info](https://github.com/abhi1693/yii2-system-info), if you want to help us too but don't want to get into coding, we won't say no to PayPal

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4M2CDMWD7W3MS)
 
## Supported OS

- Windows
- Linux

## Methods

- getOS
- getKernelVersion
- getHostname
- getCpuModel
- getCpuVendor
- getCpuFreq
- getCpuArchitecture
- getCpuCores
- getLoad
- getUpTime
- getPhpVersion
- getServerName
- getServerProtocol
- getServerSoftware
- getTotalMemory

## Installation

Add System-Info to the require section of your **composer.json** file:

```php
{
    "require": {
        "abhi1693/yii2-system-info": "1.0.0"
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

## FAQ

#### `COM` not found

From `PHP 5.4.5`, `COM` is no longer built into the php core. You have to add `COM` support in `php.ini`:

```php
[COM_DOT_NET] 
extension=php_com_dotnet.dll 
```

Otherwise you will see this in your error log: `Fatal error: Class \'COM\' not found`

## Contribution

Contributing instructions are located in [CONTRIBUTING.md](CONTRIBUTING.md) file.
