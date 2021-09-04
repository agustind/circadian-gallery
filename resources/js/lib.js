export function decodeError(str){
    if(str.search('error_higher_bid_exists') > -1){
        return {message: 'Sorry, but there is a higher bid'};
    }
    if(str.search('error_auction_ended') > -1){
        return {message: 'Sorry, but this auction already ended'};
    }
    if(str.search('insufficient funds') > -1){
        return {message: 'Sorry, insufficient funds'};
    }
    if(str.search('User denied transaction') > -1){
        return {message: 'Sorry, transaction cancelled'};
    }
    return {messsage: str};
}