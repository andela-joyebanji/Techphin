
$(document)
.ready(function() {
  $('#register.ui.form, #sign-up-form.ui.form')
  .form({
    fields: {
      email: {
        identifier  : 'email',
        rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your e-mail'
        },
        {
          type   : 'email',
          prompt : 'Please a valid e-mail address'
        }
        ]
      },
      firstname: {
        identifier  : 'firstname',
        rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your firstname'
        }
        ]
      },
      lastname: {
        identifier  : 'lastname',
        rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your lastname'
        }
        ]
      },
      username: {
        identifier  : 'username',
        rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your username'
        }
        ]
      },
      password: {
        identifier  : 'password',
        rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your password'
        },
        {
          type   : 'length[6]',
          prompt : 'Your password must be at least 6 characters'
        }
        ]
      }
    }
  })
  ;
})
;
