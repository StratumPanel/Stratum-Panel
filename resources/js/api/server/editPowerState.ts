import { Inertia } from '@inertiajs/inertia'

export default (id: string, state: string) => {
  return Inertia.post(
    route(`servers.show.power.${state}`, id)
  )
}
