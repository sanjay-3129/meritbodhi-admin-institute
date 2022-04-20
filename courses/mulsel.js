
var expanded = false;
var Finsetter="";

var idsset=document.getElementById('facidssss');

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
  var ids='';
  var selectedChecks = "", qtChecks = 0;
  for (i = 0; i < els.length; i++) {
  	if (els[i].checked) {
      if (qtChecks > 0){
       selectedChecks += ",";
       ids+=",";
     }
    console.log(els[i].value.split('?***?'));
	  selectedChecks += els[i].value.split('?***?')[1];
    ids+=els[i].value.split('?***?')[0];
    console.log(selectedChecks);
    console.log(ids);
      qtChecks++;
    }
  }
  
  if(selectedChecks != "") {
    document.getElementById(Finsetter).innerText = selectedChecks;
    document.getElementById('facidssss').innerHTML=ids;
    document.getElementById('facidssss').setAttribute("faculty-names",selectedChecks);

  } else {
    document.getElementById(Finsetter).innerText = "Select an option";
  }
}

