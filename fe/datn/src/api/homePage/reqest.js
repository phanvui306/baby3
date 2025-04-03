import axios from "api/axios";

const END_POINT = {
    CATEGORIES: "categories",
};
export const getCategoriesAPI = async () => {
    return await axios({
        url: END_POINT.CATEGORIES,
        method: "GET",
    })
}