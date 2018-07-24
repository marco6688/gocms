import axios from "axios";
export default {
    getNewsRecommend:function (params) {
        return axios.get('api/news');
    }
}