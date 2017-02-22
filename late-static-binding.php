<?php
class A {
    static $staticString = "A static string";
    public static function staticFunction() {
        echo self::$staticString;
    }
    public static function foo() {
        echo __CLASS__."\n";
    }
    public static function selfFoo() {
        var_dump(get_called_class());
        echo self::foo();
    }
    public static function staticFoo() {
        var_dump(get_called_class());
        echo static::foo();
    }
}
class B extends A {
    static $staticString = "B static string";
    public static function foo() {
        echo __CLASS__;
    }
    public static function parent() {
        parent::selfFoo();
        parent::staticFoo();
    }
}
class C extends B {
    public static function foo() {
        echo __CLASS__;
    }

}
B::selfFoo();
B::staticFoo();
C::parent();
