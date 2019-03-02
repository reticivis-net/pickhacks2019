<input type="checkbox" id="checkbox1">checkbox</input>
<button type="button" onClick="save()">save</button>


<script>
function save() {
	var checkbox = document.getElementById("checkbox1");
    localStorage.setItem("checkbox1", checkbox.checked);

if localStorage.getItem("checkbox1") == false;
  localStorage.setItem("checkbox1", 0);
else if localStorage.getItem("checkbox1") == true;
  localStorage.setItem("checkbox1", 1);

}
//for loading
var checked = JSON.parse(localStorage.getItem("checkbox1"));
    document.getElementById("checkbox1").checked = checked;
</script>
