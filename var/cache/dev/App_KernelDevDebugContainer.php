<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerZXricFp\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerZXricFp/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerZXricFp.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerZXricFp\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerZXricFp\App_KernelDevDebugContainer([
    'container.build_hash' => 'ZXricFp',
    'container.build_id' => '71a576f9',
    'container.build_time' => 1712667048,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerZXricFp');
