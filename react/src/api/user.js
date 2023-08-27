import api from "./http-request.js";

export const getUserDetailApi = async (userId) => api.get(`/user/detail-user/${userId}`)
export const getListUserApi = async (page, config) => api.get(`/user/list-user?page=${page}`, config)
export const createUserApi = async (data) => api.post('/user/create-user', data)
export const updateUserApi = async (userId, data) => api.put(`/user/update-user/${userId}`, data)
export const deleteUserApi = async (userId) => api.delete(`/user/delete-user/${userId}`)
