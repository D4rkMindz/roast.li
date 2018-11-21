import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map, share } from 'rxjs/operators';
import { Observable } from 'rxjs';
import { HttpService } from '../../core/http/http.service';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  constructor(private http: HttpService) {}

  public register(user: CompleteUser): Observable<any> {
    return new Observable(observer => {
      console.log('[REGISTER] registering user');
      this.http.post('/user', user.toJSON()).subscribe(res => {
        observer.next(res);
        observer.complete();
        console.log('[REGISTER] got response');
        return res;
      });
    });
  }
}
