
# Magento 2 Cookie Notice

This Magento 2 extension adds a notice telling visitors that your store uses cookies.<br /><br />
Tbe banner can be displayed in two different positions.<br /><br />
It contains a short sentence, three buttons - read more, accept cookies and close button (x).<br />
It is possible to display store logo above the sentence.<br /><br />

The banner is customizable, below are listed available settings.

> Functional settings:

- enable/disable banner
- cookie lifetime in seconds

- Close button
  - enable/disable button
  - possible click results: hide banner and accept cookies / just hide the banner
  
- Read more button
  - enable/disable button
  - possible click results: open linked page / display content of static block below the buttons (loaded in real-time with enabled loader)

> Design settings:

- banner position - top or bottom area of each page
- logo - if enabled, it will be displayed above the sentence
- customisations to read more and accept cookies buttons
  - select font color (separately for hover state)
  - select background color (separately for hover state)
  - border width and color

> Content:

- editable sentence
- editable text of “read more” and “accept cookies" buttons

<br /><br />

 > Rakuten integration

I have installed this extension as a part of the integration with Rakuten (rakuten.com) - see Rakuten's documentation part where window.__rmcp = [1,2,3,4,5] is required.
However, the extension can be installed in any case.

# Screenshots

<br />

Store:<br /><br />

![magento-2-cookie-banner](https://user-images.githubusercontent.com/7327076/68532163-74183d00-031a-11ea-8945-5b358dd39603.png)

<br /><br />

![magento-2-cookie-banner-2](https://user-images.githubusercontent.com/7327076/68532167-7c707800-031a-11ea-9861-014d8b849653.png)

<br /><br />

![magento-2-cookie-banner-3](https://user-images.githubusercontent.com/7327076/68532166-7c707800-031a-11ea-9af9-82d0d5e96e1f.png)

<br /><br />

![magento-2-cookie-banner-4](https://user-images.githubusercontent.com/7327076/68532170-7d090e80-031a-11ea-875d-dccd462256f2.png)

<br /><br />

Magento 2 admin:

<br /><br />

![magento-2-cookie-banner-5](https://user-images.githubusercontent.com/7327076/68532169-7c707800-031a-11ea-923d-e9074098e282.png)

<br /><br />

# Installation

Pull in the extension through Composer:

```php
composer require "mikielis/magento2-module-cookie-banner-rakuten:*"
```

OR<br />

download zipped extension and add its files to [magento root directory]/app/code/Mikielis/Cookie directory and follow listed steps from official guide:
https://devdocs.magento.com/guides/v2.3/comp-mgr/install-extensions.html
