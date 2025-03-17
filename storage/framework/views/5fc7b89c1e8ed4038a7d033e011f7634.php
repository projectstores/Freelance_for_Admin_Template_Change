<div class="w-full">

    <?php if(request()->is('/')): ?>

         
         <div class="relative hidden md:block mb-16" style="margin-top: -50px">
 
             
             <div class="relative flex items-center justify-between overflow-y-auto transition-colors duration-300 space-x-5 rtl:space-x-reverse scrollbar-thin scrollbar-thumb-gray-400 dark:scrollbar-thumb-zinc-600 scrollbar-track-gray-50 dark:scrollbar-track-zinc-400 p-4">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div data-popover-target="popover-subcategories-<?php echo e($category->uid, false); ?>" data-popover-trigger="hover" class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border-2 border-gray-100 p-4" style="width: 300px; height: 120px;">
                        <img class="object-cover max-h-8 lazy h-8 w-auto w-8" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($category->icon), false); ?>">
                        <button class="block text-[14px] font-medium text-left text-gray-700 dark:text-gray-300 py-2 focus:outline-none focus:ring-0">
                            <?php echo e($category->name, false); ?>

                        </button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
 
             
             <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if(count($category->subcategories)): ?>
                     <div data-popover id="popover-subcategories-<?php echo e($category->uid, false); ?>" data-popover-placement="bottom" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white rounded-md shadow-xl opacity-0 dark:text-zinc-400 dark:bg-zinc-800">
                         <ul class="max-h-96 !overflow-y-auto scrollbar-thin scrollbar-thumb-primary-600 scrollbar-track-white dark:scrollbar-track-zinc-800">
 
                             <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li class="first:rounded-t-md">
                                     <a href="<?php echo e(url('categories/' . $category->slug . '/' . $sub->slug), false); ?>" class="flex items-center py-2 px-3 hover:bg-gray-50 dark:hover:bg-zinc-700" style="border-radius: inherit">
                                         <?php if($sub->icon): ?>
                                             <div class="flex-shrink-0 ltr:mr-2 rtl:ml-2">
                                                 <img class="w-7 h-7 lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($sub->icon), false); ?>" alt="<?php echo e($sub->name, false); ?>">
                                             </div>
                                         <?php endif; ?>
                                         <div class="flex-1 min-w-0">
                                             <p class="text-[13px] font-semibold text-gray-700 truncate dark:text-zinc-200 group-hover:text-primary-600">
                                                 <?php echo e($sub->name, false); ?>

                                             </p>
                                         </div>
                                     </a>
                                 </li>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                         </ul>
                         <div class="bg-gray-50 dark:bg-zinc-700 rounded-b-md text-center">
                             <a href="<?php echo e(url('categories', $category->slug), false); ?>" class="block px-1 py-4 text-gray-500 dark:text-zinc-300 hover:text-primary-600 hover:underline text-xs tracking-wide font-semibold">
                                 <?php echo e(__('messages.t_browse_parent_category', ['category' => $category->name]), false); ?>

                             </a>
                         </div>
                     </div>
                 <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
         </div>
    <?php endif; ?>


    <div class="grid grid-cols-12 gap-6">

        <!---->
        <!--<?php if(settings('appearance')->is_featured_categories && $categories && $categories->count()): ?>-->
        <!--    <div class="col-span-12 mt-6 xl:mt-6 mb-16">-->
        <!--        <span class="font-semibold text-gray-400 dark:text-gray-200 uppercase tracking-wider text-center block"><?php echo e(__('messages.t_featured_categories'), false); ?></span>-->
        <!--        <div class="flex-wrap justify-center items-center mt-8 -mx-5 hidden" id="featured-categories-slick" wire:ignore>-->

        <!--            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
        <!--            <a href="<?php echo e(url('categories', $category->slug), false); ?>" class="relative !h-72 rounded-lg !p-6 !flex !flex-col overflow-hidden group mx-5">-->
        <!--                <span aria-hidden="true" class="absolute inset-0">-->
        <!--                    <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($category->image), false); ?>" alt="<?php echo e($category->name, false); ?>" class="lazy w-full h-full object-center object-cover opacity-70 group-hover:opacity-100">-->
        <!--                </span>-->
        <!--                <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-90"></span>-->
        <!--                <span class="relative mt-auto text-center text-xl font-bold text-white"><?php echo e($category->name, false); ?></span>-->
        <!--            </a>-->
        <!--            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                            
        <!--        </div>-->
        <!--    </div>-->
        <!--<?php endif; ?>-->

        
        <?php if(settings('appearance')->is_best_sellers && $sellers && $sellers->count()): ?>
            <div class="col-span-12 mt-6 xl:mt-6 mb-16">
                <span class="font-semibold text-gray-400 dark:text-gray-200 uppercase tracking-wider text-center block"><?php echo e(__('messages.t_top_sellers'), false); ?></span>
                <a href="<?php echo e(url('sellers'), false); ?>" class="mt-1 text-primary-600 hover:text-primary-700 text-xs font-medium uppercase tracking-widest text-center block"><?php echo e(__('messages.t_view_more'), false); ?></a>

                <ul class="flex-wrap justify-center items-center mt-8 -mx-5 hidden" id="top-sellers-slick" wire:ignore>
                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="col-span-1 flex flex-col text-center bg-white dark:bg-zinc-800 rounded-md shadow divide-y divide-gray-200 dark:divide-zinc-700 mx-5">
                        <div class="px-4 py-8">
        
                            
                            <a href="<?php echo e(url('profile', $seller->username), false); ?>" target="_blank" class="inline-block relative">
                                <img class="h-16 w-16 rounded-full object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($seller->avatar), false); ?>" alt="<?php echo e($seller->username, false); ?>">
                                <?php if($seller->isOnline() && !$seller->availability): ?>
                                    <span class="absolute top-0.5 ltr:right-0.5 rtl:left-0.5 block h-3 w-3 rounded-full ring-2 ring-white dark:ring-zinc-800 bg-green-400"></span>
                                <?php elseif($seller->availability): ?>
                                    <span class="absolute top-0.5 ltr:right-0.5 rtl:left-0.5 block h-3 w-3 rounded-full ring-2 ring-white dark:ring-zinc-800 bg-gray-400"></span>
                                <?php else: ?>
                                    <span class="absolute top-0.5 ltr:right-0.5 rtl:left-0.5 block h-3 w-3 rounded-full ring-2 ring-white dark:ring-zinc-800 bg-red-400"></span>
                                <?php endif; ?>
                            </a>

                            
                            <a href="<?php echo e(url('profile', $seller->username), false); ?>" target="_blank" class="mt-4 text-gray-900 dark:text-gray-200 text-sm font-bold tracking-wider flex items-center justify-center">
                                <?php echo e($seller->username, false); ?>

                                <?php if($seller->status === 'verified'): ?>
                                    <img data-tooltip-target="tooltip-account-verified-<?php echo e($seller->id, false); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>">
                                    <div id="tooltip-account-verified-<?php echo e($seller->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <?php echo e(__('messages.t_account_verified'), false); ?>

                                    </div>
                                <?php endif; ?>
                            </a>

                            <dl class="mt-1 flex-grow flex flex-col justify-between">
                                <dt class="sr-only">Level</dt>
                                <dd class="text-[11px] font-medium uppercase tracking-widest" style="color:<?php echo e($seller->level->level_color, false); ?>"><?php echo e($seller->level->title, false); ?></dd>
                                <dt class="sr-only">Skills</dt>
                                <dd class="mt-5 space-x-1 rtl:space-x-reverse">

                                    
                                    <div class="flex items-center justify-center mb-5" wire:ignore>

                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        
                                        
                                        <?php if($seller->rating() == 0): ?>
                                            <div class=" text-[13px] tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black"><?php echo e(__('messages.t_n_a'), false); ?></div>
                                        <?php else: ?>
                                            <div class=" text-sm tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black"><?php echo e($seller->rating(), false); ?></div>
                                        <?php endif; ?>
                        
                                        
                                        <div class="ltr:ml-2 rtl:mr-2 text-[13px] font-normal text-gray-400 dark:text-gray-300">
                                            ( <?php echo e(number_format($seller->reviews()->count()), false); ?> )
                                        </div>
                                        
                                    </div>

                                    
                                    <?php if($seller->skills()->count()): ?>
                                        <div class="h-16">
                                            <?php $__currentLoopData = $seller->skills()->InRandomOrder()->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="inline-flex mb-2 px-3 py-1.5 items-center text-gray-800 text-xs font-medium bg-gray-100 dark:bg-zinc-700 dark:text-zinc-300 rounded-full">
                                                    <?php echo e($skill->name, false); ?>

                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="h-16"></div>
                                    <?php endif; ?>
                                    
                                </dd>
                            </dl>
        
                        </div>
        
                        
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200 rtl:divide-x-reverse bg-gray-100 dark:bg-zinc-700 dark:divide-zinc-700 rounded-b-lg">
        
                                <?php if(auth()->guard()->check()): ?>
                                    
                                    <div class="w-0 flex-1 flex">
                                        <a href="<?php echo e(url('messages/new', $seller->username), false); ?>" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-xs text-gray-700 dark:text-zinc-300 dark:hover:text-zinc-100 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                            <svg class="w-5 h-5 text-gray-400 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/> <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/> </svg>
                                            <span class="ml-2"><?php echo e(__('messages.t_contact_me'), false); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if(auth()->guard()->guest()): ?>
                                    
                                    <div class="w-0 flex-1 flex">
                                        <a href="<?php echo e(url('profile', $seller->username), false); ?>" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-xs text-gray-700 dark:text-zinc-300 dark:hover:text-zinc-100 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 dark:text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/></svg>
                                            <span class="ml-2"><?php echo e(__('messages.t_view_profile'), false); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
        
                            </div>
                        </div>
        
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            </div>
        <?php endif; ?>
        
        
        <?php
            $popular_tags = App\Models\Category::whereHas('gigs')->withCount('gigs')->take(6)->orderBy('gigs_count')->get();
            
            $colorPalette = [
                '#e0906e',
                '#948e68',
                '#a65d5d',
                '#202c45',
                '#d9893d',
                '#74ad53',
            ];
            
            
        ?>
        
        <?php if(settings('home')->show_popular_services && $categories && $categories->count()): ?>
        <div class="col-span-12 mb-16">

            
            <div class="block mb-10">
                <div class="flex justify-between items-center bg-transparent py-2">

                    <div>
                        <span class="font-extrabold text-3xl text-gray-800 dark:text-gray-100 pb-1 block" style="font-size: 3em">
                            <?php echo app('translator')->get('messages.t_popular_services'); ?>    
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 sm:gap-x-9 gap-y-6">
            
                <?php $__currentLoopData = $popular_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                    <?php
                        $colorIndex = $index % count($colorPalette);
                    ?>
                
                    <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-2">
                        <div class="gig-card" x-data="window._<?php echo e($tag->uid, false); ?>" dir="<?php echo e(config()->get('direction'), false); ?>">
                            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-sm m-10" style="background-color: <?php echo e($colorPalette[$colorIndex], false); ?>">
                                
                                <div class="flex flex-col justify-left items-left h-full">
                                    
                                    <a href="<?php echo e(url('categories', $tag->slug), false); ?>" class="gig-card-title font-semibold text-white dark:text-white mb-0 mt-5 px-4 !overflow-hidden text-lg">
                                        <?php echo e(htmlspecialchars_decode($tag->name), false); ?>

                                    </a>
                                </div>
                                
                                <br>
                                
                                
                                <a href="<?php echo e(url('categories', $tag->slug), false); ?>" class="flex items-center justify-center overflow-hidden w-full h-40 dark:bg-zinc-700 mb-20">
                                    <img class="object-cover max-h-40 lazy h-40 w-auto" width="200" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($tag->image), false); ?>" alt="<?php echo e($tag->name, false); ?>">
                                </a>
                                
                                <br>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if(settings('home')->show_made_with): ?>
        
        <div class="col-span-12 mb-16">

            
            <div class="block mb-10">
                <div class="flex justify-between items-center bg-transparent py-2">

                    <div>
                        <span class="font-extrabold text-3xl text-gray-800 dark:text-gray-100 pb-1 block" style="font-size: 3em; line-height: 1.1em">
                          <?php echo __('messages.t_benefits_title'); ?>

                        </span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 sm:gap-x-9 gap-y-6">
          
                <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
                    <div class="bg-white dark:bg-zinc-800 rounded-md">
                    
                        <img src="<?php echo e(src( settings('home')->benefits_logo_1 ), false); ?>" class="h-20 rounded-lg intense cursor-pointer object-cover">   
                       
                        <div class="font-extrabold text-2xl text-gray-800 dark:text-gray-100 pb-1 block mb-6 mt-3">
                            <?php echo e(__('messages.t_benefits_1_title'), false); ?>

                        </div>
                        
                        <div class="text-lg text-gray-600 dark:text-gray-100 pb-1 block">
                            <?php echo e(__('messages.t_benefits_1_subtitle'), false); ?>

                        </div>
                    </div>
                </div>
                
                <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
                    <div class="bg-white dark:bg-zinc-800 rounded-md">
                    
                        <img src="<?php echo e(src( settings('home')->benefits_logo_2 ), false); ?>" class="h-20 rounded-lg intense cursor-pointer object-cover">   
                        <div class="font-extrabold text-2xl text-gray-800 dark:text-gray-100 pb-1 block mb-6 mt-3">
                            <?php echo e(__('messages.t_benefits_2_title'), false); ?>

                        </div>
                        
                        <div class="text-lg text-gray-600 dark:text-gray-100 pb-1 block">
                            <?php echo e(__('messages.t_benefits_2_subtitle'), false); ?>

                        </div>
                    </div>
                </div>
                
                <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
                    <div class="bg-white dark:bg-zinc-800 rounded-md">
                    
                        <img src="<?php echo e(src( settings('home')->benefits_logo_3 ), false); ?>" class="h-20 rounded-lg intense cursor-pointer object-cover">   
                        <div class="font-extrabold text-2xl text-gray-800 dark:text-gray-100 pb-1 block mb-6 mt-3">
                            <?php echo e(__('messages.t_benefits_3_title'), false); ?>

                        </div>
                        
                        <div class="text-lg text-gray-600 dark:text-gray-100 pb-1 block">
                            <?php echo e(__('messages.t_benefits_3_subtitle'), false); ?>

                        </div>
                    </div>
                </div>
                
                <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
                    <div class="bg-white dark:bg-zinc-800 rounded-md">
                    
                        <img src="<?php echo e(src( settings('home')->benefits_logo_4 ), false); ?>" class="h-20 rounded-lg intense cursor-pointer object-cover">   
                        <div class="font-extrabold text-2xl text-gray-800 dark:text-gray-100 pb-1 block mb-6 mt-3">
                            <?php echo e(__('messages.t_benefits_4_title'), false); ?>

                        </div>
                        
                        <div class="text-lg text-gray-600 dark:text-gray-100 pb-1 block">
                            <?php echo e(__('messages.t_benefits_4_subtitle'), false); ?>

                        </div>
                    </div>
                </div>
                
            </div>
            
            
        </div>
        <?php endif; ?>
        
        <?php if(settings('home')->show_home_video): ?>
        
        <div class="col-span-12 mb-16">
            <div style="position: relative;padding-bottom: 56.25%;/* 16:9 */padding-top: 25px;height: 0;">
                <iframe style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;border-radius: 20px" width="560" height="349" src="https://www.youtube.com/embed/<?php echo e(settings('home')->youtube_video_id, false); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <?php endif; ?>
  
        
        <?php if($gigs && !$gigs->isEmpty()): ?>
            <div class="col-span-12 mb-16">

                
                <div class="block mb-6">
                    <div class="flex justify-between items-center bg-transparent py-2">

                        <div class="block mb-4">
                            <div class="flex justify-between items-center bg-transparent py-2">
            
                                <div>
                                    <span class="font-extrabold text-3xl text-gray-800 dark:text-gray-100 pb-1 block" style="font-size: 3em; line-height: 1.1em">
                                       Explore and Experience
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="block mb-4">
                            <a href="<?php echo e(url('search'), false); ?>" class="hidden text-sm font-semibold text-primary-600 hover:text-primary-700 sm:block">
                                <?php echo e(__('messages.t_view_more'), false); ?>

                                
                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden ltr:inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>

                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden rtl:inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="grid grid-cols-12 sm:gap-x-9 gap-y-6">
                    <?php $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('gig-item-' . $gig->uid)) {
    $componentId = $_instance->getRenderedChildComponentId('gig-item-' . $gig->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName('gig-item-' . $gig->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gig-item-' . $gig->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('gig-item-' . $gig->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if(settings('home')->show_made_with): ?>
        
        <div class="col-span-12 mb-16">

            
            <div class="block mb-3">
                <div class="flex justify-between items-center bg-transparent py-2">

                    <div class="block mb-3">
                        <div class="flex justify-between items-center bg-transparent py-2">
        
                            <div>
                                <span class="font-extrabold text-3xl text-gray-800 dark:text-gray-100 pb-1 block" style="font-size: 3em; line-height: 1.1em">
                                   Made with <?php echo e(settings('general')->title, false); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
            
                $made_with_images = App\Models\FileManager::where('file_folder', 'site/home/madewith')->get();
            
            ?>

            <div class="grid grid-cols-12 sm:gap-x-9 gap-y-6">
                <?php $__currentLoopData = $made_with_images->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e(src ( $image ), false); ?>" class="rounded-lg w-full mb-8">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
         <?php endif; ?>
        
        
        <?php if(settings('newsletter')->is_enabled): ?>
            <div class="col-span-12 mb-16">
                <div class="bg-black dark:bg-zinc-800 rounded-lg p-10 flex items-center sm:p-10 m-20">
                
                    <div class="w-30">
                    
                        <div class="max-w-lg mx-auto" style="padding: 20px">
                            <div class="text-white font-extrabold text-center mb-2 lg:mb-5 xl:mb-6 newsletter-font-size">
                                <?php echo e(__('messages.t_sign_up_for_newsletter'), false); ?>

                            </div>
                            <h3 class="text-white font-normal text-base text-center mb-3 lg:mb-8 xl:mb-10" style="font-size: 1.3em;">
                                <?php echo e(__('messages.t_sign_up_for_newsletter_subtitle'), false); ?>

                            </h3>
                            <div class="mt-4 sm:mt-6 sm:flex">
                                <label for="email-address" class="sr-only">Email address</label>
                                <input wire:model.defer="email" id="email-address" type="text" autocomplete="email" required="" placeholder="<?php echo e(__('messages.t_enter_email_address'), false); ?>" class="h-14 appearance-none min-w-0 w-full bg-white dark:bg-zinc-700 border border-gray-300 dark:border-zinc-700 rounded-md shadow-sm py-2 px-4 text-sm text-gray-900 dark:text-gray-300 placeholder-gray-500 focus:outline-none focus:border-primary-600 focus:ring-1 focus:ring-primary-600" readonly onfocus="this.removeAttribute('readonly');">
                                <div class="mt-3 sm:flex-shrink-0 sm:mt-0 ltr:sm:ml-4 rtl:sm:mr-4">
                                    <button wire:click="newsletter" wire:loading.attr="disabled" wire:target="newsletter" type="button" class="dark:disabled:bg-zinc-500 dark:disabled:text-zinc-400 disabled:cursor-not-allowed disabled:!bg-gray-400 disabled:text-gray-500 h-14 w-full bg-primary-600 border border-transparent rounded-md shadow-sm py-2 px-4 flex items-center justify-center text-sm font-bold tracking-wider text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-primary-600">
                                        <?php echo e(__('messages.t_signup'), false); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="w-70 hidden sm:block pl-10">
                        <img src="<?php echo e(src ( settings('newsletter')->image ), false); ?>" class="rounded-lg w-full">
                    </div>

                </div>
            </div>
        <?php endif; ?>
        
        <?php if(settings('home')->show_join_us_banner): ?>
        <div class="col-span-12">
            <div class="bg-primary rounded-lg p-6 flex items-center sm:p-10 bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.3)),url('/public/storage/site/employees.jpg'); background-attachment: fixed;">
                <div class="max-w-xl mx-auto">
                    <h3 class="font-extrabold text-white text-2xl text-center mb-10" style="font-size: 3em; line-height: 1.1em">
                        <?php echo e(__('messages.t_freelance_service_fingertips'), false); ?>

                    </h3> 
                    <span class="flex justify-center">
                        <a href="/auth/register" class="inline-block px-10 py-3 bg-primary-600 dark:bg-primary-700 hover:bg-green-600 text-white font-semibold rounded-lg shadow-md transition duration-300 ease-in-out">
                            Join Us
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <?php endif; ?>
                
    </div>
</div>

<?php $__env->startPush('scripts'); ?>

    
    <?php if(settings('appearance')->is_featured_categories || settings('appearance')->is_best_sellers): ?>
        <script defer type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <?php endif; ?>

    
    <?php if(settings('appearance')->is_featured_categories && $categories && $categories->count()): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function(){
                // Init featured categories slick
                $('#featured-categories-slick').slick({
                    dots          : false,
                    autoplay      : true,
                    infinite      : true,
                    speed         : 300,
                    slidesToShow  : 6,
                    slidesToScroll: 1,
                    arrows        : false,
                    responsive    : [
                        {
                        breakpoint: 1024,
                            settings: {
                                slidesToShow  : 4,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 800,
                            settings: {
                                slidesToShow  : 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 600,
                            settings: {
                                slidesToShow  : 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 480,
                            settings: {
                                slidesToShow  : 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
                $('#featured-categories-slick').removeClass('hidden');
            });
        </script>
    <?php endif; ?>

    
    <?php if(settings('appearance')->is_best_sellers && $sellers && $sellers->count()): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function(){
                // Init featured categories slick
                $('#top-sellers-slick').slick({
                    dots          : false,
                    autoplay      : true,
                    infinite      : true,
                    speed         : 300,
                    slidesToShow  : 5,
                    slidesToScroll: 1,
                    arrows        : false,
                    responsive    : [
                        {
                        breakpoint: 1024,
                            settings: {
                                slidesToShow  : 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 800,
                            settings: {
                                slidesToShow  : 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 600,
                            settings: {
                                slidesToShow  : 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                        breakpoint: 480,
                            settings: {
                                slidesToShow  : 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
                $('#top-sellers-slick').removeClass('hidden');
            });
        </script>
    <?php endif; ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>

    
    <?php if(settings('appearance')->is_featured_categories || settings('appearance')->is_best_sellers): ?>
        <link rel="preload" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" type="text/css" as="style" onload="this.onload=null;this.rel='stylesheet';"/>
    <?php endif; ?>
        
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp_8.2\htdocs\Freelancer_Work\Freelancer_Work_New\resources\views/livewire/main/home/home.blade.php ENDPATH**/ ?>