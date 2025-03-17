<?php
    $tag = $href ? 'a' : 'button';

    $defaultAttributes = [
        'wire:loading.attr'  => 'disabled',
        'wire:loading.class' => '!cursor-wait',
        'wire:target'        => ($spinner && strlen($spinner) > 1) ? $spinner : null,
    ];

    $href === null
        ? $defaultAttributes['type'] = 'button'
        : $defaultAttributes['href'] = $href;
?>

<<?php echo e($tag, false); ?> <?php echo e($attributes->merge($defaultAttributes), false); ?>>
    <?php if($icon): ?>
        <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => $icon,'class' => ''.e($iconSize, false).' shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php echo e($label ?? $slot, false); ?>


    <?php if($rightIcon): ?>
        <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => $rightIcon,'class' => ''.e($iconSize, false).' shrink-0','wire:loading.remove' => (bool) $spinner]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if($spinner): ?>
        <svg class="animate-spin <?php echo e($iconSize, false); ?> shrink-0"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            <?php if(preg_replace('/[^a-zA-Z]+/', '', $spinner)): ?>
                wire:target="<?php echo e($spinner, false); ?>"
            <?php endif; ?>
            wire:loading.delay<?php echo e($loadingDelay ? ".{$loadingDelay}":'', false); ?>>
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    <?php endif; ?>
</<?php echo e($tag, false); ?>>
<?php /**PATH C:\xampp_8.2\htdocs\Freelancer_Work\Freelancer_Work_New\resources\views/vendor/wireui/components/button.blade.php ENDPATH**/ ?>