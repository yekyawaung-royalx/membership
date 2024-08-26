/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
  // apiKey: "XXXXXXXXXXX",
  // authDomain: "XXXXXXXX",
  // projectId: "XXXXXXXX",
  // storageBucket: "XXXXXXXXXX",
  // messagingSenderId: "XXXXXXXXX",
  // appId: "XXXXXXXXXXXXX",
  // measurementId: "G-XXXXX"
  apiKey: "AIzaSyBMOs7y9LpkUM0fgqs34aVQogeh-qt0njg",
  authDomain: "vue-store-4651d.firebaseapp.com",
  databaseURL: "https://vue-store-4651d.firebaseio.com",
  projectId: "vue-store-4651d",
  storageBucket: "vue-store-4651d.appspot.com",
  messagingSenderId: "812944361809",
  appId: "1:812944361809:web:002d72bcd720aed357ab70"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
  console.log(
    "[firebase-messaging-sw.js] Received background message ",
    payload,
  );
  /* Customize notification here */
  const notificationTitle = "Background Message Title";
  const notificationOptions = {
    body: "Background Message body.",
    icon: "https://www.gstatic.com/mobilesdk/240501_mobilesdk/firebase_28dp.png",
  };

  return self.registration.showNotification(
    notificationTitle,
    notificationOptions,
  );
});
