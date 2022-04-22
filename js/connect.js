$(document).ready(function () {
  try {
    var titleOfWebPage = document.querySelector(".navbar-brand");
    console.log(titleOfWebPage);
    titleOfWebPage.innerHTML = "Meritbodhi";
    console.log(titleOfWebPage.innerHTML);
    var linkss = document.querySelectorAll(".nav-link");
    linkss.forEach((link) => {
      console.log(link.getAttribute("href"));
      var newLink = link.getAttribute("href");
      // newLink = newLink+'/'
      console.log("newLink", newLink);
      link.setAttribute("href", newLink);
    });
  } catch {}
});
// firestore initialization
var firebaseConfig = {
  apiKey: "AIzaSyAfwW9eS7_rOdiS7kjavZVhJk-Cb95rnik",
  authDomain: "meritbodhi-courses.firebaseapp.com",
  projectId: "meritbodhi-courses",
  storageBucket: "meritbodhi-courses.appspot.com",
  messagingSenderId: "352967957649",
  appId: "1:352967957649:web:4ed3558194774b41af7330",
  measurementId: "G-7DTG94NNBW",
};
const sadid = "OsbMKqQ8j3bQjFgCEvuhnyLCBdE3";
firebase.initializeApp(firebaseConfig);
const data = firebase.firestore();
const auth = firebase.auth();
