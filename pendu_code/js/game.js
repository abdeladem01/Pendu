window.onload = function () {
	///////////
	//VERSION 1
	///////////

	let tentativesRatees = 0;
	let test2 =null;
	let gamestate = null;
	let last = null;
	let classement = null;
	let tableau = null;
	let tableaufinal = [];

	new simpleAjax('wordgen.php', 'get', '');
	new simpleAjax('wordverif.php', 'get', '', function (request) {
		let reponse = request.responseText.split('<br />');
		document.getElementById("deviner").innerHTML = reponse[0];
		document.getElementById("indice").innerHTML = reponse[1];
	}, function () { });

	function jeu() {
		let test1 = document.getElementById("deviner").innerHTML;
		this.onclick = "";
		this.style.opacity = "0.5";
		let use = this.title;
		new simpleAjax('wordverif.php', 'get', 'lettre=' + use, function (request) {
			let reponse = request.responseText.split('<br />');
			if (reponse[0] != "FAIL" && reponse[0] != "SUCCESS" && tentativesRatees!=11) {
				document.getElementById("deviner").innerHTML = reponse[0];
				test2 = reponse[0];
			} else { 
				for (let i = 0; i < boutons.length; i++) {
					boutons[i].onclick = "";
				}
				//let ht = document.getElementById("lejeu").clientHeight;
				document.getElementById("lejeu").innerHTML=" ";
				let para = document.createElement("h1");
				para.innerHTML="Fin du jeu";
				para.style.textAlign = "center";
				para.style.margin = "auto";
				document.getElementById("lejeu").appendChild(para);
				if (reponse[0]=="FAIL"){
					let imag = document.createElement("img");
					imag.src = "../images/fail.gif";
					imag.className="center";
					let txt = document.createElement("h2");
					txt.innerHTML = "Vous n'avez pas réussi... Vous pouvez mieux faire!<br />Le bon mot était : <br />";
					txt.textAlign = "center";
					txt.style.margin = "auto";
					new simpleAjax('word.php','get','',function(request){
							last = request.responseText;
					},function () { });
					setTimeout(function(){ 
						let rep = document.createElement("h1");
						rep.style.color = "red";
						rep.style.fontFamily = "cursive";
						rep.style.margin = "auto";
						rep.innerHTML = last;
						rep.style.textAlign = "center";
						let btns = document.createElement("div");
					btns.className="bouton";
					let btn1 = document.createElement("a");
					let btn2 = document.createElement("a");
					btn1.className="btn1";
					btn2.className="btn2";
					btn1.innerHTML = "Rejouer?"; btn1.href="../php/game.php";
					btn2.innerHTML = "Revenir?"; btn2.href="../index.php";
					btns.appendChild(btn1);btns.appendChild(btn2);
					document.getElementById("lejeu").appendChild(imag);
					document.getElementById("lejeu").appendChild(txt);
					document.getElementById("lejeu").appendChild(rep);
					document.getElementById("lejeu").appendChild(btns);
					new simpleAjax('pusher.php','get','',function(request){
						classement=request.responseText;
						tableau = classement.split("<br/>");
						for (let s =0; s<tableau.length -1 ; s++){
							let m = tableau[s].split(",");
							tableaufinal.push(m);
						}
						tableaufinal.sort(function(a, b) { return a[2] - b[2]; });
						let ranking = document.createElement("div");
						let titre = document.createElement("h3");
						ranking.style.textAlign = "center";
						titre.style.textAlign = "center";
						titre.style.fontStyle = "italic";
						titre.innerHTML = "TOP 3 des meilleurs joueurs : ";
						document.getElementById("lejeu").appendChild(titre);
            ranking.innerHTML = "1er : "+tableaufinal[0][0]+" a deviné le mot "+tableaufinal[0][1]+" en "+tableaufinal[0][2]+"s !<br/>"+"2e : "+tableaufinal[1][0]+" a deviné le mot "+tableaufinal[1][1]+" en "+tableaufinal[1][2]+"s !<br/>"+"3e : "+tableaufinal[2][0]+" a deviné le mot "+tableaufinal[2][1]+" en "+tableaufinal[2][2]+"s !<br/>";
            document.getElementById("lejeu").appendChild(ranking);
						}); 
							}, 300);
					}else{
						tentativesRatees-=1;
						temps=40-minuteur; // pour la V2
						clearTimeout(tiimer);
						let imag = document.createElement("img");
						imag.src = "../images/win.gif";
						imag.className="center";
						let txt = document.createElement("h2");
						txt.innerHTML = "Et oui! GAGNÉ!<br />Le bon mot était bien : <br />";
						txt.style.textAlign = "center";
						txt.style.margin = "auto";
						new simpleAjax('word.php','get','',function(request){
							last = request.responseText;
						},function () { });
						setTimeout(function(){ 
						let rep = document.createElement("h1");
						rep.style.color = "red";
						rep.style.fontFamily = "cursive";
						rep.style.margin = "auto";
						rep.innerHTML = last;
						rep.style.textAlign = "center";
						let btns = document.createElement("div");
						btns.className="bouton";
						let btn1 = document.createElement("a");
						let btn2 = document.createElement("a");
						btn1.className="btn1";
						btn2.className="btn2";
						btn1.innerHTML = "Rejouer?"; btn1.href="game.php";
						btn2.innerHTML = "Revenir?"; btn2.href="../index.php";
						btns.appendChild(btn1);btns.appendChild(btn2);
						document.getElementById("lejeu").appendChild(imag);
						document.getElementById("lejeu").appendChild(txt);
						document.getElementById("lejeu").appendChild(rep);
						document.getElementById("lejeu").appendChild(btns);
						new simpleAjax('user.php','get','',function(request){
              let log = request.responseText ;
              if(log!=""){
								new simpleAjax('pusher.php','post','user='+log+'&mot='+last+'&t='+temps.toString(),function(request){
									classement=request.responseText;
									tableau = classement.split("<br/>");
									for (let s =0; s<tableau.length -1 ; s++){
										let m = tableau[s].split(",");
										tableaufinal.push(m);
									}
									tableaufinal.sort(function(a, b) { return a[2] - b[2]; });
									let ranking = document.createElement("div");
									let titre = document.createElement("h3");
									ranking.style.textAlign = "center";
									titre.style.textAlign = "center";
									titre.style.fontStyle = "italic";
									titre.innerHTML = "TOP 3 des meilleurs joueurs : ";
									document.getElementById("lejeu").appendChild(titre);
                  ranking.innerHTML = "1er : "+tableaufinal[0][0]+" a deviné le mot "+tableaufinal[0][1]+" en "+tableaufinal[0][2]+"s !<br/>"+"2e : "+tableaufinal[1][0]+" a deviné le mot "+tableaufinal[1][1]+" en "+tableaufinal[1][2]+"s !<br/>"+"3e : "+tableaufinal[2][0]+" a deviné le mot "+tableaufinal[2][1]+" en "+tableaufinal[2][2]+"s !<br/>";
                  document.getElementById("lejeu").appendChild(ranking);
								});
                
              }else{
								new simpleAjax('pusher.php','get','',function(request){
									classement=request.responseText;
									tableau = classement.split("<br/>");
									for (let s =0; s<tableau.length -1 ; s++){
										let m = tableau[s].split(",");
										tableaufinal.push(m);
									}
									tableaufinal.sort(function(a, b) { return a[2] - b[2]; });
									let ranking = document.createElement("div");
									let titre = document.createElement("h3");
									ranking.style.textAlign = "center";
									titre.style.textAlign = "center";
									titre.style.fontStyle = "italic";
									titre.innerHTML = "TOP 3 des meilleurs joueurs : ";
									document.getElementById("lejeu").appendChild(titre);
                  ranking.innerHTML = "1er : "+tableaufinal[0][0]+" a deviné le mot "+tableaufinal[0][1]+" en "+tableaufinal[0][2]+"s !<br/>"+"2e : "+tableaufinal[1][0]+" a deviné le mot "+tableaufinal[1][1]+" en "+tableaufinal[1][2]+"s !<br/>"+"3e : "+tableaufinal[2][0]+" a deviné le mot "+tableaufinal[2][1]+" en "+tableaufinal[2][2]+"s !<br/>";
                  document.getElementById("lejeu").appendChild(ranking);
								}); //par defaut de temps, on remet le même code que dans le cas ou log null

							}
            });
							}, 300);
					}
					
					document.getElementById("lejeu").style.height="420px";

				
			}
			if (test1 == test2) {
				tentativesRatees += 1;
				document.getElementById("imgPendu").src = tentativesRatees < 10 ? "../lependu/images/p0" + tentativesRatees.toString() + ".png" : "../lependu/images/p" + tentativesRatees.toString() + ".png";
			}
			if (gamestate!=null){
				document.getElementById("lejeu").innerHTML=""; 
			}
		});
	}

	

	let boutons = document.getElementsByClassName("lettre");
	for (let i = 0; i < boutons.length; i++) {
		boutons[i].onclick = jeu;
	} 
	///////////
	//VERSION 2
	///////////
	let minuteur;
	let temps;
	function tictac(){
		let timer = document.createElement("h2");
		timer.id="timer";
		document.getElementById("lejeu").appendChild(timer);
		timer.style.margin="auto";
		timer.style.textAlign = "center";
		minuteur = 40;
		setInterval(function(){
		timer.innerHTML="Il vous reste : "+minuteur.toString()+"s";
			minuteur-=1;
		}
			,1000);
	}

	function stop(){
		document.getElementById("lejeu").innerHTML = " ";
		let para = document.createElement("h1");
		para.innerHTML="Fin du jeu";
		para.style.textAlign = "center";
		para.style.margin = "auto";
		document.getElementById("lejeu").appendChild(para);
		let imag = document.createElement("img");
		imag.src = "../images/fail.gif";
		imag.className="center";
		let txt = document.createElement("h2") ;;
    txt.style.textAlign = "center";
		txt.style.margin = "auto";
    txt.innerHTML = "Vous n'avez pas trouvé le bon mot dans le temps imparti <br/> le bon mot était :";
		document.getElementById("imgPendu").src="../lependu/images/p11.png"
    new simpleAjax('word.php','get','',function(request){
							last = request.responseText;
		},function () { });
		setTimeout(function(){ 
			let rep = document.createElement("h1");
			rep.style.color = "red";
			rep.style.fontFamily = "cursive";
			rep.style.margin = "auto";
			rep.innerHTML = last;
			rep.style.textAlign = "center";
			let btns = document.createElement("div");
			btns.className="bouton";
			let btn1 = document.createElement("a");
			let btn2 = document.createElement("a");
			btn1.className="btn1";
			btn2.className="btn2";
			btn1.innerHTML = "Rejouer?"; btn1.href="game.php";
			btn2.innerHTML = "Revenir?"; btn2.href="../index.php";
			btns.appendChild(btn1);btns.appendChild(btn2);
			document.getElementById("lejeu").appendChild(imag);
			document.getElementById("lejeu").appendChild(txt);
			document.getElementById("lejeu").appendChild(rep);
			document.getElementById("lejeu").appendChild(btns);
new simpleAjax('pusher.php','get','',function(request){
						classement=request.responseText;
						tableau = classement.split("<br/>");
						for (let s =0; s<tableau.length -1 ; s++){
							let m = tableau[s].split(",");
							tableaufinal.push(m);
						}
						tableaufinal.sort(function(a, b) { return a[2] - b[2]; });
						let ranking = document.createElement("div");
						let titre = document.createElement("h3");
						ranking.style.textAlign = "center";
						titre.style.textAlign = "center";
						titre.style.fontStyle = "italic";
						titre.innerHTML = "TOP 3 des meilleurs joueurs : ";
						document.getElementById("lejeu").appendChild(titre);
            ranking.innerHTML = "1er : "+tableaufinal[0][0]+" a deviné le mot "+tableaufinal[0][1]+" en "+tableaufinal[0][2]+"s !<br/>"+"2e : "+tableaufinal[1][0]+" a deviné le mot "+tableaufinal[1][1]+" en "+tableaufinal[1][2]+"s !<br/>"+"3e : "+tableaufinal[2][0]+" a deviné le mot "+tableaufinal[2][1]+" en "+tableaufinal[2][2]+"s !<br/>";
            document.getElementById("lejeu").appendChild(ranking);
						});			
			}, 300); // le setTimeout sert quand il y a une latence d'attente de la part du serveur php pour prendre le mot
	}
	let tiimer = setTimeout(stop,40000); //timer
	//display du timer
	tictac();
};