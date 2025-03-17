<div class="w-full">
	<div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-5 gap-y-5">

        {{-- Cache --}}
        <div class="flex flex-col rounded border shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 grow w-full">

                {{-- Title --}}
                <h3 class="text-base font-semibold mb-1 text-zinc-800">
                    Cache
                </h3>

                {{-- Description --}}
                <p class="text-gray-500 mb-4 text-sm">
                    We store some values in order to reduce the number of requests to the database.
                </p>

                {{-- Actions --}}
                <div class="space-x-3 rtl:space-x-reverse">

                    {{-- Clear --}}
                    <button
                        wire:click="cache('clear')"
                        wire:loading.attr="disabled"
                        wire:target="cache('clear')"
                        class="inline-flex justify-center items-center border font-medium focus:outline-none px-3 py-2 leading-5 text-[13px] rounded border-gray-100 bg-gray-100 text-gray-600 hover:bg-gray-200 focus:ring focus:ring-gray-500 focus:ring-opacity-50 disabled:bg-gray-300 disabled:text-gray-600 disabled:border-gray-300 disabled:hover:bg-gray-300 disabled:cursor-not-allowed">
                        Clear
                    </button>

                </div>

            </div>
        </div>

        {{-- Views --}}
        <div class="flex flex-col rounded border shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 grow w-full">

                {{-- Title --}}
                <h3 class="text-base font-semibold mb-1 text-zinc-800">
                    Views
                </h3>

                {{-- Description --}}
                <p class="text-gray-500 mb-4 text-sm">
                    The view cache stores rendered Blade templates to speed up the application.
                </p>

                {{-- Actions --}}
                <div class="space-x-3 rtl:space-x-reverse">

                    {{-- Cache --}}
                    <button
                        wire:click="views('cache')"
                        wire:loading.attr="disabled"
                        wire:target="views('cache')"
                        class="inline-flex justify-center items-center border font-medium focus:outline-none px-3 py-2 leading-5 text-[13px] rounded border-primary-600 bg-primary-600 text-white hover:bg-primary-700 focus:ring focus:ring-primary-500 focus:ring-opacity-50 disabled:bg-gray-300 disabled:text-gray-600 disabled:border-gray-300 disabled:hover:bg-gray-300 disabled:cursor-not-allowed">
                        Cache
                    </button>

                    {{-- Clear --}}
                    <button
                        wire:click="views('clear')"
                        wire:loading.attr="disabled"
                        wire:target="views('clear')"
                        class="inline-flex justify-center items-center border font-medium focus:outline-none px-3 py-2 leading-5 text-[13px] rounded border-gray-100 bg-gray-100 text-gray-600 hover:bg-gray-200 focus:ring focus:ring-gray-500 focus:ring-opacity-50 disabled:bg-gray-300 disabled:text-gray-600 disabled:border-gray-300 disabled:hover:bg-gray-300 disabled:cursor-not-allowed">
                        Clear
                    </button>

                </div>

            </div>
        </div>

        {{-- Sessions table --}}
        <div class="flex flex-col rounded border shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 grow w-full">

                {{-- Title --}}
                <h3 class="text-base font-semibold mb-1 text-zinc-800">
                    Sessions table
                </h3>

                {{-- Description --}}
                <p class="text-gray-500 mb-4 text-sm">
                    Sessions table is where Laravel stores information about the user across multiple requests.
                </p>

                {{-- Actions --}}
                <div class="space-x-3 rtl:space-x-reverse">

                    {{-- Clear --}}
                    <button
                        wire:click="sessions('clear')"
                        wire:loading.attr="disabled"
                        wire:target="sessions('clear')"
                        class="inline-flex justify-center items-center border font-medium focus:outline-none px-3 py-2 leading-5 text-[13px] rounded border-primary-600 bg-primary-600 text-white hover:bg-primary-700 focus:ring focus:ring-primary-500 focus:ring-opacity-50 disabled:bg-gray-300 disabled:text-gray-600 disabled:border-gray-300 disabled:hover:bg-gray-300 disabled:cursor-not-allowed">
                        Wipe the table (Truncate)
                    </button>

                </div>

            </div>
        </div>

        {{-- Log files --}}
        <div class="flex flex-col rounded border shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 grow w-full">

                {{-- Title --}}
                <h3 class="text-base font-semibold mb-1 text-zinc-800">
                    Log files
                </h3>

                {{-- Description --}}
                <p class="text-gray-500 mb-4 text-sm">
                    logs are stored in storage/logs directory. You can delete them to save space.
                </p>

                {{-- Actions --}}
                <div class="space-x-3 rtl:space-x-reverse">

                    {{-- Clear --}}
                    <button
                        wire:click="logs('clear')"
                        wire:loading.attr="disabled"
                        wire:target="logs('clear')"
                        class="inline-flex justify-center items-center border font-medium focus:outline-none px-3 py-2 leading-5 text-[13px] rounded border-primary-600 bg-primary-600 text-white hover:bg-primary-700 focus:ring focus:ring-primary-500 focus:ring-opacity-50 disabled:bg-gray-300 disabled:text-gray-600 disabled:border-gray-300 disabled:hover:bg-gray-300 disabled:cursor-not-allowed">
                        Delete files
                    </button>

                </div>

            </div>
        </div>

    </div>
</div>
