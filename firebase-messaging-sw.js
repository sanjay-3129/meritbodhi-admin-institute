importScripts('https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.9.0/firebase-messaging.js');

var firebaseConfig = {
    apiKey: "AIzaSyAfwW9eS7_rOdiS7kjavZVhJk-Cb95rnik",
    authDomain: "meritbodhi-courses.firebaseapp.com",
    projectId: "meritbodhi-courses",
    storageBucket: "meritbodhi-courses.appspot.com",
    messagingSenderId: "352967957649",
    appId: "1:352967957649:web:4ed3558194774b41af7330",
    measurementId: "G-7DTG94NNBW"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});