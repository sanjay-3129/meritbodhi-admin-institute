
var expanded = false;
var Finsetter="";
function showCheckboxes(a) {
  Finsetter = a.firstChild.nextElementSibling.firstChild.nextElementSibling.id;
  var checkboxes = document.getElementById(a.nextElementSibling.id);
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function getDatafin() {
  alert(document.getElementById('defaultCategory').innerHTML);
}
function checkOptions(gebn) {
  els = document.getElementsByName(gebn.name);
  var selectedChecks = "", qtChecks = 0;
  for (i = 0; i < els.length; i++) {
  	if (els[i].checked) {
      if (qtChecks > 0) selectedChecks += ", "
	  selectedChecks += els[i].value;
      qtChecks++;
    }
  }
  
  if(selectedChecks != "") {
    document.getElementById(Finsetter).innerText = selectedChecks;
  } else {
    document.getElementById(Finsetter).innerText = "Select an option";
  }
}

