<?php
trait HasName
{
    private $name;
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
}

trait ToString
{
    public function tostiring()
    {
        $arr = get_object_vars($this);
        return implode(',', $arr);
    }
    public function tostiringPrint()
    {
        $arr = get_object_vars($this);
        echo implode(',', $arr);
    }
}


trait ArrayAndJason
{
    public function asArray()
    {
        return get_object_vars($this);
    }
    public function asJason()
    {
        return json_encode($this->asArray());
    }
}


trait Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
