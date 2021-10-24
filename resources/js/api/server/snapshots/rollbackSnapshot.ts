import axios from 'axios'

export default (id: number, snapName: string) => {
  return axios.post(route('servers.show.snapshots.rollback', id), {
    snapname: snapName,
  })
}
