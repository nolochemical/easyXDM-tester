
<html>
    <head>
        <title>easyXDM.Client</title>
        <script type="text/javascript" src="src/easyXDM.debug.js"></script>
        <script type="text/javascript" src="jquery.min.js"></script>
    </head>
    <body>
		<script type='text/javascript'>
			var socket = new easyXDM.Socket({
				remote: "http://localhost/tester/index.php",
				onMessage: function(message, origin){
					var msg = $("#messages").html()+message+"\n"
					$("#messages").html(msg);
					$("#sendtext").val('');
					
				},
				onReady: function() {
					var uname = 'nolochemical';
					$("#sendtext").keypress(function(event) {						
						if ( event.which == 13 ) {
							event.preventDefault();

							if($("#sendtext").val() != '' || $("#sendtext").val() != null )
							{
								socket.postMessage(
									{
										"comment": {
											"uname": uname,
											"c": $("#sendtext").val()
										}
									}
								);
								$("#sendtext").val('');
							}
						}						   
					});
					$("#send").click(function(){
						if($("#sendtext").val() != '' || $("#sendtext").val() != null )
						{
							socket.postMessage($("#sendtext").val());
						}
					});
				}
			});
	
		</script>
	<h1>Client</h1>
	<textarea id='messages' cols='50' rows='20'></textarea>	<textarea cols='20' rows='20'>nolochemical</textarea><br />
	<input id='sendtext' style='width: 400px;' name='sendtext' /> <button id='send' type='submit'>send</button>
		
		
    </body>
</html>
