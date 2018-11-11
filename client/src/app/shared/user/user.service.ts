import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map, share } from 'rxjs/operators';
import { Observable } from 'rxjs';
import { HttpService } from '@app/shared/http/http.service';

export interface User {
  id: string;
  username: string;
  thumbnail_url?: string;
}

export class CompleteUser {
  private readonly _id?: string;
  private readonly _username: string;
  private readonly _first_name: string;
  private readonly _last_name: string;
  private readonly _password: string;
  private readonly _email: string;
  private readonly _thumbnail_url: string;

  constructor(username: string, first_name: string, last_name: string, password: string, email: string, id?: string, thumbnailUrl?: string) {
    this._id = id;
    this._username = username;
    this._first_name = first_name;
    this._last_name = last_name;
    this._password = password;
    this._email = email;
    this._thumbnail_url = thumbnailUrl;
  }

  get id(): string {
    return this._id;
  }

  get username(): string {
    return this._username;
  }

  get first_name(): string {
    return this._first_name;
  }

  get last_name(): string {
    return this._last_name;
  }

  get password(): string {
    return this._password;
  }

  get email(): string {
    return this._email;
  }

  get thumbnail_url(): string {
    return this._thumbnail_url;
  }

  public toJSON() {
    const data = {
      username: this.username,
      password: this.password,
      firstname: this.first_name,
      lastname: this.last_name,
      email: this.email
    };
    if (this.thumbnail_url) {
      data['thumbnail_url'] = this.thumbnail_url;
    }
    if (this.id) {
      data['thumbnail_url'] = this.id;
    }
    return JSON.stringify(data);
  }
}

@Injectable({
  providedIn: 'root'
})
export class UserService {
  constructor(private http: HttpService) {
  }

  public register(user: CompleteUser): Observable<any> {
    return new Observable(observer => {
      console.log('[REGISTER] registering user');
      this.http.post('/user', user.toJSON())
        .subscribe((res) => {
          observer.next(res);
          observer.complete();
          console.log('[REGISTER] got response');
          return res;
        });
    });
  }
}
