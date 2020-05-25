import request from '@/utils/request';

export function getList(query) {
    return request({
        url: '/products',
        method: 'get',
        params: query,
    });
}
