window.onload = function(){
	let click =false;
	btn = document.getElementsByClassName("btn2");
	btn2 = btn[0];  
	let connected ;
	new simpleAjax('php/status.php','get','',function(request){
		let rep1 = request.responseText;
		//console.log();
		if (rep1 == "false"){
			btn2.innerHTML = "Se connecter";
			btn2.onclick=connect;
		} else{
			btn2.innerHTML = "Se déconnecter";
			btn2.onclick = function () {
        location.href = "php/signout.php";
    };
		}
	});
	function connect(){
		new simpleAjax('php/signin.php', 'get','',function(request){
		let rep2 = request.responseText;
		let conn = document.createElement("div");
		conn.style.width="400px";
		conn.style.margin="auto";
		conn.style.border = "1px outset black";
		conn.innerHTML=rep2;
		document.getElementsByClassName("bouton")[0].after("br",conn);
		btn = document.getElementsByClassName("btn2");
		btn2 = btn[0];
		btn2.onclick="";
		});
	}
};