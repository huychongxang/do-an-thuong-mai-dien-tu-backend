import request from '@/utils/request';

export function getCart(query) {
    return request({
        url: '/cart',
        method: 'get',
        params: query,
    });
}

export function updateQty(rowId,qty) {
    return request({
        url: '/cart/update',
        method: 'post',
        data: {
            row_id:rowId,
            new_qty:qty
        },
    });
}
