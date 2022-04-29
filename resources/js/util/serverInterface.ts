export default interface ServerInterface {
    id: number
    name: string
    description: string | null
    user_id: number
    node_id: number
    vnc_username: string | null
    vnc_password: string | null
    cloud_init_enabled: boolean
    vmid: number
    created_at: string
    updated_at: string
}