$(document).ready(function () {
  var titleOfWebPage = document.querySelector(".navbar-brand");
  console.log(titleOfWebPage);
  titleOfWebPage.innerHTML = "Meritbodhi";
  var linkss = document.querySelectorAll(".nav-link");
  linkss.forEach((link) => {
    console.log(link.getAttribute("href"));
    var newLink = link.getAttribute("href");
    // newLink = newLink+'/'
    link.setAttribute("href", newLink);
    if (
      link.getAttribute("href") == "../manage-report/" ||
      link.getAttribute("href") == "../manage-addadmins/"
    ) {
      console.log("true");
      link.parentNode.style.display = "none";
    }
  });

  var exClass = $("#spinner-bjss").attr("class");
  //exception==> need to check and pass if the same class appeaared
  $("#spinner-bjss").attr("class", exClass + "d-flex justify-content-center");
  $("#spinner-bjss").append(` <div id="loader-cub" class="spinner-3"></div>`);
});
loaderTriggerAndEnder = (d) => {
  if (d) {
    document.getElementById("loaderTrigger").click();
  } else {
    document.getElementById("closeLoader").click();
  }
};
showToast = (Message) => {
  var x = document.getElementById("snackbar");
  x.innerHTML = Message;
  x.className = "show";
  setTimeout(function () {
    x.className = x.className.replace("show", "");
  }, 3000);
};
logout = () => {
  auth.signOut().then(() => {
    localforage.clear().then(() => {
      sessionStorage.clear();
      location.replace("https://meritbodhi.com/admin-login");
    });
  });
};
