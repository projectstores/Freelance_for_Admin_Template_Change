<div class="w-full">

    <div class="rounded-md bg-red-50 p-4 mb-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
            </div>
            <div class="ltr:ml-3 rtl:mr-3">
                <h3 class="text-sm font-medium text-red-800"><?php echo e(__('messages.t_attention_needed'), false); ?></h3>
                <div class="mt-2 text-sm text-red-700">
                    <p><?php echo e(__('messages.t_withdrawal_manually_message_alert'), false); ?></p>
                </div>
            </div>
        </div>
    </div>


    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_withdrawals_history'), false); ?>

            </p>
        </div>
    </div>

    
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0"
                    class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">
                        <?php echo e(__('messages.t_user'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">
                        <?php echo e(__('messages.t_for'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">
                        <?php echo e(__('messages.t_amount'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">
                        <?php echo e(__('messages.t_status'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">
                        <?php echo e(__('messages.t_options'), false); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100"
                        wire:key="withdrawals-<?php echo e($w->id, false); ?>">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('profile', $w->user->username), false); ?>" target="_blank"
                                class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($w->user->avatar), false); ?>"
                                        alt="<?php echo e($w->user->username, false); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs"><?php echo e($w->user->username, false); ?></p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2"><?php echo e($w->user->email, false); ?></p>
                                </div>
                            </a>
                        </td>

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <div class="whitespace-nowrap text-sm text-gray-500 flex items-center">
                                <?php if($w->gateway_provider_name === 'paypal'): ?>
                                    <svg class="h-4 w-4 ltr:mr-2 rtl:ml-2" viewBox="-23 0 302 302" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        preserveAspectRatio="xMidYMid">
                                        <g>
                                            <path
                                                d="M217.168476,23.5070146 C203.234077,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.3030619,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.076601 C-0.637664968,263.946149 3.13311322,268.357876 8.06925331,268.357876 L65.804612,268.357876 L80.3050438,176.385849 L79.8555471,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.46841,167.970272 C174.366398,167.970272 216.569147,146.078116 228.897012,82.7490197 C229.263268,80.8761167 229.579581,79.0531577 229.854273,77.2718188 C228.297683,76.4477414 228.297683,76.4477414 229.854273,77.2718188 C233.525163,53.8646924 229.829301,37.9325302 217.168476,23.5070146"
                                                fill="#27346A"></path>
                                            <path
                                                d="M102.396976,68.8395929 C103.936919,68.1070797 105.651665,67.699203 107.449652,67.699203 L180.767565,67.699203 C189.449511,67.699203 197.548776,68.265236 204.948824,69.4555699 C207.071448,69.7968545 209.127479,70.1880831 211.125242,70.6375799 C213.123006,71.0787526 215.062501,71.5781934 216.943728,72.1275783 C217.884341,72.4022708 218.808307,72.6852872 219.715624,72.9849517 C223.353218,74.2002577 226.741092,75.61534 229.854273,77.2718188 C233.525163,53.8563683 229.829301,37.9325302 217.168476,23.5070146 C203.225753,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.2947379,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.068277 C-0.637664968,263.946149 3.13311322,268.349552 8.0609293,268.349552 L65.804612,268.349552 L95.8875974,77.5798073 C96.5035744,73.6675208 99.0174265,70.4627756 102.396976,68.8395929 Z"
                                                fill="#27346A"></path>
                                            <path
                                                d="M228.897012,82.7490197 C216.569147,146.069792 174.366398,167.970272 120.46841,167.970272 L93.0241367,167.970272 C86.4398419,167.970272 80.8794007,172.764903 79.8555471,179.265958 L61.8174095,293.621258 C61.1431644,297.883153 64.4394738,301.745495 68.7513129,301.745495 L117.421821,301.745495 C123.182038,301.745495 128.084882,297.550192 128.983876,291.864891 L129.458344,289.384335 L138.631407,231.249423 L139.222412,228.036354 C140.121406,222.351053 145.02425,218.15575 150.784467,218.15575 L158.067979,218.15575 C205.215193,218.15575 242.132193,199.002194 252.920115,143.605884 C257.423406,120.456802 255.092683,101.128442 243.181019,87.5519756 C239.568397,83.4399129 235.081754,80.0437153 229.854273,77.2718188 C229.571257,79.0614817 229.263268,80.8761167 228.897012,82.7490197 L228.897012,82.7490197 Z"
                                                fill="#2790C3"></path>
                                            <path
                                                d="M216.952052,72.1275783 C215.070825,71.5781934 213.13133,71.0787526 211.133566,70.6375799 C209.135803,70.1964071 207.071448,69.8051785 204.957148,69.4638939 C197.548776,68.265236 189.457835,67.699203 180.767565,67.699203 L107.457976,67.699203 C105.651665,67.699203 103.936919,68.1070797 102.4053,68.8479169 C99.0174265,70.4710996 96.5118984,73.6675208 95.8959214,77.5881313 L80.3133678,176.385849 L79.8638711,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.476734,167.970272 C174.374722,167.970272 216.577471,146.078116 228.905336,82.7490197 C229.271592,80.8761167 229.579581,79.0614817 229.862597,77.2718188 C226.741092,75.623664 223.361542,74.2002577 219.723948,72.9932757 C218.816631,72.6936112 217.892665,72.4022708 216.952052,72.1275783"
                                                fill="#1F264F"></path>
                                        </g>
                                    </svg>
                                    <span class="font-medium text-sm"><?php echo e($w->gateway_provider_id, false); ?></span>
                                <?php elseif($w->gateway_provider_name === 'offline'): ?>
                                    <?php if(settings('offline_payment')->logo): ?>
                                        <img class="h-5 ltr:mr-2 rtl:ml-2 lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src(settings('offline_payment')->logo), false); ?>" alt="<?php echo e(settings('offline_payment')->name, false); ?>">
                                    <?php endif; ?>
                                    <span class="font-medium text-sm"><?php echo e($w->gateway_provider_id, false); ?></span>
                                <?php endif; ?>
                            </div>
                        </td>

                        
                        <td class="text-center">
                            <span class="text-xs font-black "><?php echo money($w->amount, settings('currency')->code, true); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <?php switch($w->status):
                                case ('paid'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                        <?php echo e(__('messages.t_paid'), false); ?>

                                    </span>
                                <?php break; ?>

                                <?php case ('pending'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                        <?php echo e(__('messages.t_pending'), false); ?>

                                    </span>
                                <?php break; ?>

                                <?php case ('rejected'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                        <?php echo e(__('messages.t_rejected'), false); ?>

                                    </span>
                                <?php break; ?>

                                <?php default: ?>
                            <?php endswitch; ?>
                        </td>

                        
                        <td class="text-center">
                            <?php if($w->status === 'pending'): ?>
                                <div class="relative inline-block text-left">
                                    <div>
                                        <button data-dropdown-toggle="table-options-dropdown-<?php echo e($w->id, false); ?>"
                                            type="button"
                                            class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0"
                                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="table-options-dropdown-<?php echo e($w->id, false); ?>"
                                        class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                        tabindex="-1">
                                        <div class="py-1" role="none">

                                            
                                            <button wire:key="option-approve-<?php echo e($w->id, false); ?>"
                                                x-on:click='confirm("<?php echo e(__('messages.t_are_u_sure_u_want_to_approve_this_withdrawal'), false); ?>") ?  $wire.approve("<?php echo e($w->id, false); ?>") : ""'
                                                wire:loading.attr="disabled"
                                                wire:target="approve('<?php echo e($w->id, false); ?>')" type="button"
                                                class="text-gray-800 group flex items-center px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1">

                                                
                                                <div wire:loading wire:target="approve('<?php echo e($w->id, false); ?>')">
                                                    <svg role="status"
                                                        class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin"
                                                        viewBox="0 0 100 101" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                            fill="#E5E7EB" />
                                                        <path
                                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="approve('<?php echo e($w->id, false); ?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>

                                                <span
                                                    class="text-xs font-medium"><?php echo e(__('messages.t_approve_payment'), false); ?></span>

                                            </button>

                                            
                                            <button wire:key="option-reject-<?php echo e($w->id, false); ?>"
                                                x-on:click='confirm("<?php echo e(__('messages.t_are_u_sure_u_want_to_reject_this_withdrawal'), false); ?>") ?  $wire.reject("<?php echo e($w->id, false); ?>") : ""'
                                                wire:loading.attr="disabled"
                                                wire:target="reject('<?php echo e($w->id, false); ?>')" type="button"
                                                class="text-gray-800 group flex items-center px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1">

                                                
                                                <div wire:loading wire:target="reject('<?php echo e($w->id, false); ?>')">
                                                    <svg role="status"
                                                        class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin"
                                                        viewBox="0 0 100 101" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                            fill="#E5E7EB" />
                                                        <path
                                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="reject('<?php echo e($w->id, false); ?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>

                                                <span
                                                    class="text-xs font-medium"><?php echo e(__('messages.t_reject_payment'), false); ?></span>

                                            </button>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

    
    <?php if($withdrawals->hasPages()): ?>
        <div
            class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $withdrawals->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/admin/withdrawals/withdrawals.blade.php ENDPATH**/ ?>