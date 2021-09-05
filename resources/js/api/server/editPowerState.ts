import axios from 'axios'

export default (id: number, state: string) => {
  return axios.post(
    route(`servers.show.power.${state}`, id)
  )
}
