export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig()
  const query = getQuery(event)
  const page = query.page || 1
  const lang = query.lang || 'en'  
  const response = await $fetch(`${config.apiUrl}/product?category=scarves&page=${page}`, {
  headers: {
    'Accept-Language': lang
  }
})
  return {
    data: response.data.map((item) => ({
      url: item.image.fixed_height, // миниатюра
      name: item.name,
      price: Number(item.price),
      link: `/scarves/${item.id}`
    })),
    meta: response.meta,
    links: response.links
  }
})