import axios from 'axios'

export interface FormattedBytes {
  size: number;
  unit: string;
}

export function formatBytes(bytes: number, decimals = 2): FormattedBytes {
  if (bytes === 0) return { size: 0, unit: 'B' }

  const k = 1024
  const dm = decimals < 0 ? 0 : decimals
  const sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']

  const i = Math.floor(Math.log(bytes) / Math.log(k))

  return {
    size: parseFloat((bytes / Math.pow(k, i)).toFixed(dm)),
    unit: sizes[i],
  }
}

export default (id: number) => {
  return axios.get(route('servers.show.status', id))
}
