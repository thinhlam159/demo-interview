import axios from "axios";
import { STATUS_CODE } from "@/const";
import router from "@/router/index.jsx";

const axiosClient = axios.create({
  baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`,
});

axiosClient.interceptors.request.use((config) => {
  config.headers.Authorization = `Bearer ${localStorage.getItem('TOKEN')}`
  return config
});

axiosClient.interceptors.response.use(response => {
  return response;
}, error => {
  if (error.response && error.response.status === 401) {
    localStorage.removeItem('TOKEN')
    window.location.reload();
    // router.navigate('/login')
    return error;
  }
  throw error;
})

function getApi(url, config = {}) {
  return axiosClient.get(url, config);
}

function postApi(url, data, config = {}) {
  return axiosClient.post(url, data, config);
}

function putApi(url, data, config = {}) {
  return axiosClient.put(url, data, config);
}

function deleteApi(url, config = {}) {
  return axiosClient.delete(url, config);
}

const httpRequest = {
  get: getApi,
  post: postApi,
  put: putApi,
  delete: deleteApi,
};

export default httpRequest;
