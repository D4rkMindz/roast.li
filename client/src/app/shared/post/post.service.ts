import { Injectable } from '@angular/core';
import { Moment } from 'moment';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { User } from '@app/shared/user/user.service';

export interface Post {
  id: string;
  content: string;
  created_at: Moment;
  created_by: string;
  modified_at?: Moment;
  modified_by?: string;
  archived_at?: Moment;
  archived_by?: string;
  likes: string;
  liked_by_user: boolean;
  user: User;
}

@Injectable({
  providedIn: 'root'
})
export class PostService {
  constructor(private http: HttpClient) {}

  public getHotPosts(offset: number = 0): Observable<Post[]> {
    return this.http.get<Post[]>(`/posts/hot?offset=${offset}`, { withCredentials: true });
  }

  public getNewPosts(offset: number = 0): Observable<Post[]> {
    return this.http.get<Post[]>(`/posts/new?offset=${offset}`, { withCredentials: true });
  }

  public async getPost(postId: string): Post {
    return this.http.get<Post>(`/posts/${postId}`, { withCredentials: true }).toPromise();
  }

  public async like(id: string): number {
    return await this.http.put(`/posts/${id}/like`, {}, { withCredentials: true }).toPromise();
  }

  public async unlike(id: string): number {
    return await this.http.put(`/posts/${id}/unlike`, {}, { withCredentials: true }).toPromise();
  }
}
