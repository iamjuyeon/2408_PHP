(() => {
    document.querySelectorAll('.my-btn-detail').forEach(node => {
        node.addEventListener('click', e => {
            const url ='/boards/' + e.target.value;

            axios.get(url)
            .then(response => {
                const modalTitle = document.querySelector('#modalTitle');
                const modalContent = document.querySelector('#modalContent');
                const modalCreatedAt = document.querySelector('#modalCreatedAt');
                const modalImg = document.querySelector('#modalImg');
                
                //동일 u_id가 아닐 경우 삭제 버튼 안보이게
                const modalDeleteParent = document.querySelector('#modalDeleteParent');

                modalTitle.textContent = response.data.b_title;
                modalContent.textContent = response.data.b_content;
                modalCreatedAt.textContent = response.data.created_at;
                modalImg.setAttribute('src', response.data.b_img);

                //처음 화면에는 보이나 상세 버튼을 누르면 안보이고 u_id가 같을 경우 보이게
                modalDeleteParent.textContent = ''; //리셋 처리, 안해주면 삭제버튼 계속 복사됨

                if(response.data.delete_flg) {
                    const newButton = document.createElement('button');
                    newButton.setAttribute('type', 'button');
                    newButton.setAttribute('class', 'btn btn-danger');
                    newButton.textContent = '삭제';

                    //삭제 처리
                    newButton.setAttribute('onclick', `boardDestroy(${e.target.value})`);
                    newButton.setAttribute('data-bs-dismiss', 'modal'); //부트스트랩일 경우 삭제버튼을 누르면 모달 닫김
                    //문제점 : 버전마다 동작이 다름


                    modalDeleteParent.appendChild(newButton);                
                }
            })

            .catch(error => {
                console.error(error);

            })
        });
    })
})();

function redirectInsert($type) {
    window.location = '/boards/create?bc_type=' + $type;
}

//삭제 처리
function boardDestroy($id) { //$id 가 숫자인지 아닌지, 동일 인물인지 아닌지 유효성검사

    const url = '/boards/' + $id;

    axios.delete(url)
    .then(response => {
        if(response.data.success) {
            //프론트 엔드 삭제 처리
            const deleteNode = document.querySelector('#card' + $id); //삭제하고자 하는 게시글의 id지목
            deleteNode.remove();

        } else {
            alert('삭제 실패');
        }


    })
    .catch(error => {
        console.error(error);
        alert('에러 발생');
    });

}

