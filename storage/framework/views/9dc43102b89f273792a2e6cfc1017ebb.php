

<?php $__env->startSection('content'); ?>
    <div class="w-full">

        
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.loading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

        
        <div class="lg:grid lg:grid-cols-12">

            
            <aside class="lg:col-span-3 py-6 hidden lg:block bg-white shadow-sm border border-gray-200 rounded-lg dark:bg-zinc-800 dark:border-transparent" wire:ignore>
                <?php if (isset($component)) { $__componentOriginal897c321ee9b9bb967400e80c55835c23 = $component; } ?>
<?php $component = App\View\Components\Main\Account\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main.account.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Main\Account\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal897c321ee9b9bb967400e80c55835c23)): ?>
<?php $component = $__componentOriginal897c321ee9b9bb967400e80c55835c23; ?>
<?php unset($__componentOriginal897c321ee9b9bb967400e80c55835c23); ?>
<?php endif; ?>
            </aside>

            
            <div class="lg:col-span-9 lg:ltr:ml-8 lg:rtl:mr-8">

                
                <div class="w-full mb-16">
                    <div class="mx-auto max-w-7xl">
                        <div class="lg:flex lg:items-center lg:justify-between">
                
                            <div class="min-w-0 flex-1">
                
                                
                                <div class="mb-3 flex flex-col sm:flex-row sm:flex-wrap sm:space-x-6 rtl:space-x-reverse">
                                    <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                                        
                                        <li>
                                            <div class="flex items-center">
                                                <a href="<?php echo e(url('/'), false); ?>" class="text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-zinc-300 dark:hover:text-white">
                                                    <?php echo app('translator')->get('messages.t_home'); ?>
                                                </a>
                                            </div>
                                        </li>
                        
                                        
                                        <li aria-current="page">
                                            <div class="flex items-center">
                                                <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                                <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                                    <?php echo app('translator')->get('messages.t_my_projects'); ?>
                                                </span>
                                            </div>
                                        </li>
                        
                                    </ol>
                                </div>
                
                                
                                <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                                    <?php echo app('translator')->get('messages.t_edit_project'); ?>
                                </h2>
                                
                            </div>
                
                            
                            <div class="mt-5 flex justify-between lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">

                                
                                <span class="block">
                                    <a href="<?php echo e(url('project/' . $project->pid . '/' . $project->slug), false); ?>" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-500 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-500 focus:outline-none focus:ring-primary-600">
                                        <svg class="h-5 w-5 text-gray-500 ltr:mr-2 rtl:ml-2 dark:text-zinc-200" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M19 19H5V5h7V3H5a2 2 0 00-2 2v14a2 2 0 002 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"></path></svg>
                                        <?php echo e(__('messages.t_view_project'), false); ?>

                                    </a>
                                </span>
                    
                            </div>
                
                        </div>
                    </div>
                </div>

                
                <div class="w-full">
                    <div id="app">

                        
                        <?php
                            
                            // Set translations
                            $translations = [
                                't_project_title'                     => __('messages.t_project_title'),
                                't_project_description'               => __('messages.t_project_description'),
                                't_post_project_description_hint'     => __('messages.t_post_project_description_hint'),
                                't_choose_category'                   => __('messages.t_choose_category'),
                                't_post_project_category_hint'        => __('messages.t_post_project_category_hint'),
                                't_post_project_skills_hint'          => __('messages.t_post_project_max_skills_hint', ['max' => settings('projects')->max_skills]),
                                't_what_skills_are_required'          => __('messages.t_what_skills_are_required'),
                                't_how_do_u_want_to_pay'              => __('messages.t_how_do_u_want_to_pay'),
                                't_price_placeholder_0_00'            => __('messages.t_price_placeholder_0_00'),
                                't_min'                               => __('messages.t_min'),
                                't_max'                               => __('messages.t_max'),
                                't_budget'                            => __('messages.t_budget'),
                                't_fixed_price'                       => __('messages.t_fixed_price'),
                                't_hourly_price'                      => __('messages.t_hourly_price'),
                                't_days'                              => strtolower(__('messages.t_days')),
                                't_selected'                          => __('messages.t_selected'),
                                't_select'                            => __('messages.t_select'),
                                't_save_and_continue'                 => __('messages.t_save_and_continue'),
                                't_no_results_found'                  => __('messages.t_no_results_found'),
                                't_max_5_skills_allowed'              => __('messages.t_max_5_skills_allowed'),
                                't_validator_required'                => __('messages.t_validator_required'),
                                't_validator_required_title'          => __('messages.t_validator_max', ['max' => 100]),
                                't_toast_something_went_wrong'        => __('messages.t_toast_something_went_wrong'),
                                't_toast_select_at_least_5_skills'    => __('messages.t_toast_select_at_least_5_skills'),
                                't_back'                              => __('messages.t_back'),
                                't_invalid_price_format'              => __('messages.t_invalid_price_format'),
                                't_promotion'                         => __('messages.t_promotion'),
                                't_make_ur_project_premium'           => $settings->is_free ? __('messages.t_make_ur_project_premium_optional') : __('messages.t_make_ur_project_premium'),
                                't_home'                              => __('messages.t_home'),
                                't_my_projects'                       => __('messages.t_my_projects'),
                                't_post_new_project'                  => __('messages.t_post_new_project'),
                                't_total'                             => __('messages.t_total'),
                                't_post_project'                      => __('messages.t_post_project'),
                                't_toast_select_plan_to_post_project' => __('messages.t_toast_select_plan_to_post_project'),
                                't_max_project_price_must_be_greater' => __('messages.t_max_project_price_must_be_greater'),
                                't_toast_operation_success'           => __('messages.t_toast_operation_success'),
                                't_recaptcha_error_message'           => __('messages.t_recaptcha_error_message'),
                                't_update_project'                    => __('messages.t_update_project'),
                                't_max_allowed_skills_reached'        => __('messages.t_max_allowed_skills_reached')
                            ]
            
                        ?>
                        
                        
                        <edit-project 
                            _project='<?php echo json_encode($project, 15, 512) ?>'
                            categories="<?php echo e(json_encode($categories), false); ?>"
                            translations="<?php echo e(json_encode($translations), false); ?>"
                            plans="<?php echo e(json_encode($plans), false); ?>"
                            _settings="<?php echo e($settings, false); ?>"
                            currency_symbol="<?php echo e($currency_symbol, false); ?>"
                            is_recaptcha="<?php echo e(settings('security')->is_recaptcha, false); ?>"
                            recaptcha_site_key="<?php echo e(config('recaptcha.site_key'), false); ?>" />

                    </div>
                </div>

            </div>

        </div>
                    
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>

	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?php $__env->stopPush(); ?>
<?php echo $__env->make('livewire.main.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/account/projects/options/edit.blade.php ENDPATH**/ ?>