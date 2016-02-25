# RBUserBundle :

User pour RB en version Alphass

## routing :
```
rb_user:
    resource: "@RBUserBundle/Controller/"
    type:     annotation
    prefix:   /u
```

## config :
```
    - { resource: "@RBUserBundle/Resources/config/services.yml" }
```

## AppKernel.php :
```
 public function registerBundles()
    {
        $bundles = [
           ...
            new RB\UserBundle\RBUserBundle(),
```