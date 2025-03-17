<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_live_chat_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">Update live chat settings, you can get pusher keys from <a class="text-blue-500" href="https://pusher.com">pusher.com</a>. Follow these steps to get your keys:</p>
                <div class="mt-4">
                    <ul class="flex space-x-4 rtl:space-x-reverse text-xs text-primary-600 font-semibold">
                        <li>
                            <a href="https://pusher.com" class="hover:text-black hover:underline" target="_blank">Create an account</a>
                        </li>

                        <li>
                            <a href="https://i.postimg.cc/JnK3kQ9q/1.png" class="hover:text-black hover:underline" target="_blank">Step 2</a>
                        </li>

                        <li>
                            <a href="https://i.postimg.cc/fW2jWB7W/2.png" class="hover:text-black hover:underline" target="_blank">Step 3</a>
                        </li>

                        <li>
                            <a href="https://i.postimg.cc/90Mdt72j/3.png" class="hover:text-black hover:underline" target="_blank">Step 4</a>
                        </li>

                        <li>
                            <a href="https://i.postimg.cc/rsPShwyR/4.png" class="hover:text-black hover:underline" target="_blank">Step 5</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Pusher key --}}
                <div class="col-span-12 lg:col-span-4">
                    <x-forms.text-input
                        label="Pusher key"
                        placeholder="Enter pusher key"
                        model="pusher_key" />
                </div>

                {{-- Pusher secret --}}
                <div class="col-span-12 lg:col-span-4">
                    <x-forms.text-input
                        label="Pusher secret"
                        placeholder="Enter pusher secret"
                        model="pusher_secret" />
                </div>

                {{-- Pusher app id --}}
                <div class="col-span-12 lg:col-span-4">
                    <x-forms.text-input
                        label="Pusher app id"
                        placeholder="Enter pusher app id"
                        model="pusher_app_id" />
                </div>

                {{-- Pusher cluster --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.text-input
                        label="Pusher cluster"
                        placeholder="Enter pusher cluster"
                        model="pusher_cluster" />
                </div>

                {{-- Pusher encryption --}}
                <div class="col-span-12 md:col-span-6">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            label="Encryption"
                            placeholder="Encryption"
                            model="pusher_encrypted"
                            :options="[ ['text' => 'Encrypted', 'value' => 1], ['text' => 'No encryption', 'value' => 0] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Enable attachments  --}}
                <div class="col-span-12 lg:col-span-4">
                    <x-forms.checkbox
                        label="Enable uploading attachments"
                        model="enable_attachments" />
                </div>

                {{-- Enable emojis  --}}
                <div class="col-span-12 lg:col-span-4">
                    <x-forms.checkbox
                        label="Enable emojis"
                        model="enable_emojis" />
                </div>

                {{-- Play new message notification sound  --}}
                <div class="col-span-12 lg:col-span-4">
                    <x-forms.checkbox
                        label="Play new message notification sound"
                        model="play_notification_sound" />
                </div>

                {{-- Allowed image extensions --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        label="Allowed image extensions"
                        placeholder="Enter allowed image extensions"
                        model="allowed_images"
                        :rows="6"
                        hint="separate them with comma without spaces" />
                </div>

                {{-- Allowed file extensions --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        label="Allowed file extensions"
                        placeholder="Enter allowed file extensions"
                        model="allowed_files"
                        :rows="6"
                        hint="separate them with comma without spaces" />
                </div>

                {{-- Max file size --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="Max file size"
                        placeholder="Set maximum file size in MB"
                        model="max_file_size" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>