const validation = new JustValidate('#form-register', {
  errorFieldCssClass: 'is-invalid',
})

validation
  .addField('#name', [
    {
      rule: 'required',
    }
  ])
  .addField('#email', [
    {
      rule: 'required',
    },
    {
      rule: 'email'
    }
  ])
  .addField('#identity-code', [
    {
      rule: 'maxLength',
      value: 16
    },
    {
      rule: 'required'
    },
    {
      rule: 'number'
    }
  ])
  .addField('#password', [
    {
      rule: 'required'
    },
    {
      rule: 'minLength',
      value: 3
    }
  ])