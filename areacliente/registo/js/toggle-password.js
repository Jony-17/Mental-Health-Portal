document.addEventListener('DOMContentLoaded', function () {
  const togglePassword = document.querySelector('.toggle-password');
  const toggleCPassword = document.querySelector('.toggle-cpassword');
  const password = document.getElementById('password');
  const cpassword = document.getElementById('cpassword');

  togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
      this.classList.toggle('fa-eye');
  });

  toggleCPassword.addEventListener('click', function () {
      const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
      cpassword.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
      this.classList.toggle('fa-eye');
  });
});