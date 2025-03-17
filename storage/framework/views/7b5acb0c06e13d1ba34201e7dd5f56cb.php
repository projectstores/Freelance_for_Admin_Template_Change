
<div class="w-full px-2 sm:px-12 flex flex-col items-center">
    
    <div class="grid lg:grid-cols-2 shadow-xl transition-shadow border-gray-200 border rounded-lg">
        
        <div class="w-full bg-no-repeat bg-center bg-cover h-full rounded-tl-lg rounded-bl-lg flex flex-col items-center capitalize px-4" <?php if(settings('auth')->wallpaper): ?> style="background-image: url(<?php echo e(src(settings('auth')->wallpaper), false); ?>)" <?php endif; ?>>
        
            <div class="mt-14 mb-14 text-center">
            
                <h2 class="text-4xl font-black text-white">
    				<?php echo app('translator')->get('messages.t_welcome_back_2'); ?>
    			</h2>
            
                <span class="text-lg font-normal text-white mt-1 text-center">
    				<?php echo app('translator')->get('messages.t_we_are_happy'); ?>
    			</span>
            
            </div>
        
        </div>
    
        
        <div class="w-full flex flex-col items-center justify-center rounded-tr-lg rounded-br-lg bg-white">
            
            <div class="flex w-full items-center dark:bg-zinc-800 z-100 px-10">
                <div class="flex w-full max-w-sm flex-col justify-center p-5">

                	
                	<div class="text-center">
                		<div class="mt-4">
                			<span class="text-2xl font-black text-black dark:text-white">
                				<?php echo app('translator')->get('messages.t_reset_ur_password'); ?>
                			</span>
                			
                			<p class="text-sm mt-1 mb-2 font-normal text-black dark:text-gray-300">
                                <?php echo e(__('messages.t_reset_ur_password_subtitle'), false); ?>

                            </p>
                		</div>
                	</div>

                	
                	<div class="mt-6">
                		
                		
                		<?php if(session()->has('success')): ?>
                			<div class="mb-6 sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
                				<div class="rounded-md bg-green-100 p-4">
                					<div class="flex">
                						<div class="flex-shrink-0">
                							<svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/> </svg>
                						</div>
                						<div class="ltr:ml-3 rtl:mr-3">
                							<p class="text-sm font-medium text-green-800"><?php echo e(session()->get('success'), false); ?></p>
                						</div>
                					</div>
                				</div>
                			</div>
                		<?php endif; ?>
                
                		
                		<?php if(session()->has('error')): ?>
                			<div class="mb-6 sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
                				<div class="rounded-md bg-red-100 p-4">
                					<div class="flex">
                						<div class="flex-shrink-0">
                							<svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/> </svg>
                						</div>
                						<div class="ltr:ml-3 rtl:mr-3">
                							<p class="text-sm font-medium text-red-800"><?php echo e(session()->get('error'), false); ?></p>
                						</div>
                					</div>
                				</div>
                			</div>
                		<?php endif; ?>
                	
                		<div class="w-full relative">
                			
                        
                            <?php if(session()->has('error')): ?>
                                <div class="mb-6 sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
                                    <div class="rounded-md bg-red-100 p-4">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-red-400" x-description="Heroicon name: solid/x-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <div class="ltr:ml-3 rtl:mr-3">
                                                <p class="text-sm font-medium text-red-800"><?php echo e(session()->get('error'), false); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="px-4">

                                <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
                
                                    
                                    <div class="col-span-12">
                                        <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_email_address')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_email_address')),'model' => 'email','type' => 'email','icon' => 'at']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                                    </div>
            
                                    
                                    <div class="col-span-12 mt-2">
                                        <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'send','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_reset_password')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                                    </div>
                                    
                                    <a class="col-span-12 text-center w-full bg-gray-500 hover:bg-gray-600 text-white py-3 px-4 rounded-md text-bold font-bold tracking-wide" href="<?php echo e(url('auth/login'), false); ?>">
            							<?php echo app('translator')->get('messages.t_back_to_sign_in'); ?>	
            						</a>
            
                                </div>
                          
                                <div class="text-sm text-gray-500 mt-14">
                                    By joining, you agree to the <a href="<?php echo e(url('page', settings('footer')->terms->slug), false); ?>" class="capitalize underline"><?php echo e(settings('footer')->terms->title, false); ?></a> and to occasionally receive emails from us.
                                    Please read our <a href="<?php echo e(url('page', settings('footer')->privacy->slug), false); ?>" class="capitalize underline"><?php echo e(settings('footer')->privacy->title, false); ?></a> to learn how we use your personal data.
                                </div>
                
                            </div>

                		</div>
                
                	</div>
                
                </div>
            </div>
        </div>
    </div>
</div>


<div class="w-full relative md:pt-16">

    
</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/auth/password/reset.blade.php ENDPATH**/ ?>