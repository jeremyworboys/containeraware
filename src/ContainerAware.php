<?php

namespace JeremyWorboys\ContainerAware;

use Illuminate\Container\Container;

interface ContainerAware
{
    /**
     * Set the Container.
     *
     * @param \Illuminate\Container\Container $container
     */
    public function setContainer(Container $container);
}
