<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerKRHsz0j\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerKRHsz0j/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerKRHsz0j.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerKRHsz0j\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerKRHsz0j\App_KernelDevDebugContainer([
    'container.build_hash' => 'KRHsz0j',
    'container.build_id' => 'becd53a1',
    'container.build_time' => 1661917161,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerKRHsz0j');
