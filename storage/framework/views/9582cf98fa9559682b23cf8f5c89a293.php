<div class="w-full">

    
	<?php if($categories && $categories->count()): ?>
		<div class="w-full mb-6">

			
			<div class="block mb-8">
				<h1 class="font-extrabold text-3xl text-gray-800 dark:text-gray-100 pb-1 block">
					<?php echo app('translator')->get('messages.t_categories'); ?>
				</h1>
			</div>

			
			<div class="hidden -mx-2.5" id="projects-categories-slick" wire:ignore>
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<a href="<?php echo e(url('explore/projects', $category->slug), false); ?>" class="relative !h-72 rounded-xl !flex !flex-col overflow-hidden group mx-2.5">

						
						<span aria-hidden="true" class="absolute inset-0">
							<img src="<?php echo e(src($category->thumbnail), false); ?>" alt="<?php echo e($category->name, false); ?>" class="w-full h-full object-center object-cover opacity-70 group-hover:opacity-100">
						</span>

						
						<span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-90"></span>

						
						<span class="relative mt-auto text-center text-xl font-bold text-white pb-6">
							<?php echo e(category_title('projects', $category), false); ?>

						</span>

					</a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

		</div>
	<?php endif; ?>
	
	
	<form class="flex items-center bg-white border-2 border-gray-300 text-gray-900 text-lg font-medium rounded-lg block w-full mb-3" action="<?php echo e(url('explore/projects'), false); ?>" accept="GET">   

        <div class="relative w-full flex items-center px-3 py-1">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#bababa"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
    
    		<input type="search" name="q" wire:model.defer="q" class="w-full border-none focus:outline-none focus:ring-0" placeholder="<?php echo e(__('messages.t_type_something_to_search_in_projects'), false); ?>" required>
    
    		<div class="flex justify-end md:hidden">
                
               
                <button type="submit" class="px-5 py-4 ltr:ml-2 rtl:mr-2 text-sm font-medium text-white bg-primary-600 rounded-md border-none hover:bg-primary-800 focus:ring-0 focus:outline-none">
        			<?php echo app('translator')->get('messages.t_search'); ?>
        		</button>
            </div>
        </div>

	</form>

	
	<div>
		<?php
			$popular_categories = App\Models\ProjectCategory::whereHas('projects')->withCount('projects')->take(5)->orderBy('projects_count')->get();
		?>
		<div class="hidden sm:flex items-center text-gray-600 dark:text-zinc-200 font-semibold text-sm whitespace-nowrap mb-2">
			<?php echo app('translator')->get('messages.t_popular_colon'); ?> 
			<ul class="flex ltr:ml-3 rtl:mr-3">
				<?php $__currentLoopData = $popular_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="flex ltr:mr-1 rtl:ml-1 whitespace-nowrap">
						<a href="<?php echo e(url('explore/projects', $tag->slug), false); ?>" class="text-black hover:text-primary-600 transition-all duration-200 px-1 py-0.5 text-xs dark:text-zinc-400 dark:border-zinc-700 dark:hover:text-primary-600">
							<?php echo e($tag->name, false); ?>

						</a>
					</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
	</div>

	
	<?php if($projects && $projects->count()): ?>
		<div class="w-full mt-10">

			
			<div class="block mb-3">
				<h1 class="font-extrabold text-3xl text-black dark:text-gray-100 pb-1 block">
					<?php echo app('translator')->get('messages.t_jobs_you_might_like'); ?>
				</h1>
			</div>

			
			<div class="grid grid-cols-1">
				<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.project', [ 'id' => $project->uid ])->html();
} elseif ($_instance->childHasBeenRendered('project-card-id-' . $project->uid)) {
    $componentId = $_instance->getRenderedChildComponentId('project-card-id-' . $project->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName('project-card-id-' . $project->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('project-card-id-' . $project->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.project', [ 'id' => $project->uid ]);
    $html = $response->html();
    $_instance->logRenderedChild('project-card-id-' . $project->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
				
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			
			<?php if($projects->hasPages()): ?>
				<hr class="my-10">
				<div class="px-4 py-5 sm:px-6 flex justify-center">
					<?php echo $projects->links('pagination::tailwind'); ?>

				</div>
			<?php endif; ?>

		</div>
	<?php endif; ?>
	
</div>

<?php $__env->startPush('scripts'); ?>
	<script defer type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function(){
			// Init featured categories slick
			$('#projects-categories-slick').slick({
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
							slidesToShow  : 3,
							slidesToScroll: 1
						}
					},
					{
					breakpoint: 480,
						settings: {
							slidesToShow  : 2,
							slidesToScroll: 1
						}
					}
				]
			});
			$('#featured-categories-slick').removeClass('hidden');
		});
	</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" type="text/css" />
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/explore/projects/projects.blade.php ENDPATH**/ ?>