import axios from 'axios'

export default (id: number) => {
    return axios.get(route('admin.users.show', id), {
        headers: {
            'Content-Type': 'application/json'
        }
    })
}