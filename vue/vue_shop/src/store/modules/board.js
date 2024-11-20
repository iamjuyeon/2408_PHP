export default {
    namespaced: true, //모듈화된 스토어의 네임 스페이지 활동화

    state: () => ({ //데이터가 저장되는 영역
        count: 0, //키와 값을 세팅해줌 -> 이걸 컴퍼넌트에서 사용할 수 있음
        //함부러 접근해서 수정할 수 없음

        product: [
            {productName: '바지', productPrice: 38000, productContent: '매우 아름다운 바지'}
            ,{productName: '티셔츠', productPrice: 25000, productContent: '매우 아름다운 티셔츠'}
            ,{productName: '양말', productPrice: 29900, productContent: '매우 비싼 양말'}
        ],
        detailProduct: {productName: '', productPrice: 0, productContent: ''} //초기 세팅
    }),
    mutations: {
        // 데이터를 수정할 수 있는 함수들을 정의하는 영역
        addCount(state) { // 저기 위에 있는 state를 말하고, 모든 데이터가 들어갈 수 있음
            state.count++;
        },
        setDetailProduct(state, item) {
            state.detailProduct = item;
        }
    },
    actions: { //비동기성 비즈니스 로직 함수를 정의하는 영역

    },getters: { //추가처리를 하여 state의 데이터를 획득하기 위한 함수들을 정의하는 영역


    }

}

