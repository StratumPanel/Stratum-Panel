export interface Server {
  cloud_init_enabled: number
  created_at: string
  description: string | null
  id: number
  name: string
  node_id: number
  updated_at: string
  user_id: number
  vmid: number
  vnc_password: string | null
  vnc_username: string | null
}

export interface Link {
  url: string | null
  label: string
  active: boolean
}

export interface PaginationReturns {
  current_page: number
  data: Server[]
  first_page_url: string | null
  from: number
  last_page: number
  last_page_url: string
  links: Link[]
  next_page_url: string | null
  path: string
  per_page: number
  prev_page_url: string | null
  to: number
  total: number
}
