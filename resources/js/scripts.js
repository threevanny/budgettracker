document.addEventListener('DOMContentLoaded', () => {
    const openModalButton = document.getElementById('open-modal');
    const closeModalButton = document.getElementById('close-modal');
    const modal = document.getElementById('modal-form');
    const modalCloseButton = document.getElementById('modal-close');

    // Open the modal when the open modal button is clicked
    openModalButton.addEventListener('click', () => {
        modal.classList.add('is-active');
    });

    // Close the modal when the close modal button is clicked
    closeModalButton.addEventListener('click', () => {
        modal.classList.remove('is-active');
    });

    // Close the modal when the modal background or close button is clicked
    modal.addEventListener('click', (event) => {
        if (event.target === modal || event.target === modalCloseButton) {
            modal.classList.remove('is-active');
        }
    });


    const typeselect = document.getElementById('type');
    const categoryselect = document.getElementById('category');

    typeselect.addEventListener('change', ({ target }) => {
        getdata(target);
    });

    categoryselect.addEventListener('change', ({ target }) => {
        getdata(target);
    });

    function getdata(element){
        const element_id = element.id;
        const id = element.value;
        const url = element.getAttribute('data-url');

        // getting the token
        const form = element.closest('form');
        const csrf = form.querySelector('input[name="_token"]').value;

        fetch(url, {
            method: "POST",
            headers: {
            "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: id,
                task: element_id,
                _token: csrf,
            }),
        })
        .then(response => response.json())
        .then(dataSet => {
            if(dataSet.success){
                const select = document.getElementById(element_id == 'type' ? 'category' : 'subcategory');
                select.innerHTML = '';
                select.innerHTML = '<option value="">Choose...</option>';
                dataSet.data.forEach(element => {
                    select.innerHTML += '<option value="'+element.id+'">'+element.name+'</option>';
                });
            }
        }).catch(error => {
            console.error(error);
        });
    }

    // Form submit
    const form = document.getElementById('form_transaction')
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const url = form.getAttribute('action');
        const formData = new FormData(form);
        const submitButton = document.getElementById('submit-form');
        submitButton.classList.add('is-loading');
        fetch(url, {
            method: "POST",
            headers: {
            "X-CSRF-TOKEN": formData.get('_token'),
            },
            body: formData,
        })
        .then(response => response.json())
        .then(dataSet => {
            if(dataSet.success){
                submitButton.classList.remove('is-loading');
                form.reset();
                alert(dataSet.message);
            }
        }).catch(error => {
            console.error(error);
        });
    });


    //  Chart

    function getdatachart(context, url){
        fetch(url, {
            method: "GET",
            headers: {
            "Content-Type": "application/json",
            },
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                console.log(data);
                new Chart(context, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Income',
                            data: data.income,
                            borderWidth: 1,
                        }, {
                            label: 'Expense',
                            data: data.expense,
                            borderWidth: 1,
                        }, {
                            label: 'Ending Balance',
                            data: data.balance,
                            borderWidth: 1,
                        }]
                    }, options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        }).catch(error => {
            console.error(error);
        });
    }

    const ctx = document.getElementById('chart');
    const url = ctx.getAttribute('data-url');
    getdatachart(ctx, url);



    // const trigger = document.querySelector('.custom-trigger');
    // const target = document.querySelector('#custom-table');
    // trigger.addEventListener('click', function() {
    //     target.classList.toggle('is-hidden');
    // });


    
});