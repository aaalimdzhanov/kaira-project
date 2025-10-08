export default defineEventHandler(async (event) => {
    // Получаем тело запроса
    const body = await readBody(event)

    // body будет таким же, как мы отправляем с клиента:
    // { items: [...], total: 12345 }

    console.log('Получена корзина:', body)

    // Здесь можно сохранять в базу или делать другую логику
    // Например:
    // await db.insert('orders', { items: JSON.stringify(body.items), total: body.total })

    return {
        success: true,
        message: 'Корзина успешно получена на сервере',
        data: body
    }
})