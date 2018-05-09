var loginForm = document.getElementById('login-form');
var loginToggle = document.getElementById('login-toggle');
var forgetForm = document.getElementById('forget-form');
var forgetToggle = document.getElementById('forget-toggle');

if (loginToggle) {
  loginToggle.addEventListener('click', function () {
    if (! loginForm.style.display || loginForm.style.display === 'none') {
      loginForm.style.display = 'block';
    } else {
      loginForm.style.display = 'none';
    }
  });
}

if (forgetToggle) {
  forgetToggle.addEventListener('click', function () {
    if (! forgetForm.style.display || forgetForm.style.display === 'none') {
      forgetForm.style.display = 'block';
    } else {
      forgetForm.style.display = 'none';
    }
  });
}

