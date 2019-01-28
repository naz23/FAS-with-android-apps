


function sendPush() {
    var pubnub = PUBNUB.init({
    subscribe_key: 'sub-c-04b58102-6cd8-11e5-b6e2-0619f8945a4f',
    publish_key:   'pub-c-87c580e1-843e-4d00-8df9-a96bd1f92bfc',
});
    
    pubnub.mobile_gw_provision ({
        device_id: 'negxfdyb', // Reg ID you got on your device
        channel  : 'negxfdyb',
        op: 'add', 
        gw_type: 'gcm',
        error : function(msg){console.log(msg);},
        callback : successCallback()
    });
    
    function successCallback() {
    var message = PNmessage();

    message.pubnub = pubnub;
    message.callback = function(msg){ console.log(msg); };
    message.error = function (msg){ console.log(msg); };
    message.channel = 'negxfdyb';
    message.gcm = {
        title: 'Flood Alert',
        message: 'Danger!!'
    };

    message.publish();
}
}


