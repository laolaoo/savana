function openlogin(){
	var x =document.getElementById('login');

	if(x.style.display === "none"){
		x.style.display="block";
	}
	else{
		x.style.display="none";
	}
}

function opensidebar(){
	var y=document.getElementById('sidebar');
	if(y.style.width== "0px"){
		y.style.width="200px";
	}
	else{
		y.style.width="0px";
	}
}

function usermenu(){
	var a =document.getElementById('arrow');
	var z=document.getElementById('usermenu');
	if(z.style.display == "none"){
		z.style.display="block";
		
		a.classList.add("up");

	}
	else{
		z.style.display="none";
		a.classList.remove("up");
	}
}