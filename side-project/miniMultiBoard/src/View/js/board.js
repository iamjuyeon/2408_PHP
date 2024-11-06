(() => {
    document.querySelectorAll('.my-btn-detail').forEach(node => {
        node.addEventListener('click', e => {
            const URL = '/boards/detail?b_id=' + e.target.value;
            console.log(URL);
            axios.get(URL)
            .then(response => {
                console.log(response.data);
                const TITLE = document.querySelector('#modalTitle');
                const CONTENT = document.querySelector('#modalContent');
                const IMG = document.querySelector('#modalIMG');
                const NAME = document.querySelector('#modalName');

                TITLE.textContent = response.data.b_title;
                CONTENT.textContent = response.data.b_content;
                IMG.setAttribute('src', response.data.b_img);
                NAME.textContent = response.data.u_name;
            })
            .catch(error => {
                console.error(error);
            });
        });
    })

    document.querySelector('#btnInsert').addEventListener('click', () => {
        window.location = '/boards/insert';
    });

})();