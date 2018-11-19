import { Injectable } from '@angular/core';
import { Moment } from 'moment';
import { Observable } from 'rxjs';
import { User } from '@app/shared/user/user.service';
import { HttpService } from '../../core/http/http.service';
import { HttpClient } from '@angular/common/http';

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

  public getHotPosts(offset: number = 0) {
    return this.http.get(`/posts/hot?offset=${offset}`);
  }

  public getNewPosts(offset: number = 0) {
    return this.http.get(`/posts/new?offset=${offset}`);
  }

  public async getPost(postId: string) {
    return this.http.get(`/posts/${postId}`).toPromise();
  }

  public createPost(text: string): Promise<any> {
    return this.http.post(`/posts`, JSON.stringify({ text: text })).toPromise();
  }

  public async deletePost(postId: string): Promise<boolean> {
    const response: any = await this.http.delete(`/posts/${postId}`).toPromise();
    if ('success' in response) {
      return response.success;
    }
    return false;
  }

  public async like(id: string): Promise<number> {
    const response: any = await this.http.put(`/posts/${id}/like`, {}).toPromise();
    return response.likes;
  }

  public async unlike(id: string): Promise<number> {
    const response: any = await this.http.put(`/posts/${id}/unlike`, {}).toPromise();
    return response.likes;
  }
}
