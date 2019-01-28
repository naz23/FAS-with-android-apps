<?php
echo "<a href='http://www.hoverdroids.com/2015/06/10/calling-a-javascript-function-from-php/'>Full example at: http://www.hoverdroids.com/2015/06/10/calling-a-javascript-function-from-php/</a>";
echo "<p>Add whatever PHP you want here...</p>";

$myname = 'MyName';
$yourname = 'YourName';

//Data that is going to be passed into the JavaScript function. Try to keep all vars together so
//that it's easier to track down the php/javascript interaction
$jsdata = array(
				'input' => $myname,
				'array_input' => array(
										'name' => $yourname
				),
);
?>
<!--This JS can be here or a separate file since all it's doing is defining a function in the JS space'-->
<script>
	function callAlert(text){
		alert(text);
	}
</script>
<script>
   
function sendPush() {
    var pubnub = PUBNUB.init({
    subscribe_key: 'sub-c-04b58102-6cd8-11e5-b6e2-0619f8945a4f',
    publish_key:   'pub-c-87c580e1-843e-4d00-8df9-a96bd1f92bfc',
});

    pubnub.mobile_gw_provision ({
        device_id: 'rbarvi2x', // Reg ID you got on your device
        channel  : 'rbarvi2x',
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
    message.channel = 'rbarvi2x';
    message.gcm = {
        title: 'Flood Alert',
        message: 'Danger !!'
    };

    message.publish();
	alert("tahniah")
}
}
</script>
<!--This JS must be defined with the php since it's using previously defined php variables -->
<script>
	var JSDATA = <?=json_encode($jsdata, JSON_HEX_TAG | JSON_HEX_AMP )?>;
	
	//Prompt using a single var in the array
	callAlert(JSDATA.input);
	
	
	//Prompt using a var from a nested array	
	callAlert(JSDATA.array_input.name);
	sendPush();
	successCallback();
</script>
<?php
?>