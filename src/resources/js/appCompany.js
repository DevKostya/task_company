require('./bootstrap');
const btn = document.getElementById('btn-circle');
if (btn) {
    btn.onclick = function (event) {
        if(btn.innerText==='+'){
            btn.innerHTML='-';
        }
        else{
            btn.innerHTML='+';
        }
        const element = document.getElementById('show-items');
        element.classList.toggle('d-none');
    };
}

$("#formComment").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
        type: "POST",
        url: '',
        data: form.serialize()+'&user_id='+window.userId,
        success: function()
        {
            location.reload()
        },
        error: function (data) {
            const element = document.getElementById('request-result');
            element.innerHTML = '';
            element.classList.remove('d-none');
            const errors = data.responseJSON.errors;
            for(err in errors) {
                element.innerHTML += errors[err][0]+'<br>';
            }

        }

    });
});
