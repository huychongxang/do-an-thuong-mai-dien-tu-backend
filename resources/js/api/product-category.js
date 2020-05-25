import request from '@/utils/request';

export function getList(query) {
    return request({
        url: '/product-categories',
        method: 'get',
        params: query,
    });
}
