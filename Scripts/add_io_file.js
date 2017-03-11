var add_io_file  = function () {
	window.alert("Input dialog to another test file will be added.");
	var elemin = document.getElementById("ip").cloneNode(true);
	var elemout = document.getElementById("out").cloneNode(true);

	elemout.id += (cnt + "");
	elemin.id += (cnt + "");

	document.getElementById("fields").appendChild(elemin);
	document.getElementById("fields").appendChild(elemout);

	document.getElementsByName("inputf")[1].setAttribute("name", "inputf" + cnt);
	document.getElementsByName("outputf")[1].setAttribute("name", "outputf" + cnt);
	cnt ++;
}