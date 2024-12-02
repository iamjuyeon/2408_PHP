import axios from "axios";

const axiosInstance = axios.create({
    //기본 url
    // baseURL: '112.222.157.156:6515',

    //기본 헤더 설정
    headers: {
        'Content-Type' : 'application/json',
    }
})

export default axiosInstance;