---
Le polymorphisme sans héritage
---
Le polymorphisme sans héritage est possible en PHP grâce à l'utilisation d'interfaces. Cela permet à différentes classes d'implémenter les mêmes méthodes définies dans une interface

```php
<?php

// Définir une interface
interface Animal {
    public function makeSound();
}

// Implémenter l'interface dans différentes classes
class Dog implements Animal {
    public function makeSound() {
        return "Woof!";
    }
}

class Cat implements Animal {
    public function makeSound() {
        return "Meow!";
    }
}

class Bird implements Animal {
    public function makeSound() {
        return "Chirp!";
    }
}

// Utilisation
$dog = new Dog();
$cat = new Cat();
$bird = new Bird();

```

### Avantages

- **Découplage** : Les classes ne dépendent pas d'une hiérarchie d'héritage complexe.
- **Flexibilité** : Permet à des classes non liées d'utiliser la même interface.
- **Interopérabilité** : Encourage la composition au lieu de l'héritage.