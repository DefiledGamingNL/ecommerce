export const formatDate = (value) => {
    const date = new Date(value)
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    }
    return date.toLocaleString('nl-NL', options).replace('_', ' om ')
}
