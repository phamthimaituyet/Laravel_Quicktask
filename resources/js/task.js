const button1 = document.querySelectorAll('.btn.btn-danger.btn-sm');
button1.forEach(button => {
    button.onclick = function() {
        const input = document.querySelector('#idTaskDelete');
        input.value = button.getAttribute('data-id');
    }
})
