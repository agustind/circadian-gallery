window.$ = $ = require('jquery');
import abi_json from '!raw-loader!./abi'
import { decodeError } from './lib';

var abi = JSON.parse(abi_json);

window.auto_update_bids = true;
window.highestBid = 0;


function setChain(chainID){
    console.log('setting chain id:' + chainID);
    if(chainID != chain_id){
        alert('Circadian runs on ' + chain_name + '. Please select this blockchain on Metamask to place a bid');
        $('.bids-button').hide();
    }else{
        $('.bids-button').show();
    }
}

$(function() {

    // metamask installed
    if (typeof window.ethereum !== 'undefined') {
        
        const provider = new ethers.providers.Web3Provider(window.ethereum);
        console.log(provider.getNetwork().then(function(network){
            console.log(network);
            setChain(network.chainId);
        }));

        window.ethereum.on('chainChanged', chainId => {
            setChain(parseInt(chainId));
        });
       
    }


    $('.btn-bid').on('click', function(e){
        e.preventDefault();
        connectWallet(); 
    });
    
    $('.button-modal-place-bid').on('click', function(e){
        e.preventDefault();
        if($('.bid-amount').val() == 0 || $('.bid-amount').val() == '') return;
        placeBid();
    });

    $('.popup-bid-overlay').on('click', function(e){
        e.preventDefault();
        $('.popup-bid').hide();
    });

    if($('.btn-bid').length > 0){
        setInterval(function(){
            
            if(window.auto_update_bids){
                updateBids();
            }

        }, 1500);
    }

});



async function connectWallet(){

    await window.ethereum.enable();
    await initWallet();

}


async function initWallet(){

    if (typeof window.ethereum !== 'undefined') {

        const provider = new ethers.providers.Web3Provider(window.ethereum)
        
        window.signer = provider.getSigner();
        var address = await signer.getAddress();
        
        if(address && address != ''){

            var trunc_account = address.substring(0,4) + ' ... ' + address.substring(address.length - 4);
            window.eth_address = address;

            $('.current-address').html(trunc_account).show();
            // $('.connect-wallet').hide();

            // The Contract object
            window.contract = new ethers.Contract(contract_address, abi, provider);
            $('.popup-bid .bid-amount').val(window.highestBid);

            $('.popup-bid').show();

        }
        
    }else{

        console.log('MetaMask is not installed');

    }
}

function updateBids(){
    $.ajax({
        url: '/bids',
        success: function(data) {
            
            var bids = '';
            
            if(data.length > 0){
                
                for(var bid of data){

                    if(bid.value > window.highestBid) window.highestBid = bid.value;

                    var addr = bid.address.substring(0,6) + ' ... ' + bid.address.substring(bid.address.length - 6);
                    bids += '<a href="' + scan_url + '/tx/' + bid.tx + '/" target="_blank"><div class="bid grid items-center grid-cols-2 mb-6"><div>' + addr + '</div><div class="text-right font-bold"><div style="font-size: 1.4em">Ξ ' + bid.value + '</div></div></div></a>';
                    
                }
                
                if($('.bid-amount').val() == ''){

                    var next_value = parseFloat(data[0].value) + 0.1;
                
                    $('.bid-amount').val(next_value.toFixed(2));

                }

                $('.bids').html(bids);
                $('.highest-bid').html(window.highestBid);
                $('.bids-placed').html(data.length);
                $('.only-if-has-bids').show();

            }
            

        }
    });
}


async function placeBid(){

    if(isNaN($('.bid-amount').val())) return;

    const daiWithSigner = window.contract.connect(window.signer);

    var overrides = {
        value: ethers.utils.parseEther($('.bid-amount').val())
    }

    try{

        $('.btn-bid p').html('bidding...');

        var tx = await daiWithSigner.bid(overrides);
        if(tx.hash == ''){
            var error = decodeError(tx.message);
            console.log(error);
            return;
        }

        contract.on("HighestBidIncreased", (to, amount, from) => {
            
            // new bid event triggered
            console.log('new bid event triggered');
            console.log(to, amount, from);
            $('.btn-bid p').html('Place a bid');
            // the bid was this trasaction
            if(from.transactionHash == tx.hash){
                $.ajax({
                    url: '/bid/' + tx.hash,
                    success: function(data) {
                        updateBids();
                    }
                });
            }


        });

        // listen to HighestBidIncreased event

        $('.popup-bid').hide();
        


    }catch(e){

        
        
        console.log(e.message);
        if(e.data){
            console.log(e.data.message); 
            alert(e.data.message);
        }
        
        $('.btn-bid p').html('Place a bid');
        $('.popup-bid').hide();
        
    }
}
