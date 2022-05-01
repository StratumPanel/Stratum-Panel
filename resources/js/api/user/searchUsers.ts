import axios from 'axios'

export default (search: string) => {
    return axios.get(route('admin.users.search'), {
        params: {
            search
        }
    })
}