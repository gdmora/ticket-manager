<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container9KRRLCi\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container9KRRLCi/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container9KRRLCi.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container9KRRLCi\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container9KRRLCi\App_KernelDevDebugContainer([
    'container.build_hash' => '9KRRLCi',
    'container.build_id' => '0137ac23',
    'container.build_time' => 1661916658,
], __DIR__.\DIRECTORY_SEPARATOR.'Container9KRRLCi');
