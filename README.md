ApiParisBundle
==============

Api Paris Bundle for Symfony2


# Installation


### Step 1: Download ApiParisBundle using composer

Tell composer to require ApiParisBundle by running the command:

``` bash
$ php composer.phar require "jeandejean/apiparisbundle:dev-master"
```

Composer will install the bundle to your project's `vendor/jeandejean/apiparisbundle` directory.


## Step 2: Enable the bundle

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new JeanDeJean\Bundle\ApiParisBundle\JeanDeJeanApiParisBundle(),
    );
}
```

