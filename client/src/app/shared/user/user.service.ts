import { Injectable } from '@angular/core';

export interface User {
  id: string;
  username: string;
  thumbnail_url?: string;
}

@Injectable({
  providedIn: 'root'
})
export class UserService {
  constructor() {}
}
