<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['label', 'placeholder', 'model', 'tags' => []]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['label', 'placeholder', 'model', 'tags' => []]); ?>
<?php foreach (array_filter((['label', 'placeholder', 'model', 'tags' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="window.XsPKiJSnOYqVlZD" @click.away="clear()" @keydown.escape="clear()">

    
    <label for="tags-input-component-id-<?php echo e($model, false); ?>" class="block text-xs font-semibold tracking-wide <?php echo e($errors->first($model) ? 'text-red-600' : 'text-gray-700 dark:text-gray-100', false); ?>"><?php echo e(htmlspecialchars_decode($label), false); ?></label>
    
    
    <div class="mt-2 relative flex items-center">

        
        <input 
            type="text" 
            :disabled="tags.length === maximum ? true : false" 
            maxlength="20" 
            x-model="value" 
            x-ref="value" 
            @keyup.enter="addTag()" 
            id="tags-input-component-id-<?php echo e($model, false); ?>" 
            placeholder="<?php echo e(htmlspecialchars_decode($placeholder), false); ?>" 
            class="focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent <?php echo e($errors->first($model) ? 'focus:!ring-red-600 focus:!border-red-600 border-red-500' : 'focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500', false); ?>" 
            <?php echo e($attributes, false); ?>>

        <button @click="addTag()" :disabled="tags.length === maximum ? true : false" type="button" class="absolute ltr:right-0 rtl:left-0 ltr:mr-2 rtl:ml-2 w-8 h-8 inline-flex justify-center items-center focus:outline-none flex-none rounded-full bg-primary-600 hover:bg-primary-700 focus:ring-0 text-white disabled:bg-gray-300 disabled:hover:bg-gray-300 disabled:text-gray-500 disabled:cursor-not-allowed">
            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
        </button>

    </div>

    
    <?php $__errorArgs = [$model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="mt-1 text-xs text-red-600"><?php echo e($errors->first($model), false); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    
    <template x-for="(tag, index) in tags">
        <div class="bg-gray-200 dark:bg-zinc-700 inline-flex items-center text-sm rounded mt-2 mr-1">
            <span class="ltr:ml-2 ltr:mr-1 rtl:mr-2 rtl:ml-1 leading-relaxed truncate max-w-xs text-xs dark:text-zinc-300" x-text="tag"></span>
            <button @click.prevent="removeTag(index, tag)" class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg>
            </button>
        </div>
    </template>

    
    <p class="mt-1 text-xs text-gray-300"><?php echo e(__('messages.t_max_tags_letters_numbers_only', ['max' => settings("publish")->max_tags]), false); ?></p>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function XsPKiJSnOYqVlZD() {
            return {
                maximum: Number("<?php echo e(settings('publish')->max_tags, false); ?>"),
                value  : '',
                tags   : <?php echo \Illuminate\Support\Js::from($tags)->toHtml() ?>,
                
                addTag() {
                    if (this.value != "" && !this.hasTag(this.value) && this.isValid(this.value)) {
                        if (this.tags.length < this.maximum) {
                            window.livewire.find('<?php echo e($_instance->id, false); ?>').addTag(this.value)
                            this.tags.push( this.value )
                        }
                    }
                    this.clear()
                    this.$refs.value.focus()
                },
                
                hasTag(tag) {
                    var tag = this.tags.find(e => {
                        return e.toLowerCase() === tag.toLowerCase()
                    })
                    return tag != undefined
                },

                isValid(tag) {

                    return true;

                },

                removeTag(index, tag) {
                    window.livewire.find('<?php echo e($_instance->id, false); ?>').removeTag(tag)
                    this.tags.splice(index, 1)
                },
                
                clear() {
                    this.value = ''
                }
            }
        }
        window.XsPKiJSnOYqVlZD = XsPKiJSnOYqVlZD();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/components/forms/tags-input.blade.php ENDPATH**/ ?>