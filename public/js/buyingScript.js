let buttons = document.querySelectorAll('.buy');

buttons.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        (
            async () => {
                const response = await fetch('/basket/addToBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    })
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                console.log(answer.id)
            }
        )();
        setTimeout(function () {
            $('.fade').fadeIn(500);
            $('.fade').fadeOut('fast')
        }, 1500);
    })
});
