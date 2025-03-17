<div class="w-full" x-data="window.LVoePqYZdmjQURo" x-init="initialize">

    
    <nav class="hidden justify-between px-4 text-gray-700 sm:flex sm:px-5 bg-white dark:bg-zinc-700/40 dark:border-zinc-700" aria-label="Breadcrumb">

        
        <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 rtl:space-x-reverse sm:mb-0">

            
            <li>
                <div class="flex items-center">
                    <a href="<?php echo e(url('/'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-400 hover:text-primary-600 ltr:md:ml-2 rtl:md:mr-2 dark:text-zinc-300 dark:hover:text-white">
                        <?php echo app('translator')->get('messages.t_home'); ?>
                    </a>
                </div>
            </li>

            
            <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="<?php echo e(url('explore/projects'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-400 hover:text-primary-600 ltr:md:ml-2 rtl:md:mr-2 dark:text-zinc-300 dark:hover:text-white">
                        <?php echo app('translator')->get('messages.t_projects'); ?>
                    </a>

                </div>
            </li>

            
            <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-500 truncate max-w-[18rem]">
                        <?php echo e($project->title, false); ?>

                    </span>
                </div>
            </li>

        </ol>
    </nav>

    <div>
        <div class="grid grid-cols-1 lg:grid-cols-4 lg:grid-flow-col-dense sm:mt-8">

			
			<div class="space-y-10 lg:col-start-1 lg:col-span-3">

				
				<section class="w-full">
					<div class="bg-white dark:bg-zinc-800 border-r border-gray-300 dark:border-transparent">
					
					    <div class="py-8 px-7 border-b border-gray-300 dark:bg-zinc-800">
					    
    					    
                            <h1 class="text-2xl font-extrabold tracking-wide leading-8 text-black dark:text-white sm:text-2xl mb-3">
                                <?php echo e($project->title, false); ?>

                            </h1>
                            
                            
                            <div class="flex items-center">
                                <?php
                                    $created_at = format_date($project->created_at, 'ago');
                                ?>
                                <span class="text-sm text-gray-600 dark:text-zinc-200 whitespace-nowrap"><?php echo e(__('messages.t_posted_date', ["date" => $created_at]), false); ?></span>
                            </div>
                        
                        </div>
                        
                        <div class="py-7 px-7 border-b border-gray-300 dark:bg-zinc-800">
                            <div class="text-base font-normal leading-relaxed text-black dark:text-zinc-200 block break-all" style="word-break: break-word;">
								<?php echo htmlspecialchars_decode(nl2br($project->description)); ?>

							</div>
                        </div>
                        
                        
                        <div class="py-8 px-7 border-b border-gray-300 dark:bg-zinc-800">
                          <div class="grid grid-cols-2 gap-4">
                          
                            
                            <div class="flex gap-2">
                              <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-black dark:text-white" height="24px" viewBox="0 -960 960 960" width="24px">
                                  <path d="M446-80q-15 0-30-6t-27-18L103-390q-12-12-17.5-26.5T80-446q0-15 5.5-30t17.5-27l352-353q11-11 26-17.5t31-6.5h287q33 0 56.5 23.5T879-800v287q0 16-6 30.5T856-457L503-104q-12 12-27 18t-30 6Zm0-80 353-354v-286H513L160-446l286 286Zm253-480q25 0 42.5-17.5T759-700q0-25-17.5-42.5T699-760q-25 0-42.5 17.5T639-700q0 25 17.5 42.5T699-640ZM480-480Z"/>
                                </svg>
                              </div>
                              <div class="text-sm text-zinc-900 dark:text-white sm:col-span-2 sm:mt-0 font-semibold">
                                <div class="text-black dark:text-white"><?php echo money($project->budget_min, settings('currency')->code, true); ?> – <?php echo money($project->budget_max, settings('currency')->code, true); ?></div>
                                <div class="text-gray-500 dark:text-zinc-300 font-normal"><?php echo app('translator')->get('messages.t_budget'); ?></div>
                              </div>
                            </div>
                            
                            
                            <div class="flex gap-2">
                              <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-black dark:text-white" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M560-440q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM280-320q-33 0-56.5-23.5T200-400v-320q0-33 23.5-56.5T280-800h560q33 0 56.5 23.5T920-720v320q0 33-23.5 56.5T840-320H280Zm80-80h400q0-33 23.5-56.5T840-480v-160q-33 0-56.5-23.5T760-720H360q0 33-23.5 56.5T280-640v160q33 0 56.5 23.5T360-400Zm440 240H120q-33 0-56.5-23.5T40-240v-440h80v440h680v80ZM280-400v-320 320Z"/></svg>
                              </div>
                              <div class="text-sm text-zinc-900 dark:text-white sm:col-span-2 sm:mt-0 font-semibold">
                                <div class="text-black dark:text-white">
                                    <?php if($project->budget_type === 'fixed'): ?>
										<?php echo app('translator')->get('messages.t_fixed_price'); ?>
									<?php else: ?>
										<?php echo app('translator')->get('messages.t_hourly_price'); ?>
									<?php endif; ?>
                                </div>
                                <div class="text-gray-500 dark:text-zinc-300 font-normal"><?php echo app('translator')->get('messages.t_budget_type'); ?></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="py-8 px-7 border-b border-gray-300">
                            
							<div class="flex items-center">
								<div class="text-sm font-bold text-black dark:text-zinc-300 mr-2"><?php echo app('translator')->get('messages.t_project_type'); ?></div>
								<div class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2 sm:mt-0">
									
									<?php switch($project->status):

										
										case ('active'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_active'); ?>
											</span>
											<?php break; ?>

										
										<?php case ('pending_approval'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_pending_approval'); ?>
											</span>
											<?php break; ?>

										
										<?php case ('pending_payment'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_pending_payment'); ?>
											</span>
											<?php break; ?>

										
										<?php case ('completed'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_completed'); ?>
											</span>
											<?php break; ?>

										
										<?php case ('hidden'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_hidden'); ?>
											</span>
											<?php break; ?>

										
										<?php case ('rejected'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_rejected'); ?>
											</span>
											<?php break; ?>

										
										<?php case ('under_development'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_under_development'); ?>
											</span>
											<?php break; ?>

										
										<?php case ('pending_final_review'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_pending_final_review'); ?>
											</span>
											<?php break; ?>

										
										<?php case ('incomplete'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_incomplete'); ?>
											</span>
											<?php break; ?>

										
										<?php case ('closed'): ?>
											<span class="text-base text-black inline-block">
												<?php echo app('translator')->get('messages.t_closed'); ?>
											</span>
											<?php break; ?>

										<?php default: ?>
											
									<?php endswitch; ?>

								</div>
							</div>
                        </div>
                        
                        <div class="py-8 px-7 border-b border-gray-300">
                            <h2 class="mb-4 font-bold text-black dark:text-zinc-300 text-xl"><?php echo app('translator')->get('messages.t_skills_and_expertise'); ?></h2>  
							<?php $__currentLoopData = $project->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a class="bg-gray-200 hover:bg-primary-500 text-gray-500 hover:text-white text-sm font-semibold ltr:mr-3 rtl:ml-3 ltr:first:mr-0 rtl:first:ml-0 px-3 py-1 rounded-lg dark:bg-zinc-700 dark:text-zinc-300 transition-colors duration-200 mb-2 inline-block" href="<?php echo e(url('explore/projects/' . $project->category->slug . '/' . $skill->skill->slug), false); ?>">
									<?php echo e($skill->skill->name, false); ?>

								</a>   
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        </div>

                        <?php if(auth()->guard()->check()): ?>
        					<?php if(auth()->id() != $project->user_id && $project->status === 'active' && !$already_submitted_proposal && auth()->user()->account_type === 'seller'): ?>
        						<div class="py-8 px-7">
        
        							
        							<?php if($project->status === 'active'): ?>
        								<div class="rounded-md bg-yellow-50 dark:bg-zinc-700 p-4">
        									<div class="flex">
        										<div class="flex-shrink-0">
        											<svg class="h-5 w-5 text-yellow-400 dark:text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
        										</div>
        										<div class="ltr:ml-3 rtl:mr-3">
        											<h3 class="text-sm font-medium text-yellow-800 dark:text-zinc-100"><?php echo e(__('messages.t_beware_of_scams'), false); ?></h3>
        											<div class="mt-2 text-sm text-yellow-700 dark:text-zinc-300">
        												<p>
        													<?php echo e(__('messages.t_beware_of_scams_details'), false); ?>      
        												</p>
        											</div>
        										</div>
        									</div>
        								</div>
        							<?php endif; ?>
        
        						</div>
						    <?php endif; ?>
						<?php endif; ?>
						
						<?php if(auth()->guard()->check()): ?>
        					<?php if(auth()->id() == $project->user_id): ?>
        						<div class="py-8 px-7">
                                    <div class="flex items-center justify-between relative">
                                        <div>
                                            <h2 class="font-bold text-black dark:text-zinc-300 text-xl"><?php echo app('translator')->get('messages.t_proposals'); ?></h2>
                                            <span class="font-light text-gray-400 dark:text-zinc-300 text-sm"><?php echo app('translator')->get('messages.t_proposals_subtitle'); ?></span>
                                        </div>
                                        <div class="relative">
                                            <div wire:loading wire:target="filter" wire:loading.block>
                                                <div class="absolute w-full h-full flex items-center justify-center bg-black bg-opacity-50 z-50 rounded-lg">
                                                    <div class="lds-ripple"><div></div><div></div></div>
                                                </div>
                                            </div>
                                            
                                            
                							<div class="flex items-center">
                
                								
                								<div x-data="{ open: false }" class="relative inline-block">
                
                									
                									<button type="button" aria-haspopup="true" x-bind:aria-expanded="open" x-on:click="open = true" aria-expanded="true" class="inline-flex justify-center items-center space-x-2 rtl:space-x-reverse rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-transparent dark:text-zinc-300 dark:hover:bg-zinc-600">
                										<svg class="inline-block w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M7 11h10v2H7zM4 7h16v2H4zm6 8h4v2h-4z"></path></svg>
                										<span><?php echo app('translator')->get('messages.t_filter'); ?></span>
                										<svg class="inline-block w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
                									</button>
                								
                									
                									<div 
                										x-show="open" 
                										x-transition:enter="transition ease-out duration-150" 
                										x-transition:enter-start="transform opacity-0 scale-75" 
                										x-transition:enter-end="transform opacity-100 scale-100" 
                										x-transition:leave="transition ease-in duration-100" 
                										x-transition:leave-start="transform opacity-100 scale-100" 
                										x-transition:leave-end="transform opacity-0 scale-75" 
                										x-on:click.outside="open = false" role="menu" 
                										class="absolute ltr:right-0 rtl:left-0 ltr:origin-top-right rtl:origin-top-left mt-2 w-32 shadow-xl rounded z-30"
                										style="display: none">
                										<div class="bg-white ring-1 ring-black ring-opacity-5 rounded divide-y divide-gray-100 dark:bg-zinc-600">
                											<div class="p-2 space-y-1">
                
                												
                												<button wire:click="filter('newest')" role="menuitem" class="w-full flex items-center rounded py-2 px-3 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none dark:text-zinc-300 dark:hover:bg-zinc-500 dark:hover:text-zinc-200">
                													<span><?php echo app('translator')->get('messages.t_newest'); ?></span>
                												</button>
                
                												
                												<button wire:click="filter('oldest')" role="menuitem" class="w-full flex items-center rounded py-2 px-3 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none dark:text-zinc-300 dark:hover:bg-zinc-500 dark:hover:text-zinc-200">
                													<span><?php echo app('translator')->get('messages.t_oldest'); ?></span>
                												</button>
                
                												
                												<button wire:click="filter('fastest')" role="menuitem" class="w-full flex items-center rounded py-2 px-3 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none dark:text-zinc-300 dark:hover:bg-zinc-500 dark:hover:text-zinc-200">
                													<span><?php echo app('translator')->get('messages.t_fastest'); ?></span>
                												</button>
                
                												
                												<button wire:click="filter('cheapest')" role="menuitem" class="w-full flex items-center rounded py-2 px-3 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none dark:text-zinc-300 dark:hover:bg-zinc-500 dark:hover:text-zinc-200">
                													<span><?php echo app('translator')->get('messages.t_cheapest'); ?></span>
                												</button>
                												
                											</div>
                										</div>
                									</div>
                
                								</div>
                
                							</div>
                                        </div>
                                    </div>
        
                
                					
                					<?php if($project->status === 'closed'): ?>
                						<div class="bg-white shadow-sm rounded-lg px-6 sm:px-12 py-6 sm:py-12 mt-8 grid text-center items-center justify-center">
                							<div class="w-52 h-52 bg-gray-50 rounded-full flex items-center justify-center">
                								<svg class="w-40 h-40 text-zinc-400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-name="Layer 1" viewBox="0 0 807.45276 499.98424"><path id="ad903c08-5677-4dbe-a9c7-05a0eb46801f-1657" data-name="Path 461" d="M252.30849,663.16553a22.728,22.728,0,0,0,21.947-3.866c7.687-6.452,10.1-17.081,12.058-26.924l5.8-29.112-12.143,8.362c-8.733,6.013-17.662,12.219-23.709,20.929s-8.686,20.6-3.828,30.024" transform="translate(-196.27362 -200.00788)" fill="#e6e6e6"/><path id="a94887ac-0642-4b28-b311-c351a0f7f12b-1658" data-name="Path 462" d="M253.34651,698.41151c-1.229-8.953-2.493-18.02-1.631-27.069.766-8.036,3.217-15.885,8.209-22.321a37.13141,37.13141,0,0,1,9.527-8.633c.953-.6,1.829.909.881,1.507a35.29989,35.29989,0,0,0-13.963,16.847c-3.04,7.732-3.528,16.161-3,24.374.317,4.967.988,9.9,1.665,14.83a.9.9,0,0,1-.61,1.074.878.878,0,0,1-1.074-.61Z" transform="translate(-196.27362 -200.00788)" fill="#f2f2f2"/><path d="M496.87431,505.52556a6.9408,6.9408,0,0,1-2.85071.67077l-91.60708,2.51425a14.3796,14.3796,0,0,1-.62506-28.75241l91.60729-2.51381a7.00744,7.00744,0,0,1,7.15064,6.8456l.32069,14.75586a7.01658,7.01658,0,0,1-3.99577,6.47974Z" transform="translate(-196.27362 -200.00788)" fill="currentColor"/><path d="M379.332,698.59808H364.57245a7.00786,7.00786,0,0,1-7-7V568.58392a7.00785,7.00785,0,0,1,7-7H379.332a7.00786,7.00786,0,0,1,7,7V691.59808A7.00787,7.00787,0,0,1,379.332,698.59808Z" transform="translate(-196.27362 -200.00788)" fill="currentColor"/><path d="M418.52435,698.59808H403.76459a7.00786,7.00786,0,0,1-7-7V568.58392a7.00785,7.00785,0,0,1,7-7h14.75976a7.00786,7.00786,0,0,1,7,7V691.59808A7.00787,7.00787,0,0,1,418.52435,698.59808Z" transform="translate(-196.27362 -200.00788)" fill="currentColor"/><circle cx="196.71571" cy="182.69717" r="51" fill="currentColor"/><path d="M410.30072,605.205H373.61127a43.27708,43.27708,0,0,1-37.56043-65.05664l51.30933-88.87012a6.5,6.5,0,0,1,11.2583,0l50.27612,87.08057A44.56442,44.56442,0,0,1,410.30072,605.205Z" transform="translate(-196.27362 -200.00788)" fill="#2f2e41"/><path d="M405.02686,404.114c3.30591-.0918,7.42029-.20655,10.59-2.522a8.13274,8.13274,0,0,0,3.20007-6.07275,5.47084,5.47084,0,0,0-1.86035-4.49315c-1.65552-1.39894-4.073-1.72706-6.67823-.96144l2.69922-19.72558-1.98144-.27149-3.17322,23.18994,1.65466-.75928c1.91834-.87988,4.55164-1.32763,6.188.05518a3.51514,3.51514,0,0,1,1.15271,2.89551,6.14686,6.14686,0,0,1-2.38122,4.52783c-2.46668,1.80176-5.74622,2.03418-9.46582,2.13818Z" transform="translate(-196.27362 -200.00788)" fill="#2f2e41"/><rect x="226.50312" y="172.03238" width="10.77161" height="2" fill="#2f2e41"/><rect x="192.50312" y="172.03238" width="10.77161" height="2" fill="#2f2e41"/><path d="M380.99359,593.79839a6.94088,6.94088,0,0,1-.67077-2.85072l-2.51425-91.60708a14.3796,14.3796,0,0,1,28.75241-.62506l2.51381,91.60729a7.00744,7.00744,0,0,1-6.8456,7.15064l-14.75586.32069a7.01655,7.01655,0,0,1-6.47974-3.99576Z" transform="translate(-196.27362 -200.00788)" fill="currentColor"/><path d="M388.25747,345.00549c6.19637,8.10336,16.033,13.53931,26.42938,12.25223,9.90031-1.22567,18.06785-8.12619,20.117-18.0055a29.66978,29.66978,0,0,0-7.79665-26.1905c-7.00748-7.37032-17.03634-11.335-26.96311-12.69456-18.80446-2.57537-38.1172,4.04852-52.33518,16.4023a64.1102,64.1102,0,0,0-16.69251,22.37513,62.72346,62.72346,0,0,0-5.175,27.07767c.54633,18.375,8.595,36.71479,22.48271,48.90083a63.37666,63.37666,0,0,0,5.40808,4.23578c1.58387,1.11112,3.08464-1.48868,1.51415-2.59042-14.222-9.977-23.29362-26.21093-25.78338-43.26844a59.92391,59.92391,0,0,1,14.05278-48.33971c11.48411-13.058,28.32271-21.54529,45.7628-22.30575,17.54894-.76521,39.47915,7.06943,42.7631,26.60435,1.47191,8.7558-1.801,17.95926-9.82454,22.3428-8.59053,4.69326-19.12416,2.76181-26.50661-3.29945a30.448,30.448,0,0,1-4.86258-5.01092c-1.157-1.51313-3.76387-.02044-2.59041,1.51416Z" transform="translate(-196.27362 -200.00788)" fill="#2f2e41"/><rect id="fc777aff-63b1-4720-84dc-e3a9c20790b9" data-name="ab2e16f2-9798-47da-b25d-769524f3c86f" x="484.20919" y="242.03206" width="437.1948" height="207.45652" transform="translate(-238.48792 -95.97299) rotate(-8.21995)" fill="#f1f1f1"/><rect id="ecffa418-b240-4504-be04-512edea7ccda" data-name="bf81c03f-68cf-4889-8697-1102f95f97bb" x="496.79745" y="259.81556" width="412.19197" height="173.08746" transform="translate(-238.57266 -95.95442) rotate(-8.21995)" fill="#fff"/><rect id="b49ce3f1-9d75-4481-986b-3b6beb000c79" data-name="f065dccc-d150-492a-a09f-a7f3f89523f0" x="468.80837" y="231.16611" width="437.19481" height="18.57334" transform="translate(-223.58995 -99.25677) rotate(-8.21995)" fill="#e5e5e5"/><circle id="a4219562-805a-49cd-8b89-b1f92f7a9e75" data-name="bdbbf39c-df25-4682-8b85-5a6af4a1bd14" cx="288.67474" cy="71.34324" r="3.4425" fill="#fff"/><circle id="b0f6399c-6944-4f74-a888-473f61f9730c" data-name="abcd4292-0b1f-4102-9b5e-e8bbd87baabc" cx="301.6071" cy="69.47507" r="3.4425" fill="#fff"/><circle id="b03f93dc-2c99-4323-9b17-02f51b8830c0" data-name="a3fb731e-8b3d-41ca-96f2-91600dc0b434" cx="314.54005" cy="67.6068" r="3.4425" fill="#fff"/><rect id="a6067cfc-0392-4d68-afe4-e34d11a8f0ac" data-name="ab2e16f2-9798-47da-b25d-769524f3c86f" x="370.25796" y="100.18309" width="437.1948" height="207.45652" fill="#e6e6e6"/><rect id="ecd65817-7467-4dbd-a435-c0f1d9841c98" data-name="bf81c03f-68cf-4889-8697-1102f95f97bb" x="382.75969" y="117.97286" width="412.19197" height="173.08746" fill="#fff"/><rect id="eea6c39d-8a45-4eb1-bab9-6120f465de14" data-name="f065dccc-d150-492a-a09f-a7f3f89523f0" x="370.07154" y="88.19711" width="437.19481" height="18.57334" fill="#cbcbcb"/><circle id="ab9e51f9-7431-4d30-8193-f9435a6bd5c3" data-name="bdbbf39c-df25-4682-8b85-5a6af4a1bd14" cx="383.87383" cy="99.11864" r="3.4425" fill="#fff"/><circle id="a54ed687-3b0d-413b-b405-af8897a5c032" data-name="abcd4292-0b1f-4102-9b5e-e8bbd87baabc" cx="396.94043" cy="99.11864" r="3.4425" fill="#fff"/><circle id="fd1d2195-7e97-488f-8f4b-7061a06deb9a" data-name="a3fb731e-8b3d-41ca-96f2-91600dc0b434" cx="410.00762" cy="99.11864" r="3.4425" fill="#fff"/><rect x="620.27691" y="144.28855" width="58.05212" height="4.36334" fill="#e6e6e6"/><rect x="620.27691" y="157.09784" width="89.64514" height="4.36332" fill="#e6e6e6"/><rect x="621.20899" y="169.29697" width="73.05881" height="4.36332" fill="#e6e6e6"/><rect x="620.27691" y="182.68222" width="42.65054" height="4.36332" fill="#e6e6e6"/><rect x="620.27691" y="195.75677" width="64.37073" height="4.36332" fill="#e6e6e6"/><rect x="593.81776" y="142.916" width="7.10843" height="7.10842" fill="#e6e6e6"/><rect x="593.81776" y="155.72527" width="7.10843" height="7.10841" fill="#e6e6e6"/><rect x="593.81776" y="167.92442" width="7.10843" height="7.10843" fill="#e6e6e6"/><rect x="593.81776" y="181.30967" width="7.10843" height="7.10843" fill="#e6e6e6"/><rect x="593.81776" y="194.38423" width="7.10843" height="7.10843" fill="#e6e6e6"/><rect x="620.27691" y="208.91306" width="58.05212" height="4.36332" fill="#e6e6e6"/><rect x="620.27691" y="221.72236" width="89.64514" height="4.36332" fill="#e6e6e6"/><rect x="621.20899" y="233.92149" width="73.05881" height="4.36332" fill="#e6e6e6"/><rect x="620.27691" y="247.30674" width="42.65054" height="4.36332" fill="#e6e6e6"/><rect x="620.27691" y="260.38129" width="64.37073" height="4.36332" fill="#e6e6e6"/><rect x="593.81776" y="207.54051" width="7.10843" height="7.10843" fill="#e6e6e6"/><rect x="593.81776" y="220.34979" width="7.10843" height="7.10841" fill="#e6e6e6"/><rect x="593.81776" y="232.54894" width="7.10843" height="7.10843" fill="#e6e6e6"/><rect x="593.81776" y="245.93419" width="7.10843" height="7.10843" fill="#e6e6e6"/><rect x="593.81776" y="259.00875" width="7.10843" height="7.10843" fill="#e6e6e6"/><rect x="436.63003" y="243.13905" width="58.05213" height="4.36333" fill="#e6e6e6"/><rect x="428.86266" y="254.4769" width="73.05881" height="4.36332" fill="#e6e6e6"/><path d="M699.66075,388.1056a37.91872,37.91872,0,0,1-55.87819,33.382l-.00736-.00737a37.907,37.907,0,1,1,55.88555-33.37461Z" transform="translate(-196.27362 -200.00788)" fill="#e6e6e6"/><circle cx="465.67554" cy="175.95347" r="10.30421" fill="#fff"/><path d="M679.54362,407.55657a53.11056,53.11056,0,0,1-35.56788-.13775l-.00738-.0051,7.6766-15.15329h20.60841Z" transform="translate(-196.27362 -200.00788)" fill="#fff"/><path d="M547.86351,482.19293c-17.96014,0-32.5719-15.52155-32.5719-34.60067,0-19.07858,14.61176-34.60014,32.5719-34.60014s32.5719,15.52156,32.5719,34.60014C580.43541,466.67138,565.82365,482.19293,547.86351,482.19293Zm0-60.4582c-13.13954,0-23.82929,11.59955-23.82929,25.85753s10.68975,25.85806,23.82929,25.85806,23.82928-11.60008,23.82928-25.85806S561.00305,421.73473,547.86351,421.73473Z" transform="translate(-196.27362 -200.00788)" fill="currentColor"/><path d="M578.70786,542.49212h-61.6887a20.54138,20.54138,0,0,1-20.51852-20.51826V461.46391a14.06356,14.06356,0,0,1,14.04747-14.04774h74.6308a14.06356,14.06356,0,0,1,14.04747,14.04774v60.50995A20.54138,20.54138,0,0,1,578.70786,542.49212Z" transform="translate(-196.27362 -200.00788)" fill="#3f3d56"/><path d="M559.88461,481.84022a12.0211,12.0211,0,1,0-17.48524,10.69829v18.808h10.92827v-18.808A12.01088,12.01088,0,0,0,559.88461,481.84022Z" transform="translate(-196.27362 -200.00788)" fill="#fff"/><path d="M578.27362,699.99212h-381a1,1,0,0,1,0-2h381a1,1,0,0,1,0,2Z" transform="translate(-196.27362 -200.00788)" fill="#3f3d56"/></svg>
                							</div>
                							<h2 class="mt-5 block text-sm font-semibold text-zinc-800"><?php echo app('translator')->get('messages.t_this_project_is_closed_for_bidding'); ?></h2>
                							<a href="<?php echo e(url('explore/projects'), false); ?>" class="text-primary-600 text-[13px] hover:underline font-normal tracking-wide mt-1"><?php echo app('translator')->get('messages.t_find_another_project'); ?></a>
                						</div>
                					<?php else: ?>
                
                						
                						<?php if($this->hasSponsoredBid()): ?>
                
                							
                							<?php
                								$sponsored_bid = $this->hasSponsoredBid();
                							?>
                
                							
                							<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.bid', ['bid_id' => $sponsored_bid->uid])->html();
} elseif ($_instance->childHasBeenRendered('bid-card-id-' . $sponsored_bid->uid)) {
    $componentId = $_instance->getRenderedChildComponentId('bid-card-id-' . $sponsored_bid->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName('bid-card-id-' . $sponsored_bid->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bid-card-id-' . $sponsored_bid->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.bid', ['bid_id' => $sponsored_bid->uid]);
    $html = $response->html();
    $_instance->logRenderedChild('bid-card-id-' . $sponsored_bid->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                
                						<?php endif; ?>
                
                						
                						<?php $__currentLoopData = $bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                							
                							<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.bid', ['bid_id' => $bid->uid])->html();
} elseif ($_instance->childHasBeenRendered('bid-card-id-' . $bid->uid)) {
    $componentId = $_instance->getRenderedChildComponentId('bid-card-id-' . $bid->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName('bid-card-id-' . $bid->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bid-card-id-' . $bid->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.bid', ['bid_id' => $bid->uid]);
    $html = $response->html();
    $_instance->logRenderedChild('bid-card-id-' . $bid->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                
                						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                					<?php endif; ?>
        							
                                </div>
                    
                            <?php endif; ?>
						<?php endif; ?>						
					</div>
				</section>
		
			</div>
    
            
            <div class="lg:col-start-4 lg:col-span-1">

                
                <div class="mb-6">
                
                    <div class="px-6 flex items-center">
                        
        				<?php if(auth()->guard()->check()): ?>
        					<?php if(auth()->id() != $project->user_id && $project->status === 'active' && !$already_submitted_proposal && auth()->user()->account_type === 'seller'): ?>
        						<button id="modal-bid-button" type="button"
        						class="w-full bg-primary-700 text-white font-bold text-base px-3 py-3 mt-6 rounded-xl">
                                  <span><?php echo app('translator')->get('messages.t_apply_now'); ?></span>
                                </button>
        					<?php endif; ?>
        				<?php endif; ?>
    				</div>
    				
    				
					<?php if(auth()->guard()->check()): ?>
						<?php if(auth()->id() != $project->user_id): ?>
        				<div class="px-6 mt-5 flex items-center">
    						<button type="button" id="modal-report-project-button" class="w-full flex items-center rtl:space-x-reverse focus:outline-none focus:ring-transparent">
    							<svg class="w-5 h-5 dark:text-zinc-300 mr-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path></svg>
    							<span class="font-semibold"><?php echo app('translator')->get('messages.t_flag_as_inappropriate'); ?></span>
    						</button>
    					</div>
					    <?php endif; ?>
					<?php endif; ?>
					
					<div class="px-6 mt-8 flex items-center">
						<div class="text-sm text-gray-500 dark:text-zinc-300 mr-2"><?php echo app('translator')->get('messages.t_current_bids'); ?></div>
						<div class="text-sm font-bold text-gray-600 dark:text-white sm:col-span-2 sm:mt-0">
						    <?php if($project->bids_count < 5): ?>
                            
                                <?php echo e(__('messages.t_less_than_5'), false); ?>

                            
                            <?php elseif($project->bids_count >= 5 && $project->bids_count <= 20): ?>
                            
                                <?php echo e(__('messages.t_between_5_20'), false); ?>

                                
                            <?php elseif($project->bids_count > 20 && $project->bids_count <= 50): ?>
                            
                                <?php echo e(__('messages.t_between_20_50'), false); ?>

                                
                            <?php elseif($project->bids_count > 50): ?>
                            
                                <?php echo e(__('messages.t_more_than_50'), false); ?>

                            
                            <?php endif; ?>

						</div>
					</div>
					
					<div class="px-6 mt-3 flex items-center">
						<div class="text-sm text-gray-500 dark:text-zinc-300 mr-2"><?php echo app('translator')->get('messages.t_average_bids'); ?></div>
						<div class="text-sm font-bold text-gray-600 dark:text-white sm:col-span-2 sm:mt-0"><?php echo money($avg_bid, settings('currency')->code, true); ?></div>
					</div>
					
					<div class="px-6 mt-3 flex items-center">
					    <?php
					        $views = number_format($project->counter_views)
					    ?>
						<div class="text-sm text-gray-500 dark:text-zinc-300 mr-2"><?php echo app('translator')->get('messages.t_project_clicks'); ?></div>
						<div class="text-sm font-bold text-gray-600 dark:text-white sm:col-span-2 sm:mt-0">
						    <?php echo e(__('messages.t_project_clicks_number', ["number" => $views ]), false); ?>

						</div>
					</div>
					
					<div class="px-6 mt-3 flex items-center">
					    <?php
					        $impressions = number_format($project->counter_impressions)
					    ?>
						<div class="text-sm text-gray-500 dark:text-zinc-300 mr-2"><?php echo app('translator')->get('messages.t_impressions'); ?></div>
						<div class="text-sm font-bold text-gray-600 dark:text-white sm:col-span-2 sm:mt-0">
						    <?php echo e(__('messages.t_impressions_number', ["number" => $impressions ]), false); ?>

						</div>
					</div>
					
					<h2 class="px-6 mt-8 mb-1 font-bold text-black dark:text-zinc-300 text-lg"><?php echo app('translator')->get('messages.t_about_the_client'); ?></h2> 
					
					<div class="px-6 mt-2 flex items-center">
                    
                        <?php if($project->client->status === 'verified'): ?>
                            <svg class="text-sky-400" xmlns="http://www.w3.org/2000/svg" height="19px" viewBox="0 -960 960 960" width="19px" fill="#2d8ceb"><path d="m438-338 226-226-57-57-169 169-84-84-57 57 141 141Zm42 258q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Z"/></svg>
                            <span class="text-sm text-gray-600 font-normal ml-1">
                                <?php echo e(__('messages.t_account_verified'), false); ?>

                            </span>
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" height="19px" viewBox="0 -960 960 960" width="19px" fill="#6e6e6e"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                            <span class="text-sm text-gray-600 font-normal ml-1">
                                <?php echo e(__('messages.t_account_not_verified'), false); ?>

                            </span>
                        <?php endif; ?>
                    
                    </div>
                    
                    <div class="px-6 mt-2">
                        <div class="flex items-center space-x-3 rtl:space-x-reverse">
							<img class="w-10 h-10 rounded-md lazy object-cover" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($project->client->avatar), false); ?>" alt="<?php echo e($project->title, false); ?>">
							<div class="font-medium text-zinc-800 dark:text-white">
								<div class="text-sm"><?php echo e($this->clientUsername(), false); ?>, <?php echo e($project->client->country->name, false); ?></div>
								<div class="text-xs text-gray-500 font-normal dark:text-gray-400">
									<?php echo app('translator')->get('messages.t_the_client_account_appear_if_contact_u'); ?>
								</div>
							</div>
						</div>
                    </div>
					
					<h2 class="px-6 mt-8 mb-1 font-bold text-black dark:text-zinc-300 text-lg"><?php echo app('translator')->get('messages.t_job_link'); ?></h2>  
					
					<div class="grid grid-cols-12 md:gap-x-6 gap-y-4">

        				
        				<div class="px-6 col-span-12">
        					<div class="mt-1 relative flex items-center">
        					  <input type="text" id="input-project-url-share" value="<?php echo e(url()->current(), false); ?>" class="shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full ltr:pr-16 rtl:pl-16 sm:text-[13px] border-gray-200 font-medium rounded-md">
        					  <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex py-1.5 ltr:pr-1.5 rtl:pl-1.5">
        						<button x-on:click="copyToClipboard()" type="button" class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-2 py-1 leading-5 text-xs border-gray-300 bg-gray-50 text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow">
        							<template x-if="is_copied">
        								<span><?php echo app('translator')->get('messages.t_copied'); ?></span>
        							</template>
        							<template x-if="!is_copied">
        								<span><?php echo app('translator')->get('messages.t_copy'); ?></span>
        							</template>
        						</button>
        					  </div>
        					</div>
        				</div>
        
        				
        				<div class="px-6 col-span-12">
        					<ul class="flex items-center justify-center space-x-3 rtl:space-x-reverse">
        
        						
        						<li>
        							<a href="https://www.facebook.com/share.php?u=<?php echo e(url()->current(), false); ?>&t=<?php echo e($project->title, false); ?>" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#3b5998]" data-tooltip-target="share-project-btn-facebook">
        								<svg class="w-4 h-4 text-white" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        							</a>
        							<div id="share-project-btn-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
        								<?php echo e(__('messages.t_share_on_facebook'), false); ?>

        							</div>
        						</li>
        
        						
        						<li>
        							<a href="https://twitter.com/intent/tweet?text=<?php echo e($project->title, false); ?>%20-%20<?php echo e(url()->current(), false); ?>%20" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#1DA1F2]" data-tooltip-target="share-project-btn-twitter">
        								<svg class="w-4 h-4 text-white" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><title>Twitter</title><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
        							</a>
        							<div id="share-project-btn-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
        								<?php echo e(__('messages.t_share_on_twitter'), false); ?>

        							</div>
        						</li>
        
        						
        						<li>
        							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url()->current(), false); ?>&title=<?php echo e($project->title, false); ?>&summary=<?php echo e($project->title, false); ?>" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#0A66C2]" data-tooltip-target="share-project-btn-linkedin">
        								<svg class="w-4 h-4 text-white" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
        							</a>
        							<div id="share-project-btn-linkedin" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
        								<?php echo e(__('messages.t_share_on_linkedin'), false); ?>

        							</div>
        						</li>
        
        					</ul>
        				</div>
        
        			</div>

				</div>

          </section>
        </div>
    </div>

	
	<?php if(auth()->guard()->check()): ?>
		<?php if(auth()->id() != $project->user_id && $project->status === 'active' && !$already_submitted_proposal): ?>
			<?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-bid-container','target' => 'modal-bid-button','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-4xl']); ?>
		
				
				 <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_bid_details'), false); ?> <?php $__env->endSlot(); ?>
		
				
				 <?php $__env->slot('content', null, []); ?> 
		
					
					<?php if($bid_current_step === 1): ?>
						<div class="grid grid-cols-12 md:gap-x-6 gap-y-6 py-2">
		
							
							<div class="col-span-12 md:col-span-6">
		
								
								<label for="bid-amount-input" class="<?php echo e($errors->first('bid_amount') ? 'text-red-600' : 'text-gray-900', false); ?> block mb-2 text-[13px] font-bold dark:text-white">
									<?php echo app('translator')->get('messages.t_bid_amount'); ?>
								</label>
		
								
								<div class="relative w-full">
		
									
									<input wire:model.defer="bid_amount" x-on:keyup="calculateProfit" x-on:change="verifyAmount" type="text" id="bid-amount-input" class="<?php echo e($errors->first('bid_amount') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300', false); ?> border text-gray-900 text-sm rounded-lg font-medium block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0.00">
		
									
									<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300 uppercase">
										<?php echo e(settings('currency')->code, false); ?>

									</div>
		
								</div>
		
								
								<?php $__errorArgs = ['bid_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
										<?php echo e($errors->first('bid_amount'), false); ?>

									</p>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		
							</div>
		
							
							<div class="col-span-12 md:col-span-6">
		
								
								<label for="bid-amount-paid-input" class="text-gray-900 mb-2 text-[13px] font-bold dark:text-white flex items-center space-x-2 rtl:space-x-reverse">
									<span><?php echo app('translator')->get('messages.t_paid_to_you'); ?></span>
									<svg data-tooltip-target="bid-paid-to-you-tooltip" class="cursor-pointer w-4 h-4 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
									<div id="bid-paid-to-you-tooltip" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
										<?php echo e(__('messages.t_bid_paid_to_you_tooltip'), false); ?>

									</div>
								</label>
		
								
								<div class="relative w-full">
		
									
									<input wire:model.defer="bid_amount_paid" type="text" id="bid-amount-paid-input" class="bg-zinc-50 cursor-not-allowed focus:ring-0 focus:outline-none border-gray-300 border text-gray-900 text-sm rounded-lg font-medium block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white" disabled readonly placeholder="0.00">
		
									
									<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300 uppercase">
										<?php echo e(settings('currency')->code, false); ?>

									</div>
		
								</div>
		
							</div>
		
							
							<div class="col-span-12">
		
								
								<label for="bid-days-input" class="<?php echo e($errors->first('bid_days') ? 'text-red-600' : 'text-gray-900', false); ?> block mb-2 text-[13px] font-bold dark:text-white">
									<?php echo app('translator')->get('messages.t_this_project_will_be_delivered_in'); ?>
								</label>
		
								
								<div class="relative w-full">
		
									
									<input type="text" wire:model.defer="bid_days" id="bid-days-input" class="<?php echo e($errors->first('bid_days') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300', false); ?> border text-gray-900 text-sm rounded-lg font-medium block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
		
									
									<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300 uppercase">
										<?php echo app('translator')->get('messages.t_days'); ?>
									</div>
		
								</div>
		
								
								<?php $__errorArgs = ['bid_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
										<?php echo e($errors->first('bid_days'), false); ?>

									</p>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		
							</div>
		
							
							<div class="col-span-12">
		
								
								<label for="bid-description-input" class="<?php echo e($errors->first('bid_description') ? 'text-red-600' : 'text-gray-900', false); ?> block mb-2 text-[13px] font-bold dark:text-white">
									<?php echo app('translator')->get('messages.t_describe_ur_proposal'); ?>
								</label>
		
								
								<div class="relative w-full">
		
									
									<textarea wire:model.defer="bid_description" id="bid-description-input" class="<?php echo e($errors->first('bid_description') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300', false); ?> border text-gray-900 text-sm rounded-lg font-medium block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 placeholder:font-normal" rows="8" placeholder="<?php echo e(__('messages.t_describe_ur_proposal_placeholder'), false); ?>"></textarea>
		
									
									<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300 uppercase">
										<svg class="w-5 h-5 text-gray-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
									</div>
		
								</div>
		
								
								<?php $__errorArgs = ['bid_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
										<?php echo e($errors->first('bid_description'), false); ?>

									</p>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		
							</div>
		
						</div>
					<?php endif; ?>
		
					
					<?php if(settings('projects')->is_premium_bidding && $bid_current_step === 2): ?>
						<fieldset>
		
							
							<legend class="mb-4 dark:text-zinc-200"><?php echo app('translator')->get('messages.t_optional_upgrades'); ?></legend>
		
							<div class="space-y-2 divide-y divide-gray-200 dark:divide-zinc-700 w-full">
								<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="relative flex items-center w-full py-4">
										<div class="flex items-center h-5">
											<input id="bid-promotion-plan-<?php echo e($plan->uid, false); ?>" name="bidding_selected_plans" wire:model.defer="bid_<?php echo e($plan->plan_type, false); ?>" value="<?php echo e($plan->uid, false); ?>" type="checkbox" class="focus:ring-transparent focus:outline-none ring-offset-0 focus:shadow-none h-5 w-5 text-primary-600 border-gray-300 border-2 rounded-sm cursor-pointer dark:bg-transparent dark:border-zinc-600 dark:text-zinc-500 dark:focus:ring-offset-zinc-500">
										</div>
										<div class="ltr:ml-4 rtl:mr-4 text-sm w-full">
											<label for="bid-promotion-plan-<?php echo e($plan->uid, false); ?>" class="font-medium text-gray-700 flex items-center justify-between">
				
												
												<div class="inline-flex px-2 py-1 rounded-full text-xs font-medium tracking-widest uppercase min-w-[120px] justify-center" style="color: <?php echo e($plan->badge_text_color, false); ?>;background-color: <?php echo e($plan->badge_bg_color, false); ?>;">
													<?php echo app('translator')->get('messages.t_' . $plan->plan_type); ?>
												</div>
												
												
												<span class="text-sm font-semibold text-zinc-700 bg-gray-100 rounded-md px-3 py-2 dark:bg-zinc-900 dark:text-zinc-200"><?php echo money($plan->price, settings('currency')->code, true); ?></span>
				
											</label>
				
											
											<p class="text-gray-600 dark:text-zinc-300 leading-relaxed mt-2">
												<?php echo e(__('messages.t_bidding_plan_' . $plan->plan_type . '_subtitle'), false); ?>

											</p>
											
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
						</fieldset>
					<?php endif; ?>
		
				 <?php $__env->endSlot(); ?>
		
				
				 <?php $__env->slot('footer', null, []); ?> 
					<div class="flex items-center justify-between w-full">

						
						<div>
							<?php if($bid_current_step === 2): ?>
								<button 
									wire:click="back"
									wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray-500 dark:bg-zinc-600 dark:text-zinc-400 cursor-not-allowed"
									wire:loading.class.remove="bg-white hover:bg-gray-100 text-gray-800 cursor-pointer border border-gray-300 shadow-sm"
									wire:loading.attr="disabled"
									class="text-[13px] font-semibold flex justify-center bg-white hover:bg-gray-100 text-gray-800 py-4 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer border border-gray-300 shadow-sm dark:bg-zinc-600 dark:border-zinc-600 dark:text-zinc-100 dark:hover:bg-zinc-700">
								
									
									<div wire:loading wire:target="back">
										<svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
											<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
										</svg>
									</div>
								
									
									<div wire:loading.remove wire:target="back">
										<?php echo app('translator')->get('messages.t_go_back'); ?>
									</div>

								</button>
							<?php endif; ?>
						</div>

						
						<?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'next','text' => ''.e(__('messages.t_continue'), false).'','block' => 0]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>

					</div>
				 <?php $__env->endSlot(); ?>
		
			 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

	
	<?php if(auth()->guard()->check()): ?>
		<?php if(auth()->id() != $project->user_id && auth()->user()->account_type === 'seller'): ?>
			<?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-report-project-container','target' => 'modal-report-project-button','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-xl']); ?>

				
				 <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_report_project'), false); ?> <?php $__env->endSlot(); ?>

				
				 <?php $__env->slot('content', null, []); ?> 
					<div class="grid grid-cols-12 md:gap-x-6 gap-y-6 py-2">

						
                        <div class="col-span-12">
                            <fieldset class="w-full">
                                <div class="space-y-4">
            
                                    
                                    <?php for($i = 1; $i <= 6; $i++): ?>
                                        <div class="flex items-center">
                                            <input wire:model.defer="report_reason" value="reason_<?php echo e($i, false); ?>" id="report_project_reason_<?php echo e($i, false); ?>" name="report_reason" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-700 border-gray-300">
                                            <label for="report_project_reason_<?php echo e($i, false); ?>" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700"> 
                                                <?php echo e(__('messages.t_report_project_reason_' . $i), false); ?>  
                                            </label>
                                        </div>
                                    <?php endfor; ?>
                                    
                                </div>
                            </fieldset>
                        </div>
            
                        
                        <div class="col-span-12">
            
                            
                            <div class="relative w-full">
            
                                
                                <textarea wire:model.defer="report_description" id="bid-report-description-input" class="<?php echo e($errors->first('report_description') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300', false); ?> border text-gray-900 text-sm rounded-lg font-medium block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 placeholder:font-normal" rows="8" placeholder="<?php echo e(__('messages.t_enter_issue_description'), false); ?>"></textarea>
            
                                
                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300 uppercase">
                                    <svg class="w-5 h-5 text-gray-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                </div>
            
                            </div>
            
                            
                            <?php $__errorArgs = ['report_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
                                    <?php echo e($errors->first('report_description'), false); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            
                        </div>

					</div>
				 <?php $__env->endSlot(); ?>

				
				 <?php $__env->slot('footer', null, []); ?> 
					<?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'report','text' => ''.e(__('messages.t_continue'), false).'','block' => 0]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
				 <?php $__env->endSlot(); ?>

			 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

</div>

<?php $__env->startPush('scripts'); ?>
	<script>
		function LVoePqYZdmjQURo() {
			return {

				is_copied      : false,
				is_actions_menu: false,

				// Calculate profit
				calculateProfit(e) {

					// Get amount
					if (e.target) {
						var amount = e.target.value;
					} else {
						var amount = e;
					}

					// Set type
					const type       = "<?php echo e(settings('projects')->commission_type, false); ?>";

					// Set commission
					const commission = <?php echo e(settings('projects')->commission_from_freelancer, false); ?>;

					// Check if number
					if (!isNaN(amount)) {
						
						// Check fixed
						if (type === 'fixed') {
							
							// Get value
							const value = amount - commission;

							// Check value
							if (value % 1 != 0) {
								
								// Set value
								document.getElementById("bid-amount-paid-input").value = (Math.round(value * 100) / 100).toFixed(2);
								
							} else {
								
								// Set value
								document.getElementById("bid-amount-paid-input").value = value;

							}

						}

						// Check percentage
						if (type === 'percentage') {
						
							// Get value
							const value = (amount * commission) / 100;

							// Check value
							if ((amount - value) % 1 != 0) {
								
								// Set value
								document.getElementById("bid-amount-paid-input").value = (Math.round((amount - value) * 100) / 100).toFixed(2);
								
							} else {
								
								// Set value
								document.getElementById("bid-amount-paid-input").value = amount - value;
								
							}

						}

					}
				},

				// Verify bidding amount
				verifyAmount(e) {

					// Get amount
					if (e.target) {
						var amount = e.target.value;
					} else {
						var amount = e;
					}

					// Check value
					if (Number(amount) < Number('<?php echo e($project->budget_min, false); ?>') || Number(amount) > Number('<?php echo e($project->budget_max, false); ?>')) {
		
						// Error
						window.$wireui.notify({
							title      : "<?php echo e(__('messages.t_error'), false); ?>",
							description: "<?php echo e(__('messages.t_pls_insert_bid_value_between_budget'), false); ?>",
							icon       : 'error'
						});

					}

				},

				// Copy project url to clipboard
				copyToClipboard() {

					var _this = this;

					// Get input
					const copyText = document.querySelector("#input-project-url-share");

					copyText.select()
					copyText.setSelectionRange(0, 99999)
					document.execCommand("copy")
					_this.is_copied = true;
					setTimeout(() => {
						_this.is_copied = false;
					}, 2000);
				},

				// Initialize component
				initialize() {
					var _this = this;
					document.addEventListener("DOMContentLoaded", () => {
						Livewire.hook('message.processed', (message, component) => {
							if (document.getElementById('bid-amount-input')) {
								const amount = document.getElementById('bid-amount-input').value;
								_this.calculateProfit(amount);
							}
						})
					});
				}

			}
		}
		window.LVoePqYZdmjQURo = LVoePqYZdmjQURo();
	</script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/project/project.blade.php ENDPATH**/ ?>