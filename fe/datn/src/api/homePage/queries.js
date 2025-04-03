import { useQuery } from "@tanstack/react-query";
import { getCategoriesAPI } from "./reqest";
import { optionsUseQuery } from "utils/product";

export const useGetCategoriesUS = (option) => {
    return useQuery({
        queryKey: ["getCategoriesAPI"],
        queryFn: () => getCategoriesAPI(),
        optionsUseQuery,
        ...option,
    })
}