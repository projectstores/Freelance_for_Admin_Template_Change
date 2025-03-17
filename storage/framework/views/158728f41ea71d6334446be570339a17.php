<div x-data="window.jDxKFKNiKkfxISD" x-init="init()" x-cloak>

<?php

$hideHeaderFooter = session('hide_header_footer');

?>

    
    <div id="btn_search" style="display:<?php if ($hideHeaderFooter == 'true') { echo 'none'; } else { echo 'display'; } ?>" class="py-2 mx-4 text-gray-400 hover:text-gray-500 dark:text-gray-100 dark:hover:text-white cursor-pointer md:hidden" @click="open()">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path> </svg>
    </div>

    
    <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20" role="dialog" aria-modal="true" @keydown.window.escape="close()" x-show="isOpen" style="display: none;" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity" aria-hidden="true" x-transition:enter="ease-out duration-300"></div>

        <div class="mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all" @click.away="close()"
            
        >

            
            <div class="relative">

                
                <svg class="pointer-events-none absolute top-3.5 ltr:left-4 rtl:right-4 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/> </svg>

                
                <input wire:model.debounce.500ms="q" wire:keydown.enter="enter" x-ref="search" type="text" class="h-12 w-full border-0 bg-transparent ltr:pl-11 ltr:pr-3 rtl:pr-11 rtl:pl-3 text-gray-800 placeholder-gray-400 focus:ring-0 sm:text-sm pt-2.5" placeholder="<?php echo e(__('messages.t_what_service_are_u_looking_for_today'), false); ?>">

                
                <div role="status" class="absolute ltr:right-2 rtl:left-2 top-3" wire:loading wire:target="q">
                    <svg class="inline ltr:mr-2 rtl:ml-2 w-6 h-6 text-gray-200 animate-spin fill-primary-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                </div>

            </div>
      
            
            <?php if(count($gigs) || count($sellers) || count($tags)): ?>
                <ul class="max-h-80 scroll-py-10 scroll-pb-2 space-y-4 overflow-y-auto p-4 pb-2" id="options" role="listbox">

                    
                    <?php if($gigs && count($gigs)): ?>
                        <li>
                            <h2 class="text-xs font-semibold text-gray-900"><?php echo e(__('messages.t_gigs'), false); ?></h2>
                            <ul class="-mx-4 mt-2 text-sm text-gray-700">

                                
                                <?php $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="group flex cursor-default select-none items-center px-4 py-2">
                                        <a href="<?php echo e(url('service', $gig->slug), false); ?>" class="flex items-center">
                                            <svg class="h-6 w-6 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/> </svg>
                                            <span class="ltr:ml-3 rtl:mr-3 flex-auto ext-ellipsis overflow-hidden"><?php echo e($gig->title, false); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </li>
                    <?php endif; ?>
                
                    
                    <?php if($sellers && count($sellers)): ?>
                        <li>
                            <h2 class="text-xs font-semibold text-gray-900"><?php echo e(__('messages.t_sellers'), false); ?></h2>

                            
                            <ul class="-mx-4 mt-2 text-sm text-gray-700">
                                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="group flex cursor-default select-none items-center px-4 py-2">
                                        <a href="<?php echo e(url('profile', $seller->username), false); ?>" class="flex items-center">
                                            <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($seller->avatar), false); ?>" alt="<?php echo e($seller->username, false); ?>" class="lazy h-6 w-6 flex-none rounded-full object-cover">
                                            <span class="ltr:ml-3 rtl:mr-3 flex-auto truncate"><?php echo e($seller->username, false); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    
                    <?php if($tags && count($tags)): ?>
                        <li>
                            <h2 class="text-xs font-semibold text-gray-900"><?php echo e(__('messages.t_tags'), false); ?></h2>
                            <ul class="-mx-4 mt-2 text-sm text-gray-700">

                                
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($tag): ?>
                                        <li class="group flex cursor-default select-none items-center px-4 py-2">
                                            <a href="<?php echo e(url('search?q=' . $tag->name), false); ?>" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                                                <span class="ml-3 flex-auto truncate"><?php echo e($tag->name, false); ?></span>
                                                </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </li>
                    <?php endif; ?>

                </ul>
            <?php endif; ?>
      
            
            <?php if(count($gigs) === 0 && count($sellers) === 0 && count($tags) === 0 && $q): ?>
                <div class="py-14 px-6 text-center text-sm sm:px-14">
                    <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                    <p class="mt-4 font-semibold text-gray-900"><?php echo e(__('messages.no_results_found'), false); ?></p>
                    <p class="mt-2 text-gray-500"><?php echo e(__('messages.t_we_couldnt_find_anthing_search_term'), false); ?></p>
                </div>
            <?php endif; ?>
      
            
            <div class="flex flex-wrap items-center bg-gray-50 py-2.5 px-4 text-xs text-gray-700">
                <?php echo __('messages.t_press_enter_to_search_deeply'); ?>

            </div>

        </div>
    </div>

