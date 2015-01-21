<?php

namespace JeremyWorboys\ContainerAware;

use Illuminate\Container\Container;

trait ContainerAwareTrait
{
    /** @var \Illuminate\Container\Container */
    protected $container;

    /**
     * Set the Container.
     *
     * @param \Illuminate\Container\Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }
}
