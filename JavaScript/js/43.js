const BTN_CALL = document.querySelector('#btn_call');
BTN_CALL.addEventListener('click', getList);

function getList() {
    const URL = document.querySelector('#url').value; 
    console.log(URL);


    //get
    //php try catch 기능과 비슷
    //chaining method : .으로 연결
    axios.get(URL) //요청을 보냄 url에
    .then(response => {
        //이상이 없으면 처리
        console.log(response.date);
        response.data.forEach(item => {
            const NEW = document.createElement('img');
            NEW.setAttribute('src', item.download_url);
            NEW.style.width = '200px';
            NEW.style.height = '200px';

            document.querySelector('.container').appendChild(NEW);
        })

    }) 
    .catch(error => {
        console.log(error);
    });  //이상이 생기면 오류 처리

}



