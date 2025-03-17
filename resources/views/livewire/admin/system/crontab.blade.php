<div class="w-full md:max-w-xl mx-auto grid items-center justify-center">
		
		{{-- Message --}}
		<div class="text-sm font-medium text-gray-400 mb-8 text-center">
			Please use the following commands in Cron Jobs on your server.<br>
			If you have any problem, please contact the author.
		</div>

		{{-- Commands --}}
		<div class="grid space-y-4 mb-8">
			
			{{-- Queue commands --}}
			<kbd class="px-2 py-1.5 text-sm font-semibold text-gray-800 bg-gray-200 border border-gray-300 rounded-md">
				{{ $command_queue }}
			</kbd>
	
			{{-- Schedule commands --}}
			<kbd class="px-2 py-1.5 text-sm font-semibold text-gray-800 bg-gray-200 border border-gray-300 rounded-md">
				{{ $command_schedule }}
			</kbd>

		</div>

</div>
