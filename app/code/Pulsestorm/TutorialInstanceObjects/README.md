##Instance objects

**Shared/Unshared, Singleton/Instance**

The create method will instantiate a new object each time it’s called. The get method will instantiate an object once, and then future calls to get will return the same object.

```//...
   use Pulsestorm\TutorialInstanceObjects\Model\Example;
   //...
   public function __construct(Example $example)
   {
       //is $example created with `get` or `create`?
       $this->example = $example?
   }
```
By default, **all objects created via automatic constructor dependency injection are “singleton-ish” objects** — i.e. they’re created via the object manager’s get method.

If you want a **new** instance of an object, i.e. you want the object manager to use create, you’ll need to add some additional <type/> configuration to your module’s di.xml file.

```<!-- File: app/code/Pulsestorm/TutorialInstanceObjects/etc/di.xml --> 
   <config>
       <!-- ... -->
       <type name="Pulsestorm\TutorialInstanceObjects\Model\Example" shared="false">
           <!-- ... arguments/argument tags here if you want to change injected arguments -->
       </type>
   </config>
```

_magento/framework/ObjectManager/Factory/AbstractFactory.php_
protected function resolveArgument
```
if ($isShared) {
                $argument = $this->objectManager->get($argumentType);
            } else {
                $argument = $this->objectManager->create($argumentType);
            }
```

**Injectable and Non-Injectable Objects in Magneto 2**

The choice of whether to pass in an object or a factory (a class with a method to create an object) boils down to whether your application needs to supply data (like a product ID) to the object when it is created. An injectable is an object that can be passed directly to the constructor (like a database connection instance) and a non-injectable is a class where a new instance is created based on data inside the code being executed (like a product ID). So non-injectables implies the usage of a factory which typically has a create() function to create a new object instance, taking the data as parameters.

Non-injectable objects are simply objects that have an identity, for example, this could be orders, cart items, users and so on so forth. If you want to use non-injectable items in your code you must request their factory. An example of this could be trying to load numerous products. Your code then will be subject to product factory and with that object you would use the ObjectManager method for the identity of the products that you are trying to load.

Injectable objects, on the other hand, will show the dependencies in their constructors. You can form them using the object manager and configuration in the di.xml file. You can also use their injectable objects to demand other injectable facilities in the constructors.

**Useful liks**

[DI devdocs](http://devdocs.magento.com/guides/v2.1/extension-dev-guide/depend-inj.html)

[When inject a factory class (stackoverflow)](https://magento.stackexchange.com/questions/167501/which-one-to-use-factory-or-direct-model-class-in-magento-2)

[Working With Models Part - Factory (coolRyan)](http://www.coolryan.com/magento/2016/02/10/working-models-magento-2/)

[Instance Objects (AlanStorm)](http://alanstorm.com/magento_2_object_manager_instance_objects/)

[Magento DI (AlanKent)](https://alankent.me/2014/06/07/magento-2-dependency-injection-the-m2-way-to-replace-api-implementations/)

[What are the ObjectManager Factories differences? (stackoverflow)](https://magento.stackexchange.com/questions/120965/what-are-the-objectmanager-factories-differences)
