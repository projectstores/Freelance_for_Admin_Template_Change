
<div class="w-full px-2 sm:px-12 flex flex-col items-center">
    
    <div class="grid lg:grid-cols-2 shadow-xl transition-shadow border-gray-200 border rounded-lg">
        
        <div class="w-full bg-no-repeat bg-center bg-cover h-full rounded-tl-lg rounded-bl-lg flex flex-col items-center capitalize px-4" <?php if(settings('auth')->wallpaper): ?> style="background-image: url(<?php echo e(src(settings('auth')->wallpaper), false); ?>)" <?php endif; ?>>
        
            <div class="mt-14 mb-14 text-center">
            
                <h2 class="text-4xl font-black text-white">
    				<?php echo app('translator')->get('messages.t_scale_your_workforce'); ?>
    			</h2>
            
                <span class="text-lg font-normal text-white mt-1 text-center">
    				<?php echo app('translator')->get('messages.t_the_premium_solution'); ?>
    			</span>
            
            </div>
        
        </div>
    
        
        <div class="w-full flex flex-col items-center justify-center rounded-tr-lg rounded-br-lg bg-white">
            
            <div class="flex w-full items-center dark:bg-zinc-800 z-100 px-10">
                <div class="flex w-full max-w-sm flex-col justify-center p-5">

                	
                	<div class="text-center">
                		<div class="mt-4">
                			<span class="text-2xl font-black text-black dark:text-white">
                				<?php echo app('translator')->get('messages.t_create_an_account'); ?>
                			</span>
                		</div>
                	</div>
                	
                	<div class="text-center">
                		<div class="mt-1">
                			<span class="text-lg font-normal text-black dark:text-white">
                				<?php echo app('translator')->get('messages.t_already_have_account'); ?>
                				<a class="hover:text-primary-700 underline" href="<?php echo e(url('auth/login'), false); ?>">
        							<?php echo app('translator')->get('messages.t_sign_in'); ?>	
        						</a>
                			</span>
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
                	
                		<div class="w-full relative">
                			
                			
                			<div class="mt-1">
                				<form x-data="window.UcZWcDFfVKBjfgP" x-on:submit.prevent="register" class="grid grid-cols-12 md:gap-x-6 gap-y-6">
                
                					
                					<div class="col-span-12">
                						<div class="relative w-full shadow-sm rounded-md">
                
                							
                							<input type="text" x-model="form.fullname" class="<?php echo e($errors->first('fullname') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-200', false); ?> border-2 text-gray-900 text-base rounded-md font-medium block w-full px-9 py-2.5 placeholder:font-normal dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?php echo e(__('messages.t_enter_your_fullname'), false); ?>">
                
                							
                							<div class="absolute inset-y-0 rtl:right-0 ltr:left-0 flex items-center rtl:pr-3 ltr:pl-3">
                                                <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                							</div>
                
                						</div>
                
                						
                						<?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                							<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
                								<?php echo e($errors->first('fullname'), false); ?>

                							</p>
                						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                					</div>
                
                                    
                					<div class="col-span-12">
                						<div class="relative w-full shadow-sm rounded-md">
                
                							
                							<input type="email" x-model="form.email" class="<?php echo e($errors->first('email') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-200', false); ?> border-2 text-gray-900 text-base rounded-md font-medium block w-full px-9 py-2.5 placeholder:font-normal dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?php echo e(__('messages.t_enter_email_address'), false); ?>">
                
                							
                							<div class="absolute inset-y-0 rtl:right-0 ltr:left-0 flex items-center rtl:pr-3 ltr:pl-3">
                								<svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd"></path></svg>
                							</div>
                
                						</div>
                
                						
                						<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                							<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
                								<?php echo e($errors->first('email'), false); ?>

                							</p>
                						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                					</div>
                
                                    
                                    <div class="col-span-12">
                						<div class="relative w-full shadow-sm rounded-md">
                
                							
                							<input type="text" x-model="form.username" class="<?php echo e($errors->first('username') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-200', false); ?> border-2 text-gray-900 text-base rounded-md font-medium block w-full px-9 py-2.5 placeholder:font-normal dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?php echo e(__('messages.t_enter_username'), false); ?>">
                
                							
                							<div class="absolute inset-y-0 rtl:right-0 ltr:left-0 flex items-center rtl:pr-3 ltr:pl-3">
                                                <svg class="w-4 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                							</div>
                
                						</div>
                
                						
                						<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                							<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
                								<?php echo e($errors->first('username'), false); ?>

                							</p>
                						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                					</div>
                
                					
                					<div class="col-span-12">
                						<div class="relative w-full shadow-sm rounded-md">
                
                							
                							<input type="password" x-model="form.password" class="<?php echo e($errors->first('password') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-200', false); ?> border-2 text-gray-900 text-base rounded-md font-medium block w-full px-9 py-2.5 placeholder:font-normal dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?php echo e(__('messages.t_enter_password'), false); ?>">
                
                							
                							<div class="absolute inset-y-0 rtl:right-0 ltr:left-0 flex items-center rtl:pr-3 ltr:pl-3">
                								<svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                							</div>
                
                						</div>
                
                						
                						<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                							<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
                								<?php echo e($errors->first('password'), false); ?>

                							</p>
                						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                					</div>
                
                					
                					<?php if(settings('security')->is_recaptcha): ?>
                						<div class="col-span-12" wire:ignore>
                							<div class="g-recaptcha" data-sitekey="<?php echo e(config('recaptcha.site_key'), false); ?>" data-theme="<?php echo e(current_theme(), false); ?>"></div>
                						</div>
                					<?php endif; ?>
                
                					
                					<div class="col-span-12">
                						<button type="submit" wire:loading.attr="disabled" wire:target="register" :disabled="!form.email || !form.password || !form.fullname || !form.username" class="w-full bg-primary-600 enabled:hover:bg-primary-700 text-white py-3 px-4 rounded-md text-bold font-bold tracking-wide disabled:bg-zinc-200 disabled:text-zinc-500 dark:disabled:bg-zinc-500 dark:disabled:text-zinc-300 disabled:cursor-not-allowed">
                							
                							
                							<div wire:loading wire:target="register">
                								<svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                									<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                									<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                								</svg>
                							</div>
                
                							
                							<div wire:loading.remove wire:target="register">
                								<?php echo app('translator')->get('messages.t_create_account'); ?>
                							</div>
                							
                						</button>
                					</div>
                					
                				</form>
                			</div>
                
                			
                			<div class="my-10 relative">
                				<div class="absolute inset-0 flex items-center" aria-hidden="true">
                					<div class="w-full border-t border-gray-300 dark:border-zinc-700"></div>
                				</div>
                				<div class="relative flex justify-center text-sm">
                					<span class="px-2 bg-white dark:bg-zinc-800 text-gray-500 dark:text-gray-400">
                						<?php echo e(__('messages.t_or'), false); ?>

                					</span>
                				</div>
                			</div>
                
                			
                			<?php if($social_grid): ?>
                				<div class="mt-1 grid grid-cols-1 gap-3">

                					
                					<?php if(settings('auth')->is_facebook_login): ?>
                						<div>
                                            <a href="<?php echo e(url('auth/facebook'), false); ?>" class="w-full inline-flex items-center py-2 px-2 rounded-xl hover:bg-gray-600 dark:hover:bg-zinc-600 text-sm font-bold border border-gray-300 text-black">
                                                <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.995 1.67a8.325 8.325 0 1 0 0 16.65 8.325 8.325 0 0 0 0-16.65Z" fill="#039BE5"></path><path d="M11.122 12.201h2.154l.339-2.188H11.12V8.817c0-.91.297-1.716 1.148-1.716h1.367v-1.91c-.24-.032-.748-.103-1.708-.103-2.004 0-3.178 1.058-3.178 3.469v1.456H6.69V12.2h2.06v6.016c.408.061.82.103 1.245.103.383 0 .758-.035 1.127-.085V12.2Z" fill="#fff"></path></svg>
                                                <span class="flex-grow text-center"><?php echo e(__('messages.t_facebook'), false); ?></span>
                                            </a>
                						</div>
                					<?php endif; ?>
                
                					
                					<?php if(settings('auth')->is_google_login): ?>
                						<div>
                							<a href="<?php echo e(url('auth/google'), false); ?>" class="w-full inline-flex items-center py-2 px-2 rounded-xl hover:bg-gray-600 dark:hover:bg-zinc-600 text-sm font-bold border border-gray-300 text-black">
                								<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.171 8.368h-.67v-.035H10v3.333h4.709A4.998 4.998 0 0 1 5 10a5 5 0 0 1 5-5c1.275 0 2.434.48 3.317 1.266l2.357-2.357A8.295 8.295 0 0 0 10 1.667a8.334 8.334 0 1 0 8.171 6.7Z" fill="#FFC107"></path><path d="M2.628 6.121 5.366 8.13A4.998 4.998 0 0 1 10 4.999c1.275 0 2.434.482 3.317 1.267l2.357-2.357A8.295 8.295 0 0 0 10 1.667 8.329 8.329 0 0 0 2.628 6.12Z" fill="#FF3D00"></path><path d="M10 18.333a8.294 8.294 0 0 0 5.587-2.163l-2.579-2.183A4.963 4.963 0 0 1 10 15a4.998 4.998 0 0 1-4.701-3.311L2.58 13.783A8.327 8.327 0 0 0 10 18.333Z" fill="#4CAF50"></path><path d="M18.171 8.368H17.5v-.034H10v3.333h4.71a5.017 5.017 0 0 1-1.703 2.321l2.58 2.182c-.182.166 2.746-2.003 2.746-6.17 0-.559-.057-1.104-.162-1.632Z" fill="#1976D2"></path></svg>
                							    <span class="flex-grow text-center"><?php echo e(__('messages.t_google'), false); ?></span>
                							</a>
                						</div>
                					<?php endif; ?>
                
                					
                					<?php if(settings('auth')->is_github_login): ?>
                						<div>
                							<a href="<?php echo e(url('auth/github'), false); ?>" class="w-full inline-flex items-center py-2 px-2 rounded-xl hover:bg-gray-600 dark:hover:bg-zinc-600 text-sm font-bold border border-gray-300 text-black">
                								<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.083 1.75C5.25 2.167 2.167 5.25 1.75 9c-.5 4.167 2.083 7.75 5.75 8.917V16s-.333.083-.75.083c-1.167 0-1.667-1-1.75-1.583-.083-.333-.25-.583-.5-.833-.25-.084-.333-.084-.333-.167 0-.167.25-.167.333-.167.5 0 .917.584 1.083.834C6 14.833 6.5 15 6.75 15c.333 0 .583-.083.75-.167.083-.583.333-1.166.833-1.5C6.417 12.917 5 11.833 5 10c0-.917.417-1.833 1-2.5-.083-.167-.167-.583-.167-1.167 0-.333 0-.833.25-1.333 0 0 1.167 0 2.334 1.083.416-.166 1-.25 1.583-.25s1.167.084 1.667.25C12.75 5 14 5 14 5c.167.5.167 1 .167 1.333 0 .667-.084 1-.167 1.167.583.667 1 1.5 1 2.5 0 1.833-1.417 2.917-3.333 3.333.5.417.833 1.167.833 1.917V18c3.417-1.083 5.833-4.25 5.833-7.917 0-5-4.25-8.916-9.25-8.333Z" fill="#000"></path></svg>
                							    <span class="flex-grow text-center"><?php echo e(__('messages.t_github'), false); ?></span>
                							</a>
                						</div>
                					<?php endif; ?>
                
                					
                					<?php if(settings('auth')->is_twitter_login): ?>
                						<div>
                							<a href="<?php echo e(url('auth/twitter'), false); ?>" class="w-full inline-flex items-center py-2 px-2 rounded-xl hover:bg-gray-600 dark:hover:bg-zinc-600 text-sm font-bold border border-gray-300 text-black">
                								<svg fill="#1da1f2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 27" width="20px" height="20px"><path d="M 25.855469 5.574219 C 24.914063 5.992188 23.902344 6.273438 22.839844 6.402344 C 23.921875 5.75 24.757813 4.722656 25.148438 3.496094 C 24.132813 4.097656 23.007813 4.535156 21.8125 4.769531 C 20.855469 3.75 19.492188 3.113281 17.980469 3.113281 C 15.082031 3.113281 12.730469 5.464844 12.730469 8.363281 C 12.730469 8.773438 12.777344 9.175781 12.867188 9.558594 C 8.503906 9.339844 4.636719 7.246094 2.046875 4.070313 C 1.59375 4.847656 1.335938 5.75 1.335938 6.714844 C 1.335938 8.535156 2.261719 10.140625 3.671875 11.082031 C 2.808594 11.054688 2 10.820313 1.292969 10.425781 C 1.292969 10.449219 1.292969 10.46875 1.292969 10.492188 C 1.292969 13.035156 3.101563 15.15625 5.503906 15.640625 C 5.0625 15.761719 4.601563 15.824219 4.121094 15.824219 C 3.78125 15.824219 3.453125 15.792969 3.132813 15.730469 C 3.800781 17.8125 5.738281 19.335938 8.035156 19.375 C 6.242188 20.785156 3.976563 21.621094 1.515625 21.621094 C 1.089844 21.621094 0.675781 21.597656 0.265625 21.550781 C 2.585938 23.039063 5.347656 23.90625 8.3125 23.90625 C 17.96875 23.90625 23.25 15.90625 23.25 8.972656 C 23.25 8.742188 23.246094 8.515625 23.234375 8.289063 C 24.261719 7.554688 25.152344 6.628906 25.855469 5.574219"/></svg>
                							    <span class="flex-grow text-center"><?php echo e(__('messages.t_twitter'), false); ?></span>
                							</a>
                						</div>
                					<?php endif; ?>
                
                					
                					<?php if(settings('auth')->is_linkedin_login): ?>
                						<div>
                							<a href="<?php echo e(url('auth/linkedin'), false); ?>" class="w-full inline-flex items-center py-2 px-2 rounded-xl hover:bg-gray-600 dark:hover:bg-zinc-600 text-sm font-bold border border-gray-300 text-black">
                								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="20" height="20"viewBox="0 0 48 48"style=" fill:#000000;"><path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path></svg>
                							    <span class="flex-grow text-center"><?php echo e(__('messages.t_linked_in'), false); ?></span>
                							</a>
                						</div>
                					<?php endif; ?>
                					
                				</div>
                			<?php endif; ?>
                			
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


