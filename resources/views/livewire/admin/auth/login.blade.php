<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">

	@if ($attemptsLeft > 0)
		
		{{-- Section head --}}
		<div class="mx-auto max-w-md text-center">
			<h1 class="text-2xl font-bold sm:text-3xl">
				@lang('messages.t_welcome_back')
			</h1>
	
			<p class="mt-4 text-gray-500">
				@lang('messages.t_enter_credentials_to_access_dashboard')
			</p>

			{{-- Alert --}}
			@if ($message)
				<div class="block my-6">
					<div class="bg-red-50 border-l-4 border-red-400 p-4">
						<div class="flex items-center">
							<div class="flex-shrink-0">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
							</div>
							<div class="ltr:ml-3 rtl:mr-3">
								<p class="text-sm text-red-500 font-medium">{{ $message }}</p>
							</div>
						</div>
					</div>  
				</div>
			@endif

		</div>
	
		<form x-data="window.rePVGWvaHiKXQdL" x-on:submit.prevent="login" class="grid grid-cols-12 md:gap-x-6 gap-y-6 mx-auto mt-8 mb-0 max-w-md">

			{{-- Email address --}}
			<div class="col-span-12">
				<div class="relative w-full shadow-sm rounded-md">

					{{-- Input --}}
					<input type="email" x-model="form.email" class="{{ $errors->first('email') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300' }} border text-gray-900 text-sm rounded-md font-medium block w-full ltr:pr-12 rtl:pl-12 p-4 placeholder:font-normal dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.t_enter_email_address') }}">

					{{-- Icon --}}
					<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
						<svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd"></path></svg>
					</div>

				</div>

				{{-- Error --}}
				@error('email')
					<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
						{{ $errors->first('email') }}
					</p>
				@enderror
			</div>

			{{-- Password --}}
			<div class="col-span-12">
				<div class="relative w-full shadow-sm rounded-md">

					{{-- Input --}}
					<input type="password" x-model="form.password" class="{{ $errors->first('password') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300' }} border text-gray-900 text-sm rounded-md font-medium block w-full ltr:pr-12 rtl:pl-12 p-4 placeholder:font-normal  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.t_enter_password') }}">

					{{-- Icon --}}
					<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
						<svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
					</div>

				</div>

				{{-- Error --}}
				@error('password')
					<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
						{{ $errors->first('password') }}
					</p>
				@enderror

			</div>

			{{-- reCaptcha --}}
			@if (settings('security')->is_recaptcha)
				<div class="col-span-12" wire:ignore>
					<div class="g-recaptcha" data-sitekey="{{ config('recaptcha.site_key') }}" data-theme="{{ current_theme() }}"></div>
				</div>
			@endif

			{{-- Login --}}
			<div class="col-span-12">
				<button type="submit" wire:loading.attr="disabled" wire:target="login" :disabled="!form.email || !form.password" class="w-full bg-primary-600 enabled:hover:bg-primary-700 text-white py-4.5 px-4 rounded-md text-[13px] font-semibold tracking-wide disabled:bg-zinc-200 disabled:text-zinc-500">
					
					{{-- Loading indicator --}}
					<div wire:loading wire:target="login">
						<svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
							<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
						</svg>
					</div>

					{{-- Button text --}}
					<div wire:loading.remove wire:target="login">
						@lang('messages.t_login')
					</div>
					
				</button>
			</div>
			
		</form>

	@else

		{{-- Failed attempts --}}
		<div class="block">
			<div class="bg-red-50 border-l-4 border-red-400 p-4">
				<div class="flex items-center">
					<div class="flex-shrink-0">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
					</div>
					<div class="ltr:ml-3 rtl:mr-3">
						<p class="text-sm text-red-500 font-medium">{!! __('messages.t_too_many_login_attempts_pls_try_after_seconds', ['seconds' => $retryAfter]) !!}</p>
					</div>
				</div>
			</div>  
		</div>

	@endif

</div>

@push('styles')
	
	{{-- reCaptcha --}}
	@if (settings('security')->is_recaptcha)
		<script src='https://www.google.com/recaptcha/api.js' async defer></script>
	@endif

@endpush

@push('scripts')
	<script>
		function rePVGWvaHiKXQdL() {
			return {

				// reCaptcha
				recaptcha: Boolean("{{ settings('security')->is_recaptcha ? true : false }}"),

				// Form
				form: {
					email   : null,
					password: null
				},

				// Login
				login() {
					var _this = this;

					// Is recapctah enabled
					if (_this.recaptcha && document.getElementById('g-recaptcha-response')) {

						// Get recaptcha response
						var recaptcha_token = document.getElementById('g-recaptcha-response').value;
	
						// Validate recapctah
						if (!recaptcha_token) {
						
							// Error
							window.$wireui.notify({
								title      : "{{ __('messages.t_error') }}",
								description: "{{ __('messages.t_recaptcha_error_message') }}",
								icon       : 'error'
							});
	
							return;
	
						}
						
					} else {

						// reCaptcha has no response
						var recaptcha_token = null;

					}

					// Validate form
					if (!_this.form.email || !_this.form.password) {
						
						// Error
						window.$wireui.notify({
							title      : "{{ __('messages.t_error') }}",
							description: "{{ __('messages.t_pls_check_ur_inputs_and_try_again') }}",
							icon       : 'error'
						});

						return;

					}

					// Login
					@this.login({
						'email'          : _this.form.email,
						'password'       : _this.form.password,
						'recaptcha_token': recaptcha_token
					});

				}

			}
		}
		window.rePVGWvaHiKXQdL = rePVGWvaHiKXQdL();
	</script>
	@if ($attemptsLeft < 0)
		<script>
			var timeleft = {{ $retryAfter }};
			var timer    = setInterval(function(){
				if(timeleft === 0){
					clearInterval(timer);
					// Refresh the page
					window.location.reload();
				} else {
					document.getElementById("countdown-seconds").innerHTML = timeleft;
				}
				timeleft -= 1;
			}, 1000);
		</script>
	@endif
@endpush