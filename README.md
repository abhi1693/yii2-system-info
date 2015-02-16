System/Server Information Helper
--------------------------------

[![Code Climate](https://codeclimate.com/github/abhi1693/system-info/badges/gpa.svg)](https://codeclimate.com/github/abhi1693/system-info)
[![Latest Stable Version](https://poser.pugx.org/abhi1693/system-info/v/stable.svg)](https://packagist.org/packages/abhi1693/system-info) [![Total Downloads](https://poser.pugx.org/abhi1693/system-info/downloads.svg)](https://packagist.org/packages/abhi1693/system-info) [![Latest Unstable Version](https://poser.pugx.org/abhi1693/system-info/v/unstable.svg)](https://packagist.org/packages/abhi1693/system-info) [![License](https://poser.pugx.org/abhi1693/system-info/license.svg)](https://packagist.org/packages/abhi1693/system-info)

Provides information about your system/server. It automatically detects the type of system that you are using and 
provides you with appropriate information.
 
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
- getLoad
- getUpTime

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

## Contribution

Contributing instructions are located in [CONTRIBUTING.md](CONTRIBUTING.md) file.
