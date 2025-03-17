<div class="w-full">

	
	<div class="container mx-auto mt-8">
		<div class="relative bg-zinc-900 rounded-lg" style="background-image: url('<?php echo e(src(settings('start_selling')->banner_bg), false); ?>');background-repeat: no-repeat; background-position: center center; background-size: cover;">
			<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 py-16">
				  
            		<div class="text-center mb-12">
            			<div class="relative inline-flex items-center justify-center mb-10 mx-auto">
            				<image class="h-24 w-24" src="<?php echo e(src(settings('start_selling')->banner_icon), false); ?>"></image>
            			</div>
            			<h2 class="text-3xl md:text-4xl font-extrabold mb-4 text-white">
            				<?php echo app('translator')->get('messages.t_signup_and_create_ur_first_gig'); ?> <?php echo app('translator')->get('messages.t_today'); ?></span>!
            			</h2>
            			<h3 class="text-lg md:text-xl md:leading-relaxed font-medium text-white lg:w-2/3 mx-auto">
            				<?php echo app('translator')->get('messages.t_become_a_seller_subtitle'); ?>
            			</h3>
            		</div>
            	
            		
            		<?php if(auth()->guard()->check()): ?>
            			<div class="flex items-center justify-center">
            				<button wire:click="start" wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray-500 dark:bg-zinc-600 dark:text-zinc-400 cursor-not-allowed" wire:loading.class.remove="bg-primary-600 hover:bg-primary-700 text-white cursor-pointer" wire:loading.attr="disabled" class=" text-lg font-bold flex justify-center bg-primary-600 hover:bg-primary-700 text-white py-3 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer capitalize font-bold">
                            
                                
                                <div wire:loading="" wire:target="start">
                                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            
                                
                                <div wire:loading.remove="" wire:target="start">
                                    Let’s get started
                                </div>
                            </button>
            			</div>
            		<?php endif; ?>
            
            		
            		<?php if(auth()->guard()->guest()): ?>
            			<div class="text-center">
            				<a href="<?php echo e(url('auth/register'), false); ?>" class="inline-flex justify-center items-center space-x-2 rtl:space-x-reverse border font-semibold focus:outline-none px-6 py-4 leading-6 rounded border-primary-700 bg-primary-700 text-white hover:text-white hover:bg-primary-800 hover:border-primary-800 focus:ring focus:ring-primary-500 focus:ring-opacity-50 active:bg-primary-700 active:border-primary-700">
            
            					
            					<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="opacity-50 hi-solid hi-arrow-right hidden ltr:inline-block w-5 h-5"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            
            					
            					<svg xmlns="http://www.w3.org/2000/svg" class="opacity-50 hi-solid hi-arrow-right hidden rtl:inline-block w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            						<path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            					</svg>
            
            					<span><?php echo app('translator')->get('messages.t_lets_get_started'); ?></span>
            				</a>
            			</div>
            		<?php endif; ?>
			</div>
		</div>
	</div>
	
	
	<?php if(settings('start_selling')->show_how_it_works): ?>
	<div class="mb-8 container mx-auto px-4 lg:px-8">
		<div class="py-16 sm:p-16">
			<div class="max-w-xl mx-auto lg:max-w-none">
				<div class="text-center">
					<span class="font-extrabold text-3xl text-gray-800 dark:text-gray-100 pb-1 block" style="font-size: 2.5em">
						<?php echo app('translator')->get('messages.t_how_it_works'); ?> <span class="text-primary-700">?</span>
					</span>
				</div>
				  <div class="mt-12 max-w-sm mx-auto grid grid-cols-1 gap-y-10 gap-x-8 sm:max-w-none lg:grid-cols-3">
	
					
					<div class="text-center sm:flex sm:text-left lg:block lg:text-center border border-primary-200 rounded-xl py-14 px-5">
						<div class="flex justify-center">
							<image class="h-24 w-24" src="<?php echo e(src(settings('start_selling')->hiw_svg_1), false); ?>"></image>
						</div>
						<div class="mt-3 sm:mt-0 sm:ml-6 lg:mt-6 lg:ml-0">
							<h3 class="text-xl font-extrabold text-black"><?php echo e(__('messages.t_create_a_gig'), false); ?></h3>
							<p class="mt-2 text-base text-black"><?php echo e(__('messages.t_start_selling_t_create_a_gig_subtitle'), false); ?></p>
						</div>
					</div>
	
					
					<div class="text-center sm:flex sm:text-left lg:block lg:text-center border border-primary-200 rounded-xl py-14 px-5">
						<div class="flex justify-center">
							<image class="h-24 w-24" src="<?php echo e(src(settings('start_selling')->hiw_svg_2), false); ?>"></image>
						</div>
						<div class="mt-3 sm:mt-0 sm:ml-6 lg:mt-6 lg:ml-0">
							<h3 class="text-xl font-extrabold text-black"><?php echo e(__('messages.t_deliver_great_work'), false); ?></h3>
							<p class="mt-2 text-base text-black"><?php echo e(__('messages.t_deliver_great_work_subtitle'), false); ?></p>
						</div>
					</div>
	
					
					<div class="text-center sm:flex sm:text-left lg:block lg:text-center border border-primary-200 rounded-xl py-14 px-5">
						<div class="flex justify-center">
							<image class="h-24 w-24" src="<?php echo e(src(settings('start_selling')->hiw_svg_3), false); ?>"></image>
						</div>
						<div class="mt-3 sm:mt-0 sm:ml-6 lg:mt-6 lg:ml-0">
							<h3 class="text-xl font-extrabold text-black"><?php echo e(__('messages.t_get_paid'), false); ?></h3>
							<p class="mt-2 text-base text-black"><?php echo e(__('messages.t_get_paid_subtitle'), false); ?></p>
						</div>
					</div>
					
				  </div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	
	<?php if(settings('start_selling')->show_freelancers): ?>
	<div class="mb-17 container mx-auto px-4 lg:px-8 bg-gray-100 dark:bg-zinc-600 py-10">
		
		
		<div class="mb-3 text-center">
			<span class="font-normal text-lg uppercase text-primary-700 block tracking-wide">
				Amazing Freelancers
			</span>
		</div>
		<div class="mb-12 text-center">
			<span class="font-extrabold text-3xl text-gray-800 dark:text-gray-100 pb-1 block" style="font-size: 2.5em">
				<?php echo e(__('messages.t_join_our_growing_freelance_community'), false); ?>

			</span>
		</div>
	
		
		<?php
			$sellers = [
				[
					'avatar' => src(settings('start_selling')->freelancer_image_1),
					'name'   => settings('start_selling')->freelancer_name_1,
					'skill'  => settings('start_selling')->freelancer_job_1,
				],
				[
					'avatar' => src(settings('start_selling')->freelancer_image_2),
					'name'   => settings('start_selling')->freelancer_name_2,
					'skill'  => settings('start_selling')->freelancer_job_2,
				],
				[
					'avatar' => src(settings('start_selling')->freelancer_image_3),
					'name'   => settings('start_selling')->freelancer_name_3,
					'skill'  => settings('start_selling')->freelancer_job_3,
				],
				[
					'avatar' => src(settings('start_selling')->freelancer_image_4),
					'name'   => settings('start_selling')->freelancer_name_4,
					'skill'  => settings('start_selling')->freelancer_job_4,
				],
			];
		?>

		
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-0">
            <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <div class="group relative mb-5 h-80 overflow-hidden">
                        <!-- Background image with zoom effect on hover -->
                        <div class="absolute inset-0 transition-transform transform hover:scale-110 duration-1000" style="background-image: url('<?php echo e($seller['avatar'], false); ?>'); background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>
                    
                        <!-- Contents inside the div -->
                        <div class="absolute bottom-0 right-0 w-full px-5 pb-5 pt-10" style="background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,0.8358328683035714) 0%, rgba(0,0,0,0.7882138206845238) 29%, rgba(69,141,155,0) 100%);">
                            <h4 class="text-2xl font-bold text-white">
                                <?php echo e($seller['name'], false); ?>

                            </h4>
                            <p class="font-light text-base text-white">
                                <?php echo e($seller['skill'], false); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

	</div>
	<?php endif; ?>


	
	<?php if(settings('start_selling')->show_testimonials): ?>
	<div class="mb-24 container mx-auto px-4 lg:px-8 mt-16">

		
		<div class="text-center mb-12">
			<span class="font-extrabold text-3xl text-gray-800 dark:text-gray-100 pb-1 block" style="font-size: 2.5em">
				<?php echo app('translator')->get('messages.t_buyer_stories'); ?>
			</span>
		</div>
	
		
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

			
			<div class="border rounded-2xl bg-white dark:bg-zinc-800 dark:border-zinc-700 shadow-sm relative py-10 px-10">
			    <div class="absolute top-0 right-0 text-8xl -mt-4 mr-10 text-primary-700 font-serif" style="margin-right: 2rem;">”</div>
			    <div class="flex justify-center items-center mb-3">
    				<div class="flex-none rounded-full overflow-hidden w-24 h-24 transform transition ease-out duration-150 dark:hover:bg-zinc-700 hover:shadow-md hover:scale-125 active:shadow-sm active:scale-110">
    					<img src="<?php echo e(src(settings('start_selling')->buyer_image_1), false); ?>" data-src="<?php echo e(url('public/img/start_selling/9.jpeg'), false); ?>" alt="<?php echo e(__('messages.t_fake_name_ricky_jones'), false); ?>" class="object-cover w-24 h-24 lazy">
    				</div>
				</div>
				
				<div class="flex justify-center items-center mb-6">
				    <div class="text-center">
						<div class="font-bold text-lg text-primary-700 hover:text-primary-400">
							<?php echo e(settings('start_selling')->buyer_name_1, false); ?>

						</div>
						<p class="text-gray-700 font-medium text-base">
							<?php echo e(settings('start_selling')->buyer_job_1, false); ?>

						</p>
					</div>
				</div>

				<p class="text-black text-lg text-center leading-7 dark:text-gray-400 font-medium">
					<?php echo e(settings('start_selling')->buyer_review_1, false); ?>

				</p>
				
				<div class="flex justify-center mt-2">
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				</div>

			</div>

			
			<div class="border rounded-2xl bg-white dark:bg-zinc-800 dark:border-zinc-700 shadow-sm relative py-10 px-10">
			    <div class="absolute top-0 right-0 text-8xl -mt-4 mr-10 text-primary-700 font-serif" style="margin-right: 2rem;">”</div>
			    <div class="flex justify-center items-center mb-3">
    				<div class="flex-none rounded-full overflow-hidden w-24 h-24 transform transition ease-out duration-150 dark:hover:bg-zinc-700 hover:shadow-md hover:scale-125 active:shadow-sm active:scale-110">
    					<img src="<?php echo e(src(settings('start_selling')->buyer_image_2), false); ?>" data-src="<?php echo e(url('public/img/start_selling/7.jpeg'), false); ?>" alt="<?php echo e(__('messages.t_fake_name_ricky_jones'), false); ?>" class="object-cover w-24 h-24 lazy">
    				</div>
				</div>
				
				<div class="flex justify-center items-center mb-6">
				    <div class="text-center">
						<div class="font-bold text-lg text-primary-700 hover:text-primary-400">
							<?php echo e(settings('start_selling')->buyer_name_2, false); ?>

						</div>
						<p class="text-gray-700 font-medium text-base">
							<?php echo e(settings('start_selling')->buyer_job_2, false); ?>

						</p>
					</div>
				</div>

				<p class="text-black text-lg text-center leading-7 dark:text-gray-400 font-medium text-italic">
				<?php echo e(settings('start_selling')->buyer_review_2, false); ?>

				</p>

                <div class="flex justify-center mt-2">
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				</div>
			</div>

			
			<div class="border rounded-2xl bg-white dark:bg-zinc-800 dark:border-zinc-700 shadow-sm relative py-10 px-10">
			    <div class="absolute top-0 right-0 text-8xl -mt-4 mr-10 text-primary-700 font-serif" style="margin-right: 2rem;">”</div>
			    <div class="flex justify-center items-center mb-3">
    				<div class="flex-none rounded-full overflow-hidden w-24 h-24 transform transition ease-out duration-150 dark:hover:bg-zinc-700 hover:shadow-md hover:scale-125 active:shadow-sm active:scale-110">
    					<img src="<?php echo e(src(settings('start_selling')->buyer_image_3), false); ?>" data-src="<?php echo e(url('public/img/start_selling/8.jpeg'), false); ?>" alt="<?php echo e(__('messages.t_fake_name_ricky_jones'), false); ?>" class="object-cover w-24 h-24 lazy">
    				</div>
				</div>
				
				<div class="flex justify-center items-center mb-6">
				    <div class="text-center">
						<div class="font-bold text-lg text-primary-700 hover:text-primary-400">
							<?php echo e(settings('start_selling')->buyer_name_3, false); ?>

						</div>
						<p class="text-gray-700 font-medium text-base">
							<?php echo e(settings('start_selling')->buyer_job_3, false); ?>

						</p>
					</div>
				</div>

				<p class="text-black text-lg text-center leading-7 dark:text-gray-400 font-medium">
					<?php echo e(settings('start_selling')->buyer_review_3, false); ?>

				</p>
				
				<div class="flex justify-center mt-2">
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8b305"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
				</div>

			</div>
			
		</div>

	</div>
	<?php endif; ?>

	
	<?php if(settings('start_selling')->show_faq): ?>
	<div class="mb-24 container mx-auto px-4 lg:px-8">
		<div class="bg-white dark:bg-zinc-700 px-12 py-16 rounded-2xl border border-gray-300">

			
			<div class="md:flex md:items-center mb-16">
			   <svg class="text-primary-700 h-10 w-10 -mt-1 ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="M478-240q21 0 35.5-14.5T528-290q0-21-14.5-35.5T478-340q-21 0-35.5 14.5T428-290q0 21 14.5 35.5T478-240Zm-36-154h74q0-33 7.5-52t42.5-52q26-26 41-49.5t15-56.5q0-56-41-86t-97-30q-57 0-92.5 30T342-618l66 26q5-18 22.5-39t53.5-21q32 0 48 17.5t16 38.5q0 20-12 37.5T506-526q-44 39-54 59t-10 73Zm38 314q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
			   <span class="font-extrabold text-3xl text-gray-800 dark:text-gray-100 pb-1 block" style="font-size: 2.5em">
					<?php echo app('translator')->get('messages.t_faq_full'); ?>
				</span>
			</div>
		
			<!-- FAQ -->
			<div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
	
				
				<div class="text-black prose prose-indigo">
				    <span class="text-xl font-black text-primary-700 mx-1">
						1.)
					</span>
					<span class="text-xl font-bold dark:text-gray-300">
						<?php echo app('translator')->get('messages.t_what_can_i_sell_question'); ?>
					</span>
					<p class="dark:text-gray-100">
						<?php echo app('translator')->get('messages.t_what_can_i_sell_answer'); ?>
					</p>
				</div>
	
				
				<div class="text-black prose prose-indigo">
				    <span class="text-xl font-black text-primary-700 mx-1">
						2.)
					</span>
					<span class="text-xl font-bold dark:text-gray-300">
						<?php echo app('translator')->get('messages.t_how_much_money_can_i_make_question'); ?>
					</span>
					<p class="dark:text-gray-100">
						<?php echo app('translator')->get('messages.t_how_much_money_can_i_make_answer'); ?>
					</p>
				</div>
	
				
				<div class="text-black prose prose-indigo">
				    <span class="text-xl font-black text-primary-700 mx-1">
						3.)
					</span>
					<span class="text-xl font-bold dark:text-gray-300">
						<?php echo app('translator')->get('messages.t_how_much_does_it_cost_question'); ?>
					</span>
					<p class="dark:text-gray-100">
						<?php echo app('translator')->get('messages.t_how_much_does_it_cost_answer'); ?>
					</p>
				</div>
	
				
				<div class="text-black prose prose-indigo">
				    <span class="text-xl font-black text-primary-700 mx-1">
						4.)
					</span>
					<span class="text-xl font-bold dark:text-gray-300">
						<?php echo app('translator')->get('messages.t_how_much_time_will_i_need_invest_question'); ?>
					</span>
					<p class="dark:text-gray-100">
						<?php echo app('translator')->get('messages.t_how_much_time_will_i_need_invest_answer'); ?>
					</p>
				</div>
	
				
				<div class="text-black prose prose-indigo">
				    <span class="text-xl font-black text-primary-700 mx-1">
						5.)
					</span>
					<span class="text-xl font-bold dark:text-gray-300">
						<?php echo app('translator')->get('messages.t_how_do_i_price_my_service_question'); ?>
					</span>
					<p class="dark:text-gray-100">
						<?php echo app('translator')->get('messages.t_how_do_i_price_my_service_answer'); ?>
					</p>
				</div>
	
				
				<div class="text-black prose prose-indigo">
				    <span class="text-xl font-black text-primary-700 mx-1">
						6.)
					</span>				
					<span class="text-xl font-bold dark:text-gray-300">
						<?php echo app('translator')->get('messages.t_how_do_i_get_paid_question'); ?>
					</span>
					<p class="dark:text-gray-100">
						<?php echo app('translator')->get('messages.t_how_do_i_get_paid_answer'); ?>
					</p>
				</div>
				
			</div>

		</div>
	</div>
	<?php endif; ?>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/become/seller.blade.php ENDPATH**/ ?>