<?php $__env->startPush('styles'); ?>
	
	
	<?php if(settings('security')->is_recaptcha): ?>
		<script src='https://www.google.com/recaptcha/api.js' async defer></script>
	<?php endif; ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script>
		function UcZWcDFfVKBjfgP() {
			return {

				// reCaptcha
				recaptcha: Boolean("<?php echo e(settings('security')->is_recaptcha ? true : false, false); ?>"),

				// Form
				form: {
					email   : null,
					password: null,
					fullname: null,
					username: null
				},

				// Register
				register() {
					var _this = this;

					// Is recapctah enabled
					if (_this.recaptcha && document.getElementById('g-recaptcha-response')) {

						// Get recaptcha response
						var recaptcha_token = document.getElementById('g-recaptcha-response').value;
	
						// Validate recapctah
						if (!recaptcha_token) {
						
							// Error
							window.$wireui.notify({
								title      : "<?php echo e(__('messages.t_error'), false); ?>",
								description: "<?php echo e(__('messages.t_recaptcha_error_message'), false); ?>",
								icon       : 'error'
							});
	
							return;
	
						}
						
					} else {

						// reCaptcha has no response
						var recaptcha_token = null;

					}

					// Validate form
					if (!_this.form.email || !_this.form.password || !_this.form.fullname || !_this.form.username) {
                        
						// Error
						window.$wireui.notify({
							title      : "<?php echo e(__('messages.t_error'), false); ?>",
							description: "<?php echo e(__('messages.t_pls_check_ur_inputs_and_try_again'), false); ?>",
							icon       : 'error'
						});

						return;

					}

					// Register
					window.livewire.find('<?php echo e($_instance->id, false); ?>').register({
						'email'          : _this.form.email,
						'password'       : _this.form.password,
						'username'       : _this.form.username,
						'fullname'       : _this.form.fullname,
						'recaptcha_token': recaptcha_token
					});

				}

			}
		}
		window.UcZWcDFfVKBjfgP = UcZWcDFfVKBjfgP();
	</script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/auth/register.blade.php ENDPATH**/ ?>