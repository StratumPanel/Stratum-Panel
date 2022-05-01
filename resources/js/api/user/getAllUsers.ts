import axios from 'axios'
/*
created_at: "2022-04-24T22:46:01.000000Z"
current_team_id: null
email: "fahey.eino@example.net"
email_verified_at: "2022-04-24T22:46:01.000000Z"
id: 1
name: "Miss Kirsten Carroll II"
profile_photo_path: null
profile_photo_url: "https://ui-avatars.com/api/?name=M+K+C+I&color=7F9CF5&background=EBF4FF"
root_admin: 1
updated_at: "2022-04-29T00:30:07.000000Z
*/

export interface User {
    created_at: string,
    current_team_id: null,
    email: string,
    email_verified_at: string,
    id: number,
    name: string,
    profile_photo_path: null | string,
    profile_photo_url: null | string,
    root_admin: number,
    updated_at: string,
}

export default () => {
    return axios.get(route('admin.users.index'), {
        headers: {
            'Content-Type': 'application/json'
        }
    })
}