<?php

namespace JeremyWorboys\ContainerAware;

use Illuminate\Container\Container;
use PHPUnit_Framework_TestCase;
use ReflectionMethod;

class MethodArgumentResolverTest extends PHPUnit_Framework_TestCase
{
    /** @var \Illuminate\Container\Container */
    protected $container;

    /** @var \JeremyWorboys\ContainerAware\MethodArgumentResolver */
    protected $resolver;

    /** @var ReflectionMethod */
    protected $reflection;

    public function setUp()
    {
        $this->container = new Container();
        $this->resolver = new MethodArgumentResolver($this->container);
        $this->reflection = new ReflectionMethod(new DummyClass(), 'test');
    }

    /** @test */
    public function passesADefinedParameterThrough()
    {
        $result = $this->resolver->resolve($this->reflection);

        $this->assertInstanceOf('stdClass', $result[0]);
        $this->assertEquals([], $result[1]);
    }

    /** @test */
    public function resolvesAClassInstanceFromTheContainer()
    {
        $result = $this->resolver->resolve($this->reflection, ['bar' => 'jeremy']);

        $this->assertInstanceOf('stdClass', $result[0]);
        $this->assertEquals('jeremy', $result[1]);
    }
}

class DummyClass
{
    public function test(\StdClass $foo, $bar = []) { return func_get_args(); }
}
