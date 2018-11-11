import { Injectable } from '@angular/core';
import { Moment } from 'moment';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { User } from '@app/shared/user/user.service';
import { HttpService } from '@app/shared/http/http.service';

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
  constructor(private http: HttpService) {
  }

  public getHotPosts(offset: number = 0): Observable<Post[]> {
    return this.http.get<Post[]>(`/posts/hot?offset=${offset}`);
  }

  public getNewPosts(offset: number = 0): Observable<Post[]> {
    return this.http.get<Post[]>(`/posts/new?offset=${offset}`);
  }

  public async getPost(postId: string): Promise<Post> {
    return this.http.get<Post>(`/posts/${postId}`).toPromise();
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
