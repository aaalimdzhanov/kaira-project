
export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig()
  const query = getQuery(event)
  const lang = query.lang || 'en'
  const page = query.page || 1
  const response = await $fetch(`${config.apiUrl}/product?category=clothing&page=${page}`, {
    headers: {
      'Accept-Language': lang
    }
  })
  return {
    data: response.data.map((item) => ({
      url: item.image.fixed_height, // миниатюра
      name: item.name,
      price: Number(item.price),
      link: `/clothing/${item.id}`
    })),
    meta: response.meta,
    links: response.links
  }
})