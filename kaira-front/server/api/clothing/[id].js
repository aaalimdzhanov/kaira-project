export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig()
  const { id } = event.context.params
  try {
    const response = await $fetch(`${config.apiUrl}/product/${id}`)
    if (!response || !response.id) {
      return { error: true, message: 'Product not found' }
    }
    return response

  } catch (err) {
    return { error: true, message: err.message }
  }
})
