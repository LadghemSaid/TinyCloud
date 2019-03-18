import Echo from 'laravel-echo';

const options = {
  broadcaster: 'pusher',
  key: config.pusher.key,
  cluster: config.pusher.cluster,
  forceTLS: config.pusher.tls,
  //authEndpoint is your apiUrl + /broadcasting/auth
  authEndpoint: config.pusher.authEndpoint, 
  // As I'm using JWT tokens, I need to manually set up the headers.
  auth: {
    headers: {
      Authorization: `Bearer ${token}`,
      Accept: 'application/json',
    },
  },
};

const echo = new Echo(options);
echo.private(`App.User.${userId}`).notification((data) => {
    console.log(data);
});