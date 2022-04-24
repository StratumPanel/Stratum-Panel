import axios from 'axios'

export default (id: number) => axios.delete(route('admin.nodes.destroy', id))
