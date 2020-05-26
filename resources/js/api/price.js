import request from '@/utils/request';

export function getRange(query) {
    return request({
        url: '/prices',
        method: 'get',
        params: query,
    });
}
