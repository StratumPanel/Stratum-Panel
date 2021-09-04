import { Inertia } from '@inertiajs/inertia'

export default (id: string) => {
    return Inertia.get(route('servers.show.status', id));
}