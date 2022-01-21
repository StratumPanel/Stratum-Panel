import axios from 'axios'

export default () => axios.post(route('admin.nodes.health.test'))
