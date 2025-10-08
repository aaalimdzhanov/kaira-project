export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig()
  const query = getQuery(event)
  const lang = query.lang || 'en'
  // Параллельно запрашиваем три ресурса
  const [bestsellersRes, recommendedRes, newRes, expensive] = await Promise.all([
    $fetch(`${config.apiUrl}/products/bestsellers`, { headers: { 'Accept-Language': lang } }),
    $fetch(`${config.apiUrl}/products/recommended`, { headers: { 'Accept-Language': lang } }),
    $fetch(`${config.apiUrl}/products/new`, { headers: { 'Accept-Language': lang } }),
    $fetch(`${config.apiUrl}/products/expensive`, { headers: { 'Accept-Language': lang } })
  ])

  // Формируем данные
  const formatItem = (item) => ({
    url: item.image.fixed_height,
    name: item.name,
    description: item.description,
    price: Number(item.price),
    link: `/${item.category.key}/${item.id}`
  })

  return {
    bestsellers: bestsellersRes.map(formatItem),
    recommended: recommendedRes.map(formatItem),
    newded: newRes.map(formatItem),
    expensive: expensive.map(formatItem)
  }
})
