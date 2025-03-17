{{-- -------------------- The default card (white) -------------------- --}}
@if($viewType == 'default')
    @if($from_id != $to_id)
    
        @php
            $fetch = App\Models\User::where('id', $to_id)
                                ->select('id', 'uid', 'username', 'fullname', 'avatar_id', 'active_status')
                                ->with('avatar', function($query) {
                                    return $query->select('id', 'file_extension', 'file_folder', 'uid');
                                })
                                ->first();
    
        @endphp
        
        <div class="message-card flex items-start space-x-4 xs:px-2 md:px-10 mt-5" data-id="{{ $id }}">
            <!-- Avatar (Circle) -->
            <div class="w-12 h-12 rounded-full bg-gray-300 flex-shrink-0" style="background-image: url('{{ src($fetch->avatar) }}');background-repeat: no-repeat; background-position: center center; background-size: cover;">
            </div>
        
            <!-- Message Content -->
            <div class="flex-grow">
                <!-- Username and Time (One Line) -->
                <div class="flex justify-start items-center mb-1">
                    <p class="text-base font-semibold text-black">{{ $fetch->username }}</p>
                    <p class="text-sm text-gray-400 mx-3">{{ $time }}</p>
                    <p class="text-sm text-gray-400">
                        {{-- Messages status --}}
                        <div class="message-seen-status">
                            @if ($seen)
                                <svg class="text-blue-500 w-4.5 h-4.5 -mt-px message-is-seen" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z"></path></g></svg>
                            @else
                                <svg class="text-gray-300 dark:text-zinc-300 w-4.5 h-4.5 -mt-px message-not-seen" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z"></path></g></svg>
                            @endif
                        </div>

                    </p>
                </div>
        
    
                <div class="text-base text-black mt-3">
                
                    {{-- Message content --}}
                    @if ($message)
                        <div title="{{ $fullTime }}">
                            {!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
                        </div>
                    @endif
        
                    {{-- Message attachment (File) --}}
                    @if(@$attachment[2] == 'file')
                        <div class="mt-2 w-fit bg-gray-200 dark:bg-zinc-700 rounded-md py-2 px-3" dir="{{ config()->get('direction') }}">
                            <div class="flex items-center justify-end space-x-5 rtl:space-x-reverse">
        
                                {{-- File icon --}}
                                <span class="fiv-sqo fiv-icon-{{ $attachment[3] }} text-4xl"></span>
            
                                {{-- File details --}}
                                <div class="flex flex-col justify-center">
            
                                    {{-- File name --}}
                                    <span class="text-[13px] font-semibold text-zinc-700 dark:text-slate-200 truncate max-w-xs">{{$attachment[1]}}</span>
            
                                    {{-- File footer --}}
                                    <div class="flex items-center space-x-3 rtl:space-x-reverse text-xs text-zinc-500 dark:text-zinc-400 mt-1">
            
                                        {{-- File size --}}
                                        <span>{{ format_bytes($attachment[4]) }}</span>
            
                                        {{-- Download --}}
                                        <a href="{{ url('inbox/download', $attachment[0]) }}" class="text-blue-600 hover:underline disabled:text-gray-400 disabled:cursor-not-allowed disabled:pointer-events-none disabled:no-underline">@lang('messages.t_download')</a>
            
                                    </div>
            
                                </div>
        
                            </div>
                        </div>
                    @endif
        
                    {{-- Message attachment (Image) --}}
                    @if(@$attachment[2] == 'image')
                        <div class="image-file chat-image w-60 h-48" style="background-image: url('{{ Chatify::getAttachmentUrl($attachment[0]) }}')"></div>
                    @endif
    
                </div>
            </div>
        </div>
    
    @endif
@endif

{{-- -------------------- Sender card (owner) -------------------- --}}
@if($viewType == 'sender')

     @php
            $fetch = App\Models\User::where('id', $to_id)
                                ->select('id', 'uid', 'username', 'fullname', 'avatar_id', 'active_status')
                                ->with('avatar', function($query) {
                                    return $query->select('id', 'file_extension', 'file_folder', 'uid');
                                })
                                ->first();
    
        @endphp
        
        <div class="message-card flex items-start space-x-4 xs:px-2 md:px-10 mt-5" data-id="{{ $id }}">
            <!-- Avatar (Circle) -->
            <div class="w-12 h-12 rounded-full bg-gray-300 flex-shrink-0" style="background-image: url('{{ src($fetch->avatar) }}');background-repeat: no-repeat; background-position: center center; background-size: cover;">
            </div>
        
            <!-- Message Content -->
            <div class="flex-grow">
                <!-- Username and Time (One Line) -->
                <div class="flex justify-start items-center mb-1">
                    <p class="text-base font-semibold text-black">{{ $fetch->username }}</p>
                    <p class="text-sm text-gray-400 mx-3">{{ $time }}</p>
                    <p class="text-sm text-gray-400">
                        {{-- Messages status --}}
                        <div class="message-seen-status">
                            @if ($seen)
                                <svg class="text-blue-500 w-4.5 h-4.5 -mt-px message-is-seen" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z"></path></g></svg>
                            @else
                                <svg class="text-gray-300 dark:text-zinc-300 w-4.5 h-4.5 -mt-px message-not-seen" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z"></path></g></svg>
                            @endif
                        </div>

                    </p>
                    <p class="text-sm text-gray-400 mx-2">
                        {{-- Delete --}}
                        <button class="text-xs font-medium !text-red-500 chatify-hover-delete-btn" data-id="{{ $id }}">
                            @lang('messages.t_delete')
                        </button>
                    </p>
                </div>
        
    
                <div class="text-base text-black mt-3">
                
                    {{-- Message content --}}
                    @if ($message)
                        <div title="{{ $fullTime }}">
                            {!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
                        </div>
                    @endif
        
                    {{-- Message attachment (File) --}}
                    @if(@$attachment[2] == 'file')
                        <div class="mt-2 w-fit border border-gray-200 dark:bg-zinc-700 rounded-md py-2 px-3" dir="{{ config()->get('direction') }}">
                            <div class="flex items-center justify-end space-x-5 rtl:space-x-reverse">
        
                                {{-- File icon --}}
                                <span class="fiv-sqo fiv-icon-{{ $attachment[3] }} text-4xl"></span>
            
                                {{-- File details --}}
                                <div class="flex flex-col justify-center">
            
                                    {{-- File name --}}
                                    <span class="text-[13px] font-semibold text-zinc-700 dark:text-slate-200 truncate max-w-xs">{{$attachment[1]}}</span>
            
                                    {{-- File footer --}}
                                    <div class="flex items-center space-x-3 rtl:space-x-reverse text-xs text-zinc-500 dark:text-zinc-400 mt-1">
            
                                        {{-- File size --}}
                                        <span>{{ format_bytes($attachment[4]) }}</span>
            
                                        {{-- Download --}}
                                        <a href="{{ url('inbox/download', $attachment[0]) }}" class="text-blue-600 hover:underline disabled:text-gray-400 disabled:cursor-not-allowed disabled:pointer-events-none disabled:no-underline">@lang('messages.t_download')</a>
            
                                    </div>
            
                                </div>
        
                            </div>
                        </div>
                    @endif
        
                    {{-- Message attachment (Image) --}}
                    @if(@$attachment[2] == 'image')
                        <div class="image-file chat-image w-60 h-48" style="background-image: url('{{ Chatify::getAttachmentUrl($attachment[0]) }}')"></div>
                    @endif
    
                </div>
            </div>
        </div>
@endif