</div>


<?php $__env->startPush('scripts'); ?>
    <script>
        function jDxKFKNiKkfxISD() {
            return {
                isOpen: !1,
                restoreElement: void 0,
                init: function () {
                    var t = this;
                    (this.onFocus = this.onFocus.bind(this))
                },
                onFocus: function (e) {
                    this.isOpen && (this.$el.contains(e.target) || ((document.documentElement.scrollTop = this.documentScrollTop), this.$refs.search.focus({ preventScroll: !0 })));
                },
                open: function () {
                    var e = this;
                    if (!this.isOpen) {
                        document.activeElement && (this.restoreElement = document.activeElement),
                            (this.search = ""),
                            (document.documentElement.style.paddingRight = "".concat(window.innerWidth - document.documentElement.clientWidth, "px")),
                            (document.documentElement.style.overflow = "hidden"),
                            document.addEventListener("focusin", this.onFocus, !1),
                            (this.documentScrollTop = document.documentElement.scrollTop);
                        var t,
                            n = this.E(this.w(this.$el));
                        try {
                            for (n.s(); !(t = n.n()).done; ) {
                                t.value.setAttribute("aria-hidden", "true");
                            }
                        } catch (e) {
                            n.e(e);
                        } finally {
                            n.f();
                        }
                        setTimeout(function () {
                            e.$refs.search.focus();
                        }, 100),
                            (this.isOpen = !0);
                    }
                },
                close: function () {
                    if (this.isOpen) {
                        var e = this.restoreElement;
                        (this.restoreElement = void 0), (document.documentElement.style.overflow = ""), (document.documentElement.style.paddingRight = ""), document.removeEventListener("focusin", this.onFocus, !1);
                        var t,
                            n = this.E(this.w(this.$el));
                        try {
                            for (n.s(); !(t = n.n()).done; ) {
                                t.value.removeAttribute("aria-hidden");
                            }
                        } catch (e) {
                            n.e(e);
                        } finally {
                            n.f();
                        }
                        (this.isOpen = !1),
                            setTimeout(function () {
                                e && e.focus();
                            }, 100);
                    }
                },
                E(e, t) {
                    var n = ("undefined" != typeof Symbol && e[Symbol.iterator]) || e["@iterator"];
                    if (!n) {
                        if (
                            Array.isArray(e) ||
                            (n = (function (e, t) {
                                if (!e) return;
                                if ("string" == typeof e) return b(e, t);
                                var n = Object.prototype.toString.call(e).slice(8, -1);
                                "Object" === n && e.constructor && (n = e.constructor.name);
                                if ("Map" === n || "Set" === n) return Array.from(e);
                                if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return b(e, t);
                            })(e)) ||
                            (t && e && "number" == typeof e.length)
                        ) {
                            n && (e = n);
                            var r = 0,
                                i = function () {};
                            return {
                                s: i,
                                n: function () {
                                    return r >= e.length ? { done: !0 } : { done: !1, value: e[r++] };
                                },
                                e: function (e) {
                                    throw e;
                                },
                                f: i,
                            };
                        }
                        throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
                    }
                    var o,
                        a = !0,
                        s = !1;
                    return {
                        s: function () {
                            n = n.call(e);
                        },
                        n: function () {
                            var e = n.next();
                            return (a = e.done), e;
                        },
                        e: function (e) {
                            (s = !0), (o = e);
                        },
                        f: function () {
                            try {
                                a || null == n.return || n.return();
                            } finally {
                                if (s) throw o;
                            }
                        },
                    };
                },
                w(e) {
                    var t = [];
                    if (!e.parentNode) return t;
                    for (var n = e.parentNode.firstChild; n; ) 1 === n.nodeType && n !== e && t.push(n), (n = n.nextSibling);
                    return t;
                }
            }
            
        }
        window.jDxKFKNiKkfxISD = jDxKFKNiKkfxISD();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp_8.2\htdocs\Freelancer_Work\Freelancer_Work_New\resources\views/livewire/main/partials/search.blade.php ENDPATH**/ ?>