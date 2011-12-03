
<html>
    <head>
        <title>easyXDM.Server</title>
        <script type="text/javascript" src="src/easyXDM.debug.js"></script>
    </head>
    <body>
		<script type='text/javascript'>
		var socket = new easyXDM.Socket({
			onMessage: function(message, origin){
				/*alert("Received '" + message + "' from '" + origin + "'");*/
					function LZ(x) {
						return (x < 0 || x > 9 ? "" : "0") + x
					}
					var st=new Date();
					var hh=st.getHours() % 12;
					var mm=LZ(st.getMinutes());
					var ss=LZ(st.getSeconds());
					var ts='['+hh+':'+mm+':'+ss+']';
					var msg = ts+message.comment.uname +': '+ message.comment.c	
					socket.postMessage(msg);
				}
			});
		</script>
    </body>
</html>
