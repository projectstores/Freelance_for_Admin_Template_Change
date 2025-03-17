<div x-data="window.XnbzELJbXoSEFED" x-init="initialize()">

<?php

$hideHeaderFooter = session('hide_header_footer');

?>

    
    <button id="btn_cart" style="display:<?php if ($hideHeaderFooter == 'true') { echo 'none'; } else { echo 'display'; } ?>" x-on:click="cart_open = !cart_open" type="button" class="text-gray-500 hover:text-primary-600 dark:text-gray-100 dark:hover:text-white transition-colors duration-300 py-2 relative <?php echo e(auth()->check() ? 'md:mx-4' : 'ltr:ml-4 rtl:mr-4', false); ?>">
        <svg class="text-gray-400 hover:text-gray-700 h-6 w-6 dark:text-gray-100 dark:hover:text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path></g></svg>
        <?php if($cart): ?>
            <span class="flex absolute h-2 w-2 top-0 ltr:right-0 rtl:left-0 mt-0 ltr:-mr-1 rtl:-ml-1">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
            </span>
        <?php endif; ?>
    </button>

    
    <div @keydown.window.escape="cart_open = false" x-show="cart_open" style="display: none;" class="fixed inset-0 overflow-hidden z-50" x-ref="dialog" aria-modal="true" x-cloak>
        <div class="absolute inset-0 overflow-hidden">

            
            <div 
                x-show="cart_open"
                style="display: none;" 
                x-transition:enter="ease-in-out duration-500" 
                x-transition:enter-start="opacity-0" 
                x-transition:enter-end="opacity-100" 
                x-transition:leave="ease-in-out duration-500" 
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0" 
                class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="cart_open = false" aria-hidden="true">
            </div>

            
            <div class="pointer-events-none fixed inset-0 flex items-center justify-center">
                <div 
                    x-show="cart_open" 
                    style="display: none;"
                    x-transition:enter="transition ease-out duration-180 transform"
                    x-transition:enter-start="scale-75 opacity-0"
                    x-transition:enter-end="scale-100 opacity-100"
                    x-transition:leave="transition ease-in duration-180 transform"
                    x-transition:leave-start="scale-100 opacity-100"
                    x-transition:leave-end="scale-75 opacity-0"
                    class="pointer-events-auto w-screen max-w-xs lg:max-w-sm bg-white p-6 rounded-lg">
                    <div class="flex h-full flex-col bg-white dark:bg-zinc-700">
                        <div class="flex-1 overflow-y-auto overflow-x-hidden py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse">
                                <h2 class="text-base tracking-wide font-extrabold text-gray-900 dark:text-gray-200"> <?php echo e(__('messages.t_my_shopping_cart'), false); ?> </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500" @click="cart_open = false">
                                        <span class="sr-only">Close panel</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <?php if(count($cart)): ?>
                                <div class="mt-12">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200 dark:divide-zinc-600">

                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="flex py-6" wire:key="shopping-cart-nav-item-<?php echo e($key, false); ?>">
                                                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md">
                                                        <img src="<?php echo e($item['gig']['thumbnail'], false); ?>" alt="<?php echo e($item['gig']['title'], false); ?>" class="h-full w-full object-cover object-center">
                                                    </div>
                                                    <div class="ltr:ml-4 rtl:mr-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div class="flex justify-between text-sm font-medium text-gray-900 dark:text-white">
                                                                <h3 class="ltr:pr-2 rtl:pl-2 truncate max-w-[150px] lg:w-auto">
                                                                    <a href="<?php echo e(url('service', $item['gig']['slug']), false); ?>" target="_blank" class="hover:text-primary-600 font-bold truncate w-52 block"> <?php echo e($item['gig']['title'], false); ?> </a>
                                                                </h3>
                                                                <p class="ltr:ml-5 rtl:mr-5  font-black text-gray-500 dark:text-gray-300 pt-0.5"><?php echo money($this->itemTotalPrice($item['id']), settings('currency')->code, true); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-xs">
                                                            <p class="text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_quantity_number', ['number' => $item['quantity']]), false); ?></p>
                                                            <div class="flex">
                                                                <button type="button" wire:click="remove('<?php echo e($item["id"], false); ?>')" wire:loading.attr="disabled" wire:target="remove('<?php echo e($item["id"], false); ?>')" class="font-medium text-red-600 hover:text-red-500"> 

                                                                    
                                                                    <div wire:loading wire:target="remove('<?php echo e($item["id"], false); ?>')">
                                                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                        </svg>
                                                                    </div>

                                                                    
                                                                    <div wire:loading.remove wire:target="remove('<?php echo e($item["id"], false); ?>')">
                                                                        <?php echo e(__('messages.t_remove'), false); ?>

                                                                    </div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="py-14 px-6 text-center sm:px-14 border-2 border-dashed mt-24 dark:border-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-7 w-7 text-gray-400 dark:text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                                    <p class="mt-4 font-semibold text-gray-900 text-base dark:text-white"><?php echo e(__('messages.t_ur_cart_is_empty'), false); ?></p>
                                    <p class="mt-2 text-gray-500 text-sm font-normal dark:text-gray-300"><?php echo e(__('messages.t_ur_cart_is_empty_subtitle'), false); ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                        <?php if(count($cart)): ?>
                            <div class="border-t border-gray-200 dark:border-zinc-600 py-6 px-4 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900 dark:text-gray-200">
                                    <p><?php echo e(__('messages.t_subtotal'), false); ?></p>
                                    <p class="font-black"><?php echo money($this->total(), settings('currency')->code, true); ?></p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_tax_fees_calculated_at_checkout'), false); ?></p>
                                <div class="mt-6">
                                    <a href="<?php echo e(url('cart'), false); ?>" class="flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-primary-700"><?php echo e(__('messages.t_view_cart'), false); ?></a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500 dark:text-gray-300">
                                    <p>
                                        <?php echo e(__('messages.t_or'), false); ?> <button type="button" class="font-medium text-primary-600 hover:text-primary-600" @click="cart_open = false"><?php echo e(__('messages.t_continue_shopping'), false); ?><span aria-hidden="true"> →</span></button>
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function XnbzELJbXoSEFED() {
            return {
                cart_open: false,

                initialize() {
                    window.addEventListener('cart-updated', () => {
                        Livewire.emit('cart-updated')
                        this.cart_open = true;
                    });
                }
            }
        }
        window.XnbzELJbXoSEFED = XnbzELJbXoSEFED();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/partials/cart.blade.php ENDPATH**/ ?>