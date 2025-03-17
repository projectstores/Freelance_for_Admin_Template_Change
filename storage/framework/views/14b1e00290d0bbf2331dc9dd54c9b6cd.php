<?php $__env->startSection('content'); ?>
	<div class="w-full block">
		<div id="app">

			<?php
				
				// Set translations
				$translations = [
					't_post_new_project'                  => __('messages.t_post_new_project'),
					't_post_new_project_subtitle'         => __('messages.t_post_new_project_subtitle'),
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
					't_max_allowed_skills_reached'        => __('messages.t_max_allowed_skills_reached')
				]

			?>
			
			<post-project
				categories="<?php echo e(json_encode($categories), false); ?>"
				translations="<?php echo e(json_encode($translations), false); ?>"
				plans="<?php echo e(json_encode($plans), false); ?>"
				_settings="<?php echo e($settings, false); ?>"
				currency_symbol="<?php echo e($currency_symbol, false); ?>"
				is_recaptcha="<?php echo e(settings('security')->is_recaptcha, false); ?>"
				recaptcha_site_key="<?php echo e(config('recaptcha.site_key'), false); ?>" />
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>

	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?php $__env->stopPush(); ?>
<?php echo $__env->make('livewire.main.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/post/project/project.blade.php ENDPATH**/ ?>