const loginForm = document.forms[1];
loginForm.addEventListener('submit', async e => {
    e.preventDefault();

    let inputs = loginForm.querySelectorAll('input:not([type=submit])'),
        fields = [];
    inputs.forEach((value) => {
        fields[value.name] = value.value;
    });
    const response = await fetch(loginForm.getAttribute('action'), {
        method: loginForm.getAttribute('method'),
        headers: {
            ContentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            type: 'xhr',
        },
        body: JSON.stringify(Object.assign({}, fields))
    }), message = await response.text();

    if (message)
        document.getElementById('loginResult').textContent = message;
    else
        window.location.href = 'api/user/dashboard';
});