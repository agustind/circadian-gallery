<!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->

<div class="hidden popup-bid" style="position: fixed; top: 0; left: 0; bottom: 0; right: 0; z-index: 99">
    
    <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); z-index: 2">
    
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">Place bid</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            You are about to place a bid<br>
                            <div class="flex mt-4">
                                <div class="pt-3 pr-2">Ξ</div>
                                <div>
                                    <input type="text" value="0" class="bid-amount text-black rounded-md outline-none bg-gray-200 py-2 px-2 shadow-sm border-gray-300 focus:ring focus:ring-gray-600 focus:ring-opacity-50 block mt-1 w-full" />
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="button-modal-place-bid mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Place bid</button>
            </div>
        </div>
        </div>

        <div class="popup-bid-overlay" style="cursor: pointer; background-color: #fff; opacity: 0.9; position: absolute; z-index: 1; left: 0; top: 0; right: 0; bottom: 0"></div>


</div>

    